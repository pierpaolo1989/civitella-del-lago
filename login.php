<?php
require_once __DIR__ . '/includes/bootstrap.php';

$page_title = 'Accedi | Civitella del Lago';
$error = '';
$email = '';
$registered = isset($_GET['registrata']) && $_GET['registrata'] === '1';

if (community_user() !== null) {
    community_redirect('dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) && is_string($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) && is_string($_POST['password']) ? $_POST['password'] : '';
    if (!community_csrf_is_valid()) {
        http_response_code(400);
        $error = 'La richiesta è scaduta. Ricarica la pagina e riprova.';
    } else {
        $statement = community_db()->prepare(
            'SELECT id, name, email, password_hash, role FROM community_users WHERE email = :email'
        );
        $statement->execute(array('email' => $email));
        $account = $statement->fetch();
        if (!$account || !password_verify($password, $account['password_hash'])) {
            $error = 'Email o password non corretti.';
        } else {
            session_regenerate_id(true);
            $_SESSION['community_user'] = array(
                'id' => (int) $account['id'],
                'name' => $account['name'],
                'email' => $account['email'],
                'role' => $account['role'],
            );
            unset($_SESSION['community_csrf']);
            community_redirect('dashboard.php');
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
                <p class="community-eyebrow">La tua bacheca locale</p>
                <h1>Accedi</h1>
                <?php if ($registered): ?><p class="community-success" role="status">Account creato. Ora puoi accedere.</p><?php endif; ?>
                <?php if ($error !== ''): ?><p class="community-alert" role="alert"><?php echo community_escape($error); ?></p><?php endif; ?>
                <form method="post" action="login.php" class="community-form">
                    <?php echo community_csrf_field(); ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" autocomplete="username" maxlength="190" required value="<?php echo community_escape($email); ?>">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                    <button class="community-button" type="submit">Accedi</button>
                </form>
                <p class="community-form-foot">Non hai un account? <a href="registrazione.php">Registrati</a>.</p>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
