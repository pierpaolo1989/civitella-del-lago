<?php
require_once __DIR__ . '/includes/bootstrap.php';

$page_title = 'Annunci e notizie della zona | Civitella del Lago';
$categoryFilter = isset($_GET['categoria']) && is_string($_GET['categoria']) &&
    isset(ANNOUNCEMENT_CATEGORIES[$_GET['categoria']])
    ? $_GET['categoria']
    : '';
$locationFilter = isset($_GET['luogo']) && in_array($_GET['luogo'], ANNOUNCEMENT_LOCATIONS, true)
    ? $_GET['luogo']
    : '';
$search = isset($_GET['cerca']) && is_string($_GET['cerca'])
    ? trim($_GET['cerca'])
    : '';
if (community_character_length($search) > 100) {
    preg_match('/^.{0,100}/us', $search, $searchMatch);
    $search = isset($searchMatch[0]) ? $searchMatch[0] : '';
}

$sql = 'SELECT id, category, title, location, description, contact_email, created_at
        FROM community_announcements WHERE status = "approved"';
$parameters = array();
if ($categoryFilter !== '') {
    $sql .= ' AND category = :category';
    $parameters['category'] = $categoryFilter;
}
if ($locationFilter !== '') {
    $sql .= ' AND location = :location';
    $parameters['location'] = $locationFilter;
}
if ($search !== '') {
    $sql .= ' AND (title LIKE :search_title OR description LIKE :search_description)';
    $parameters['search_title'] = '%' . $search . '%';
    $parameters['search_description'] = '%' . $search . '%';
}
$sql .= ' ORDER BY created_at DESC, id DESC LIMIT 100';
$statement = community_db()->prepare($sql);
$statement->execute($parameters);
$announcements = $statement->fetchAll();
$user = community_user();
?>
<!doctype html>
<html amp lang="it">
<?php include __DIR__ . '/header.php'; ?>
<body>
<?php include __DIR__ . '/includes/site-navigation.php'; ?>
<main class="community-main">
    <section class="community-hero">
        <div class="community-container">
            <p class="community-eyebrow">Vita di paese · Lago di Corbara</p>
            <h1>Annunci e notizie del territorio</h1>
            <p>Eventi, sagre, notizie e annunci immobiliari da Civitella del Lago e dai paesi vicini.</p>
            <a class="community-button" href="<?php echo $user ? 'dashboard.php#nuovo-annuncio' : 'login.php'; ?>">
                Pubblica un annuncio
            </a>
        </div>
    </section>

    <section class="community-section">
        <div class="community-container">
            <div class="community-section-heading">
                <div>
                    <p class="community-eyebrow">La bacheca</p>
                    <h2>Annunci della comunità</h2>
                </div>
                <p>Gli annunci inviati dagli utenti vengono controllati prima della pubblicazione.</p>
            </div>

            <form class="community-filters" method="get" action="annunci.php">
                <label>
                    Cerca
                    <input type="search" name="cerca" value="<?php echo community_escape($search); ?>" maxlength="100" placeholder="Parole chiave">
                </label>
                <label>
                    Categoria
                    <select name="categoria">
                        <option value="">Tutte</option>
                        <?php foreach (ANNOUNCEMENT_CATEGORIES as $value => $label): ?>
                            <option value="<?php echo community_escape($value); ?>" <?php echo $categoryFilter === $value ? 'selected' : ''; ?>>
                                <?php echo community_escape($label); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>
                    Località
                    <select name="luogo">
                        <option value="">Tutte le località</option>
                        <?php foreach (ANNOUNCEMENT_LOCATIONS as $location): ?>
                            <option value="<?php echo community_escape($location); ?>" <?php echo $locationFilter === $location ? 'selected' : ''; ?>>
                                <?php echo community_escape($location); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button class="community-button community-button-small" type="submit">Filtra</button>
            </form>

            <?php if ($announcements): ?>
                <div class="community-listings">
                    <?php foreach ($announcements as $announcement): ?>
                        <article class="community-listing">
                            <div class="community-listing-meta">
                                <span class="community-badge"><?php echo community_escape(community_category_label($announcement['category'])); ?></span>
                                <span><?php echo community_escape($announcement['location']); ?></span>
                                <time datetime="<?php echo community_escape(date('Y-m-d', strtotime($announcement['created_at']))); ?>">
                                    <?php echo community_escape(date('d/m/Y', strtotime($announcement['created_at']))); ?>
                                </time>
                            </div>
                            <h3><?php echo community_escape($announcement['title']); ?></h3>
                            <p class="community-listing-description"><?php echo nl2br(community_escape($announcement['description'])); ?></p>
                            <?php if (!empty($announcement['contact_email'])): ?>
                                <a class="community-text-link" href="mailto:<?php echo community_escape($announcement['contact_email']); ?>">Contatta l’inserzionista</a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="community-empty">
                    <h3>La bacheca si sta riempiendo</h3>
                    <p>Non ci sono ancora annunci pubblicati con questi filtri. Puoi consultare i portali esterni o contribuire con un annuncio.</p>
                </div>
            <?php endif; ?>

            <section class="community-external" aria-labelledby="external-listings-title">
                <div>
                    <p class="community-eyebrow">Altre risorse</p>
                    <h2 id="external-listings-title">Cerca anche sui portali esterni</h2>
                    <p>I siti immobiliari e le agende locali non offrono un incorporamento universale delle loro inserzioni. Apri il portale e cerca Baschi, Civitella del Lago, Montecchio, Orvieto o Todi.</p>
                </div>
                <div class="community-external-links">
                    <a href="https://www.immobiliare.it/" target="_blank" rel="noopener noreferrer">Immobiliare.it <span aria-hidden="true">↗</span></a>
                    <a href="https://www.idealista.it/" target="_blank" rel="noopener noreferrer">idealista <span aria-hidden="true">↗</span></a>
                    <a href="https://www.subito.it/" target="_blank" rel="noopener noreferrer">Subito <span aria-hidden="true">↗</span></a>
                    <a href="https://www.umbriatourism.it/" target="_blank" rel="noopener noreferrer">Umbriatourism <span aria-hidden="true">↗</span></a>
                </div>
            </section>
        </div>
    </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
