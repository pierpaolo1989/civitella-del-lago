<?php
require_once __DIR__ . '/includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!community_csrf_is_valid()) {
        http_response_code(400);
        exit('La richiesta è scaduta. Ricarica la pagina e riprova.');
    }
    $_SESSION = array();
    if (ini_get('session.use_cookies')) {
        $cookie = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
    }
    session_destroy();
}
community_redirect('annunci.php');
