<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Esplora Civitella del Lago con una mappa interattiva, le fotografie del borgo e un itinerario a piedi tra vicoli, piazze e panorami sul lago di Corbara.">
    <meta name="author" content="Civitella del Lago">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="tour.php">
    <title>Tour virtuale di Civitella del Lago</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <link rel="stylesheet" href="assets/style/tour.css">
    <script defer src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script defer src="assets/js/tour.js"></script>
</head>
<body>
    <header class="site-header">
        <a class="site-logo" href="index.php" aria-label="Civitella del Lago, torna alla home">
            <img src="assets/images/logo.png" alt="Civitella del Lago">
        </a>
        <button class="nav-toggle" type="button" aria-controls="site-navigation" aria-expanded="false"
            aria-label="Apri il menu">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <button class="nav-backdrop" type="button" aria-label="Chiudi il menu" tabindex="-1"></button>
        <nav class="site-nav" id="site-navigation" aria-label="Navigazione principale">
            <button class="nav-close" type="button" aria-label="Chiudi il menu">
                <span></span>
                <span></span>
            </button>
            <a href="storia.php">Storia</a>
            <a href="servizi.php">Servizi</a>
            <a href="sport.php">Sport e trekking</a>
            <a href="http://www.ovopinto.it" target="_blank" rel="noopener noreferrer">Ovo Pinto</a>
            <a class="contact-link" href="index.php#contacts2-5">Contattaci</a>
        </nav>
    </header>

    <main>
        <section class="tour-hero" aria-labelledby="tour-title">
            <div class="hero-content">
                <p class="eyebrow">Umbria · Lago di Corbara</p>
                <h1 id="tour-title">Civitella, passo dopo passo</h1>
                <p class="hero-copy">Perditi tra i vicoli in pietra, affacciati sul lago e scopri il borgo con una passeggiata virtuale.</p>
                <a class="primary-button" href="#percorso">Inizia il tour <span aria-hidden="true"></span></a>
            </div>
        </section>

        <section class="tour-section" id="percorso" aria-labelledby="route-title">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">Una passeggiata nel borgo</p>
                    <h2 id="route-title">Il percorso</h2>
                </div>
                <p class="route-summary"><strong>4 tappe</strong><span aria-hidden="true">·</span> Passeggiata nel centro storico</p>
            </div>

            <p class="map-note">Seleziona una tappa per trovarla sulla mappa. La linea tratteggiata collega i segnaposti in modo schematico: apri l’itinerario a piedi per seguire le strade. La copertura Street View varia da zona a zona.</p>
            <div class="tour-layout">
                <div class="map-panel">
                    <div id="tour-map" role="application" aria-label="Mappa interattiva delle tappe di Civitella del Lago"></div>
                    <p class="map-status" id="map-status" role="status" aria-live="polite"></p>
                </div>

                <ol class="stop-list" aria-label="Tappe del tour">
                    <li class="stop-card" id="tappa-piazza" data-stop-id="piazza">
                        <img src="assets/images/civitella_del_lago_piazza_vittorio_emanuele.jpg"
                            alt="Piazza Vittorio Emanuele e le case in pietra del borgo">
                        <div class="stop-content">
                            <p class="stop-number">Tappa 01</p>
                            <h3>Piazza Vittorio Emanuele</h3>
                            <p>Parti dal cuore del paese: una piazza raccolta, circondata da case in pietra e affacciata sui tetti del borgo.</p>
                            <div class="stop-actions">
                                <button class="map-button" type="button" data-focus-stop="piazza">Mostra sulla mappa</button>
                                <a href="https://www.google.com/maps/@?api=1&amp;map_action=pano&amp;viewpoint=42.711998,12.281224"
                                    target="_blank" rel="noopener noreferrer">Prova Street View <span aria-hidden="true">↗</span></a>
                            </div>
                        </div>
                    </li>
                    <li class="stop-card" id="tappa-centrale" data-stop-id="centrale">
                        <img src="assets/images/civitella/civitella_del_lago_via_centrale.jpg"
                            alt="Un vicolo di pietra in Via Centrale">
                        <div class="stop-content">
                            <p class="stop-number">Tappa 02</p>
                            <h3>Via Centrale</h3>
                            <p>Segui la strada tra facciate antiche, archi e dettagli che raccontano la vita quotidiana del centro storico.</p>
                            <div class="stop-actions">
                                <button class="map-button" type="button" data-focus-stop="centrale">Mostra sulla mappa</button>
                                <a href="https://www.google.com/maps/@?api=1&amp;map_action=pano&amp;viewpoint=42.711665,12.280987"
                                    target="_blank" rel="noopener noreferrer">Prova Street View <span aria-hidden="true">↗</span></a>
                            </div>
                        </div>
                    </li>
                    <li class="stop-card" id="tappa-tortuosa" data-stop-id="tortuosa">
                        <img src="assets/images/civitella/civitella_del_lago_via_tortuosa.jpg"
                            alt="Scalinata e vicolo in Via Tortuosa">
                        <div class="stop-content">
                            <p class="stop-number">Tappa 03</p>
                            <h3>Via Tortuosa</h3>
                            <p>Lasciati guidare dalla curva dei vicoli: scorci inaspettati, pietra, scalinate e lampioni del borgo.</p>
                            <div class="stop-actions">
                                <button class="map-button" type="button" data-focus-stop="tortuosa">Mostra sulla mappa</button>
                                <a href="https://www.google.com/maps/@?api=1&amp;map_action=pano&amp;viewpoint=42.712039,12.280675"
                                    target="_blank" rel="noopener noreferrer">Prova Street View <span aria-hidden="true">↗</span></a>
                            </div>
                        </div>
                    </li>
                    <li class="stop-card" id="tappa-belvedere" data-stop-id="belvedere">
                        <img src="assets/images/civitella/DSCF9548.jpg"
                            alt="Il lago di Corbara al tramonto, visto dai dintorni di Civitella">
                        <div class="stop-content">
                            <p class="stop-number">Tappa 04</p>
                            <h3>Piazza Belvedere</h3>
                            <p>Concludi la passeggiata con lo sguardo verso il lago di Corbara e le colline umbre.</p>
                            <div class="stop-actions">
                                <button class="map-button" type="button" data-focus-stop="belvedere">Mostra sulla mappa</button>
                                <a href="https://www.google.com/maps/@?api=1&amp;map_action=pano&amp;viewpoint=42.711376,12.280478"
                                    target="_blank" rel="noopener noreferrer">Prova Street View <span aria-hidden="true">↗</span></a>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="route-cta">
                <div>
                    <h2>Vuoi percorrerlo davvero?</h2>
                    <p>Apri le indicazioni pedonali e lascia che Google Maps calcoli il tragitto tra le tappe.</p>
                </div>
                <a class="primary-button" href="https://www.google.com/maps/dir/?api=1&amp;origin=42.711998,12.281224&amp;destination=42.711376,12.280478&amp;waypoints=42.711665,12.280987%7C42.712039,12.280675&amp;travelmode=walking"
                    target="_blank" rel="noopener noreferrer">Apri il percorso a piedi <span aria-hidden="true">↗</span></a>
            </div>
            <p class="map-attribution">Mappa © <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener noreferrer">OpenStreetMap</a> contributors · Le foto sono quelle già pubblicate su questo sito.</p>
        </section>
    </main>

    <?php include 'footer.php' ?>
</body>
</html>
