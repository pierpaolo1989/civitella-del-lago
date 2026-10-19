<?php
require_once __DIR__ . '/includes/bootstrap.php';
community_require_login();

$page_title = 'Area utente | Civitella del Lago';
$user = community_user();
$statement = community_db()->prepare(
    'SELECT id, category, title, location, status, created_at
     FROM community_announcements WHERE user_id = :user_id ORDER BY created_at DESC, id DESC'
);
$statement->execute(array('user_id' => $user['id']));
$myAnnouncements = $statement->fetchAll();
$statusLabels = array(
    'pending' => 'In attesa di approvazione',
    'approved' => 'Pubblicato',
    'rejected' => 'Non approvato',
);
?>
<!doctype html>
<html amp lang="it">
<?php include __DIR__ . '/header.php'; ?>
<body>
<?php include __DIR__ . '/includes/site-navigation.php'; ?>
<main class="community-main">
    <section class="community-hero community-dashboard-hero">
        <div class="community-container">
            <p class="community-eyebrow">Area personale</p>
            <h1>Ciao, <?php echo community_escape($user['name']); ?></h1>
            <p>Gestisci i tuoi annunci e consulta lo stato della moderazione.</p>
            <a class="community-button" href="#nuovo-annuncio">Aggiungi un annuncio</a>
            <?php if ($user['role'] === 'admin'): ?>
                <a class="community-button community-button-outline" href="admin-annunci.php">Modera gli annunci</a>
            <?php endif; ?>
        </div>
    </section>
    <section class="community-section">
        <div class="community-container">
            <?php if (isset($_GET['inviato'])): ?>
                <p class="community-success" role="status">Annuncio inviato: sarà visibile dopo l’approvazione.</p>
            <?php endif; ?>
            <?php if (isset($_GET['eliminato'])): ?>
                <p class="community-success" role="status">Annuncio rimosso dalla bacheca.</p>
            <?php endif; ?>
            <div class="community-section-heading">
                <div><p class="community-eyebrow">I tuoi contenuti</p><h2>I miei annunci</h2></div>
            </div>
            <?php if ($myAnnouncements): ?>
                <div class="community-listings">
                    <?php foreach ($myAnnouncements as $announcement): ?>
                        <article class="community-listing community-own-listing">
                            <div class="community-listing-meta">
                                <span class="community-badge"><?php echo community_escape(community_category_label($announcement['category'])); ?></span>
                                <span><?php echo community_escape($announcement['location']); ?></span>
                                <span class="community-status community-status-<?php echo community_escape($announcement['status']); ?>">
                                    <?php echo community_escape($statusLabels[$announcement['status']]); ?>
                                </span>
                            </div>
                            <h3><?php echo community_escape($announcement['title']); ?></h3>
                            <time datetime="<?php echo community_escape(date('Y-m-d', strtotime($announcement['created_at']))); ?>">
                                Inviato il <?php echo community_escape(date('d/m/Y', strtotime($announcement['created_at']))); ?>
                            </time>
                            <form method="post" action="annuncio-elimina.php" class="community-inline-form">
                                <?php echo community_csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo (int) $announcement['id']; ?>">
                                <button class="community-button community-button-danger community-button-small" type="submit">Rimuovi annuncio</button>
                            </form>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="community-empty"><p>Non hai ancora inserito annunci.</p></div>
            <?php endif; ?>

            <div class="community-form-card community-submit-card" id="nuovo-annuncio">
                <p class="community-eyebrow">Condividi con il territorio</p>
                <h2>Pubblica un annuncio</h2>
                <p>Gli annunci restano in attesa di approvazione. Inserisci solo contenuti pertinenti alla zona.</p>
                <form method="post" action="annuncio-salva.php" class="community-form">
                    <?php echo community_csrf_field(); ?>
                    <label for="title">Titolo</label>
                    <input id="title" name="title" type="text" maxlength="150" required>
                    <label for="category">Categoria</label>
                    <select id="category" name="category" required>
                        <?php foreach (ANNOUNCEMENT_CATEGORIES as $value => $label): ?>
                            <option value="<?php echo community_escape($value); ?>"><?php echo community_escape($label); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="location">Località</label>
                    <select id="location" name="location" required>
                        <?php foreach (ANNOUNCEMENT_LOCATIONS as $location): ?>
                            <option value="<?php echo community_escape($location); ?>"><?php echo community_escape($location); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="description">Descrizione</label>
                    <textarea id="description" name="description" rows="6" maxlength="3000" required></textarea>
                    <label for="contact_email">Email pubblica di contatto <span>(facoltativa)</span></label>
                    <input id="contact_email" name="contact_email" type="email" maxlength="190">
                    <small>Se inserisci un indirizzo, sarà mostrato pubblicamente nell’annuncio. L’email del tuo account non viene esposta automaticamente.</small>
                    <button class="community-button" type="submit">Invia per approvazione</button>
                </form>
            </div>
            <form method="post" action="esci.php" class="community-logout-form">
                <?php echo community_csrf_field(); ?>
                <button class="community-text-button" type="submit">Esci dall’account</button>
            </form>
        </div>
    </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
