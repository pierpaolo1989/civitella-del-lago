<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params(array(
        'httponly' => true,
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'samesite' => 'Lax',
        'path' => '/',
    ));
    session_start();
}

define('ANNOUNCEMENT_CATEGORIES', array(
    'evento' => 'Eventi e sagre',
    'notizia' => 'Notizie',
    'immobiliare' => 'Immobiliare',
    'altro' => 'Altro',
));

define('ANNOUNCEMENT_LOCATIONS', array(
    'Civitella del Lago',
    'Baschi',
    'Montecchio',
    'Todi',
    'Orvieto',
    'Alviano',
    'Guardea',
    'Altra località della zona',
));

set_exception_handler(function ($exception) {
    error_log(sprintf(
        'Community announcements error: %s in %s:%d',
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    ));
    http_response_code(500);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<!doctype html><html lang="it"><meta charset="utf-8"><title>Servizio non disponibile</title>';
    echo '<body style="font:16px Arial,sans-serif;max-width:640px;margin:4rem auto;padding:0 1rem;color:#24332c">';
    echo '<h1>Servizio temporaneamente non disponibile</h1>';
    echo '<p>Non è stato possibile completare la richiesta. Riprova più tardi o contatta il gestore del sito.</p>';
    echo '<p><a href="annunci.php">Torna agli annunci</a></p></body></html>';
    exit;
});

function community_db()
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = getenv('DB_DSN');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    if ($dsn === false || $dsn === '' || $username === false || $username === '') {
        throw new RuntimeException('Configurazione MySQL mancante: verificare DB_DSN e DB_USER.');
    }

    try {
        $pdo = new PDO($dsn, $username, $password === false ? '' : $password, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ));
    } catch (PDOException $exception) {
        error_log('Community announcements database connection failed: ' . $exception->getMessage());
        throw new RuntimeException('Connessione al database non disponibile.');
    }

    return $pdo;
}

function community_escape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function community_character_length($value)
{
    $length = preg_match_all('/./us', $value, $characters);
    return $length === false ? PHP_INT_MAX : $length;
}

function community_user()
{
    return isset($_SESSION['community_user']) ? $_SESSION['community_user'] : null;
}

function community_require_login()
{
    if (community_user() === null) {
        header('Location: login.php');
        exit;
    }
}

function community_require_admin()
{
    $user = community_user();
    if ($user === null) {
        header('Location: login.php');
        exit;
    }
    if ($user['role'] !== 'admin') {
        http_response_code(403);
        exit('Accesso riservato agli amministratori.');
    }
}

function community_csrf_token()
{
    if (empty($_SESSION['community_csrf'])) {
        $_SESSION['community_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['community_csrf'];
}

function community_csrf_field()
{
    return '<input type="hidden" name="csrf_token" value="' .
        community_escape(community_csrf_token()) . '">';
}

function community_csrf_is_valid()
{
    return isset($_POST['csrf_token'], $_SESSION['community_csrf']) &&
        is_string($_POST['csrf_token']) &&
        hash_equals($_SESSION['community_csrf'], $_POST['csrf_token']);
}

function community_category_label($category)
{
    return isset(ANNOUNCEMENT_CATEGORIES[$category])
        ? ANNOUNCEMENT_CATEGORIES[$category]
        : ANNOUNCEMENT_CATEGORIES['altro'];
}

function community_redirect($location)
{
    header('Location: ' . $location);
    exit;
}

function community_post_only()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        header('Allow: POST');
        exit('Metodo non consentito.');
    }
}
