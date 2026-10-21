<?php
$navigationUser = community_user();
?>
<amp-sidebar id="sidebar" class="cid-rpfciQyPtf" layout="nodisplay" side="right">
    <div class="builder-sidebar" id="builder-sidebar">
        <button on="tap:sidebar.close" class="close-sidebar" aria-label="Chiudi il menu">
            <span></span>
            <span></span>
        </button>
        <ul class="navbar-nav nav-dropdown navbar-nav-top-padding" data-app-modern-menu="true">
            <li class="nav-item"><a class="nav-link link text-primary display-7" href="storia.php">Storia</a></li>
            <li class="nav-item"><a class="nav-link link text-primary display-7" href="servizi.php">Servizi</a></li>
            <li class="nav-item"><a class="nav-link link text-primary display-7" href="sport.php">Sport e trekking</a></li>
            <li class="nav-item"><a class="nav-link link text-primary display-7" href="annunci.php">Annunci</a></li>
            <li class="nav-item"><a class="nav-link link text-primary display-7" href="http://www.ovopinto.it" target="_blank" rel="noopener noreferrer">Ovo Pinto</a></li>
        </ul>
        <div class="navbar-buttons mbr-section-btn">
            <?php if (!isset($showNavigationAccount) || $showNavigationAccount): ?>
                <a class="btn btn-sm btn-primary display-7" href="<?php echo $navigationUser ? 'dashboard.php' : 'login.php'; ?>">
                    <?php echo $navigationUser ? 'Area utente' : 'Accedi'; ?>
                </a>
            <?php endif; ?>
            <a class="btn btn-sm btn-primary display-7" href="index.php#contacts2-5">Contattaci</a>
        </div>
    </div>
</amp-sidebar>
<section class="menu horizontal-menu cid-rpfciQyPtf" id="menu2-0">
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="brand">
            <span class="brand-logo"><a href="index.php"><img src="assets/images/logo.png" width="65%" alt="Civitella del Lago"></a></span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown navbar-nav-top-padding" data-app-modern-menu="true">
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="storia.php">Storia</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="servizi.php">Servizi</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="sport.php">Sport e trekking</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="annunci.php">Annunci</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="http://www.ovopinto.it" target="_blank" rel="noopener noreferrer">Ovo Pinto</a></li>
            </ul>
            <div class="navbar-buttons mbr-section-btn">
                <?php if (!isset($showNavigationAccount) || $showNavigationAccount): ?>
                    <a class="btn btn-sm btn-primary display-7" href="<?php echo $navigationUser ? 'dashboard.php' : 'login.php'; ?>">
                        <?php echo $navigationUser ? 'Area utente' : 'Accedi'; ?>
                    </a>
                <?php endif; ?>
                <a class="btn btn-sm btn-primary display-7" href="index.php#contacts2-5">Contattaci</a>
            </div>
        </div>
        <button on="tap:sidebar.toggle" class="ampstart-btn hamburger" aria-label="Apri il menu">
            <span></span><span></span><span></span><span></span>
        </button>
    </nav>
</section>
