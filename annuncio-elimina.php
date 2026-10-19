<?php
require_once __DIR__ . '/includes/bootstrap.php';
community_require_login();
community_post_only();

if (!community_csrf_is_valid()) {
    http_response_code(400);
    exit('La richiesta è scaduta. Ricarica la pagina e riprova.');
}

$id = isset($_POST['id']) && is_string($_POST['id'])
    ? filter_var($_POST['id'], FILTER_VALIDATE_INT)
    : false;
if ($id === false || $id < 1) {
    http_response_code(422);
    exit('Annuncio non valido.');
}

$statement = community_db()->prepare(
    'DELETE FROM community_announcements WHERE id = :id AND user_id = :user_id'
);
$statement->execute(array('id' => $id, 'user_id' => community_user()['id']));
community_redirect('dashboard.php?eliminato=1');
