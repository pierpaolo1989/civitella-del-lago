<?php
require_once __DIR__ . '/includes/bootstrap.php';
community_require_admin();

$page_title = 'Moderazione annunci | Civitella del Lago';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    community_post_only();
    $id = isset($_POST['id']) && is_string($_POST['id'])
        ? filter_var($_POST['id'], FILTER_VALIDATE_INT)
        : false;
    $decision = isset($_POST['decision']) && is_string($_POST['decision']) ? $_POST['decision'] : '';
    if (!community_csrf_is_valid()) {
        http_response_code(400);
        $error = 'La richiesta è scaduta. Ricarica la pagina e riprova.';
    } elseif ($id === false || $id < 1 || !in_array($decision, array('approved', 'rejected'), true)) {
        http_response_code(422);
        $error = 'Selezione non valida.';
    } else {
        $statement = community_db()->prepare(
            'UPDATE community_announcements
             SET status = :status, moderated_by = :moderated_by, moderated_at = CURRENT_TIMESTAMP
             WHERE id = :id AND status = "pending"'
        );
        $statement->execute(array(
            'status' => $decision,
            'moderated_by' => community_user()['id'],
            'id' => $id,
        ));
        community_redirect('admin-annunci.php?aggiornato=1');
    }
}

$statement = community_db()->query(
    'SELECT a.id, a.category, a.title, a.location, a.description, a.contact_email, a.created_at,
            u.name AS author_name, u.email AS author_email
     FROM community_announcements a
     INNER JOIN community_users u ON u.id = a.user_id
     WHERE a.status = "pending"
     ORDER BY a.created_at ASC, a.id ASC'
);
$pendingAnnouncements = $statement->fetchAll();
?>
<!doctype html>
<html amp lang="it">
<?php include __DIR__ . '/header.php'; ?>
<body>
<?php include __DIR__ . '/includes/site-navigation.php'; ?>
<main class="community-main">
    <section class="community-hero community-dashboard-hero">
        <div class="community-container">
            <p class="community-eyebrow">Area amministrativa</p>
            <h1>Modera gli annunci</h1>
            <p>Approva o rifiuta i contenuti inviati dagli utenti prima che siano pubblicati.</p>
            <a class="community-button community-button-outline" href="dashboard.php">Torna alla dashboard</a>
        </div>
    </section>
    <section class="community-section">
        <div class="community-container">
            <?php if (isset($_GET['aggiornato'])): ?><p class="community-success" role="status">Moderazione aggiornata.</p><?php endif; ?>
            <?php if ($error !== ''): ?><p class="community-alert" role="alert"><?php echo community_escape($error); ?></p><?php endif; ?>
            <?php if ($pendingAnnouncements): ?>
                <div class="community-listings">
                    <?php foreach ($pendingAnnouncements as $announcement): ?>
                        <article class="community-listing">
                            <div class="community-listing-meta">
                                <span class="community-badge"><?php echo community_escape(community_category_label($announcement['category'])); ?></span>
                                <span><?php echo community_escape($announcement['location']); ?></span>
                                <span>Inviato da <?php echo community_escape($announcement['author_name']); ?> (<?php echo community_escape($announcement['author_email']); ?>)</span>
                            </div>
                            <h2><?php echo community_escape($announcement['title']); ?></h2>
                            <p class="community-listing-description"><?php echo nl2br(community_escape($announcement['description'])); ?></p>
                            <?php if (!empty($announcement['contact_email'])): ?><p>Email pubblica: <?php echo community_escape($announcement['contact_email']); ?></p><?php endif; ?>
                            <div class="community-moderation-actions">
                                <?php foreach (array('approved' => 'Approva', 'rejected' => 'Rifiuta') as $decision => $label): ?>
                                    <form method="post" action="admin-annunci.php">
                                        <?php echo community_csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo (int) $announcement['id']; ?>">
                                        <input type="hidden" name="decision" value="<?php echo community_escape($decision); ?>">
                                        <button class="community-button community-button-small <?php echo $decision === 'rejected' ? 'community-button-danger' : ''; ?>" type="submit"><?php echo community_escape($label); ?></button>
                                    </form>
                                <?php endforeach; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="community-empty"><h2>Nessun annuncio in attesa</h2><p>La coda di moderazione è aggiornata.</p></div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
