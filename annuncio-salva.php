<?php
require_once __DIR__ . '/includes/bootstrap.php';
community_require_login();
community_post_only();

if (!community_csrf_is_valid()) {
    http_response_code(400);
    exit('La richiesta è scaduta. Ricarica la pagina e riprova.');
}


$title = isset($_POST['title']) && is_string($_POST['title']) ? trim($_POST['title']) : '';
$category = isset($_POST['category']) && is_string($_POST['category']) ? $_POST['category'] : '';
$location = isset($_POST['location']) && is_string($_POST['location']) ? $_POST['location'] : '';
$description = isset($_POST['description']) && is_string($_POST['description']) ? trim($_POST['description']) : '';
$contactEmail = isset($_POST['contact_email']) && is_string($_POST['contact_email'])
    ? strtolower(trim($_POST['contact_email']))
    : '';

if ($title === '' || community_character_length($title) > 150 ||
    !isset(ANNOUNCEMENT_CATEGORIES[$category]) ||
    !in_array($location, ANNOUNCEMENT_LOCATIONS, true) ||
    $description === '' || community_character_length($description) > 3000 ||
    ($contactEmail !== '' && (strlen($contactEmail) > 190 || filter_var($contactEmail, FILTER_VALIDATE_EMAIL) === false))) {
    http_response_code(422);
    exit('Dati non validi. Torna alla dashboard e controlla i campi inseriti.');
}

$statement = community_db()->prepare(
    'INSERT INTO community_announcements
        (user_id, category, title, location, description, contact_email, status)
     VALUES (:user_id, :category, :title, :location, :description, :contact_email, "pending")'
);
$statement->execute(array(
    'user_id' => community_user()['id'],
    'category' => $category,
    'title' => $title,
    'location' => $location,
    'description' => $description,
    'contact_email' => $contactEmail === '' ? null : $contactEmail,
));

community_redirect('dashboard.php?inviato=1');
