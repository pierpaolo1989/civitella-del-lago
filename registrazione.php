<?php
require_once __DIR__ . '/includes/bootstrap.php';

$page_title = 'Crea un account | Civitella del Lago';
$error = '';
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) && is_string($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) && is_string($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';
    $passwordConfirm = isset($_POST['password_confirm']) && is_string($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
    $privacyAccepted = isset($_POST['privacy_consent']) && $_POST['privacy_consent'] === '1';

    if (!community_csrf_is_valid()) {
        http_response_code(400);
        $error = 'La richiesta è scaduta. Ricarica la pagina e riprova.';
    } elseif (community_character_length($name) < 2 || community_character_length($name) > 80) {
        $error = 'Inserisci un nome compreso tra 2 e 80 caratteri.';
    } elseif (strlen($email) > 190 || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error = 'Inserisci un indirizzo email valido.';
    } elseif (strlen($password) < 12 || strlen($password) > 72) {
        $error = 'La password deve contenere almeno 12 caratteri e non più di 72.';
    } elseif ($password !== $passwordConfirm) {
        $error = 'Le password non coincidono.';
    } elseif (!$privacyAccepted) {
        $error = 'Per creare l’account devi confermare di aver letto l’informativa privacy.';
    } else {
        $statement = community_db()->prepare('SELECT id FROM community_users WHERE email = :email');
        $statement->execute(array('email' => $email));
        if ($statement->fetch()) {
            $error = 'Esiste già un account con questo indirizzo email.';
        } else {
            try {
                $statement = community_db()->prepare(
                    'INSERT INTO community_users (name, email, password_hash, privacy_accepted_at)
                     VALUES (:name, :email, :password_hash, CURRENT_TIMESTAMP)'
                );
                $statement->execute(array(
                    'name' => $name,
                    'email' => $email,
                    'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                ));
                community_redirect('login.php?registrata=1');
            } catch (PDOException $exception) {
                if ($exception->getCode() === '23000') {
                    $error = 'Esiste già un account con questo indirizzo email.';
                } else {
                    throw $exception;
                }
            }
        }
    }
}
?>
<!doctype html>
<html amp lang="it">
<?php include __DIR__ . '/header.php'; ?>
<body>
<?php include __DIR__ . '/includes/site-navigation.php'; ?>
<main class="community-main">
    <section class="community-section community-auth-section">
        <div class="community-container community-narrow">
            <div class="community-form-card">
                <p class="community-eyebrow">Benvenuto nella community</p>
                <h1>Crea il tuo account</h1>
                <p>Registrati per pubblicare annunci e seguire le novità della zona.</p>
                <?php if ($error !== ''): ?><p class="community-alert" role="alert"><?php echo community_escape($error); ?></p><?php endif; ?>
                <form method="post" action="registrazione.php" class="community-form">
                    <?php echo community_csrf_field(); ?>
                    <label for="name">Nome</label>
                    <input id="name" name="name" type="text" autocomplete="name" maxlength="80" required value="<?php echo community_escape($name); ?>">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" maxlength="190" required value="<?php echo community_escape($email); ?>">
                    <label for="password">Password <span>(almeno 12 caratteri)</span></label>
                    <input id="password" name="password" type="password" autocomplete="new-password" minlength="12" maxlength="72" required>
                    <label for="password_confirm">Ripeti la password</label>
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="new-password" minlength="12" maxlength="72" required>
                    <label class="community-consent">
                        <input name="privacy_consent" type="checkbox" value="1" required <?php echo $privacyAccepted ? 'checked' : ''; ?>>
                        Ho letto l’<a href="informativa.php" target="_blank" rel="noopener noreferrer">informativa privacy</a> e comprendo che l’email di contatto di un annuncio sarà pubblica solo se la inserisco esplicitamente.
                    </label>
                    <button class="community-button" type="submit">Registrati</button>
                </form>
                <p class="community-form-foot">Hai già un account? <a href="login.php">Accedi</a>.</p>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
