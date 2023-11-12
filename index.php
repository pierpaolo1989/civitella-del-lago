<!DOCTYPE html>
<html amp>
<?php include 'header.php' ?>
<body>
    <div id="top-page"></div> <amp-animation id="showScrollToTopAnim" layout="nodisplay">
        <script
            type="application/json">                                             {                                                 "duration": "200ms",                                                 "fill": "both",                                                 "iterations": "1",                                                 "direction": "alternate",                                                 "animations": [                                                     {                                                         "selector": "#scrollToTopButton",                                                         "keyframes": [                                                             { "opacity": "0.4", "visibility": "visible" }                                                         ]                                                     }                                                 ]                                             }                                             </script>
    </amp-animation> <amp-animation id="hideScrollToTopAnim" layout="nodisplay">
        <script
            type="application/json">                                             {                                                 "duration": "200ms",                                                 "fill": "both",                                                 "iterations": "1",                                                 "direction": "alternate",                                                 "animations": [                                                     {                                                         "selector": "#scrollToTopButton",                                                         "keyframes": [                                                             { "opacity": "0", "visibility": "hidden" }                                                         ]                                                     }                                                 ]                                             }                                             </script>
    </amp-animation>
    <div id="scrollToTopMarker"> <amp-position-observer
            on="enter:hideScrollToTopAnim.start; exit:showScrollToTopAnim.start" layout="nodisplay">
        </amp-position-observer> </div><amp-sidebar id="sidebar" class="cid-rpfciQyPtf" layout="nodisplay" side="right">
        <div class="builder-sidebar" id="builder-sidebar">
            <button on="tap:sidebar.close" class="close-sidebar">
                <span></span>
                <span></span>
            </button>

            <ul class="navbar-nav nav-dropdown navbar-nav-top-padding" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-primary display-7" href="storia.php">Storia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-primary display-7" href="servizi.php">Servizi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-primary display-7" href="sport.php">
                        Sport e trekking</a>
                </li>
                <li class="nav-item"><a class="nav-link link text-primary display-7" href="http://www.ovopinto.it">
                        Ovo Pinto</a></li>
            </ul>

            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7"
                    href="index.php#contacts2-5">
                    Contattaci</a></div>
        </div>
    </amp-sidebar>

    <section class="menu horizontal-menu cid-rpfciQyPtf" id="menu2-0">


        <nav class="navbar navbar-dropdown navbar-expand-lg">
            <div class="brand">
                <span class="brand-logo">
                    <a href="index.php"><img src="assets/images/logo.png" width="65%;" /></a>
                </span>

            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav nav-dropdown navbar-nav-top-padding" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-7" href="storia.php">Storia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-7" href="servizi.php">Servizi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-7" href="sport.php">
                            Sport e trekking</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-primary display-7" href="http://www.ovopinto.it"
                            target="blank">
                            Ovo Pinto</a></li>
                </ul>

                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7"
                        href="index.php#contacts2-5">
                        Contattaci</a></div>
            </div>

            <button on="tap:sidebar.toggle" class="ampstart-btn hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </section>

    <section class="engine"><a href="https://mobirise.info/h">create a web page</a></section>
    <section class="header1 cid-rpffBrvvly mbr-fullscreen" id="header1-8">

        <div class="container">
            <h1 class="mbr-section-title mbr-fonts-style align-right mbr-bold mbr-white display-1">
                <strong>Civitella del Lago</strong>
            </h1>
            <h3 class="mbr-section-subtitle mbr-fonts-style align-right mbr-white mbr-light display-2">Storia, arte e
                natura</h3>

            <div class="mbr-section-btn align-right"><a class="btn btn-md btn-primary display-4" href="tour.php">Tour
                    virtuale</a></div>
        </div>

    </section>

    <section class="features10 cid-rpfcx7Uhzg" id="features10-4">

        <div class="container">
            <div class="mbr-row mbr-justify-content-center">
                <div class="image-block mbr-col-sm-12 mbr-col-md-6">
                    <amp-img src="assets/images/civitella-del-lago-1046x640.jpg" layout="responsive" width="523"
                        height="320" alt="Mobirise" class="mobirise-loader">
                        <div placeholder="" class="placeholder">
                            <div class="mobirise-spinner">
                                <em></em>
                                <em></em>
                                <em></em>
                            </div>
                        </div>

                    </amp-img>
                </div>
                <div class="text-block mbr-col-sm-12 mbr-col-md-6">
                    <h3 class="mbr-section-title mbr-fonts-style align-left display-5">
                        PERCHE' VISITARE IL BORGO</h3>
                    <p class="mbr-fonts-style mbr-text align-left display-7">
                        Perchè è un paesino immerso nel verde e nella pace delle colline umbre, a metà strada tra Todi
                        ed Orvieto. Un luogo ideale per evadere dal caos delle grandi città e scoprire il benessere
                        psico-fisico che il buon cibo, le belle passeggiate e l'aria pulita possono regalarti.
                    </p>
                    <div class="mbr-section-btn align-left"><a class="btn btn-sm btn-primary display-4"
                            href="servizi.php" target="_blank">Continua a leggere</a></div>
                </div>
                <div class="container text-center" style="margin-top:3%;">
                    <span id="flag1" class="col-md-1 col-sm-2 col-xs-3 center" style="width: 10%;"><span
                            class="click flag-wrapper"><span
                                class="img-thumbnail flag flag-icon-background flag-icon-it targetBorder selected cursor"
                                title="it" id="it"></span></span></span>
                    <span id="flag2" class="col-md-1 col-sm-2 col-xs-3 center" style="width: 10%;"><span
                            class="click flag-wrapper"><span
                                class="img-thumbnail flag flag-icon-background flag-icon-gb targetBorder cursor"
                                title="gb" id="gb"></span></span></span>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM -->
    <section class="contacts2 cid-rpfcBxpkNz" id="contacts2-5">
    <div class="container">
   <h2 class="align-center mbr-fonts-style mbr-light display-2">Keep in touch!</h2>
   <h3 class="mbr-section-subtitle align-center mbr-fonts-style mbr-light display-5">Contattaci per
      segnalazioni, suggerimenti o altro
   </h3>
   <div class="mbr-row mbr-justify-content-center">
      <div class="mbr-col-lg-8 mbr-col-md-12" data-form-type="formoid">
         <form class="mbr-form mbr-justify-content-center" method="post" action="">
            <div id="submit-success" style="display:none;color:green; text-align:center;margin-bottom:1%;">
            <?php echo $msg; ?>
            </div>
            <div id="submit-error" style="display:none;color:red;text-align:center;margin-bottom:1%;">
            <?php echo $msg; ?>
            </div>
            <div class="fieldset">
               <div data-for="form[data][0][1]" class="split-row">
                  <input type="text" name="nome" data-form-field="Name" placeholder="Nome" required=""
                     id="nome">
               </div>
               <div data-for="form[data][1][1]" class="split-row">
                  <input type="text" name="cognome" data-form-field="Last Name" placeholder="Cognome"
                     required="" id="cognome">
               </div>
               <div data-for="form[data][2][1]" class="split-row">
                  <input type="email" name="email_user" data-form-field="Email" placeholder="Email"
                     required="" id="email_user">
               </div>
               <div class="area" data-for="form[data][3][1]">
                  <textarea name="messaggio_user" rows="7" data-form-field="Message"
                     placeholder="Messaggio" id="messaggio_user"></textarea>
               </div>
            </div>
            <div class="captcha align-center">
               <div class="spinner">
                  <label>
                  <input type="checkbox" onclick="$(this).attr('disabled','disabled');" required="">
                  <span class="checkmark"><span>&nbsp;</span></span>
                  </label>
               </div>
               <div class="text">
                  I'm not a robot
               </div>
               <div class="logo">
                  <img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/" />
                  <p>reCAPTCHA</p>
                  <small><a href="informativa.php" target="_blank">Privacy - Terms</a></small>
               </div>
            </div>
            <div class="mbr-section-btn align-center">
               <span class="gdpr-block ">Continuando accetti i nostri termini di
               servizio e la nostra Privacy
               Policy.</span>
               <button class="btn btn-form btn-primary display-4" id="invioMail">INVIA</button>
            </div>
         </form>
      </div>
   </div>
</div>
    </section>
    <!-- GALLERY -->
    <section class="gallery1 cid-s6ZnNJ4Pps" id="gallery2-r">
        <div class="container">
            <div class="title align-center">
                <h3 class="mbr-section-title mbr-light mbr-fonts-style display-1">Galleria</h3>
            </div>
            <div class="mbr-row mbr-justify-content-center">
                <div class="image-wrap mbr-col-sm-12 mbr-col-lg-4 lg-px mbr-col-md-6 pb">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader"
                            src="assets/images/civitella_del_lago_piazza_vittorio_emanuele.jpg" layout="responsive"
                            height="191" width="254.66666666666666" alt="Civitella del lago" on="tap:lightbox1"
                            role="button" tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px pb">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader"
                            src="assets/images/whatsapp-image-2020-07-31-at-21.20.01-3-676x568.jpg" layout="responsive"
                            height="214" width="254.6901408450704" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px pb">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader"
                            src="assets/images/civitella_del_lago_corbara.jpg" layout="responsive"
                            height="191" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/civitella_del_lago_vicolo.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/test2.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/civitella_del_lago_via_centrale.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader"
                            src="assets/images/civitella_del_lago_sunset.jpg" layout="responsive"
                            height="191" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/test3.jpg" layout="responsive"
                            height="191" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/test.jpg" layout="responsive"
                            height="191" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/civitella_del_lago_tramonto.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/civitella_del_lago_via_tortuosa.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
                <div class="image-wrap mbr-col-sm-12 mbr-col-md-6 mbr-col-lg-4 lg-px last-child">
                    <div class="image-box cursor">
                        <amp-img class="mobirise-loader" src="assets/images/civitella/orvieto.jpg" layout="responsive"
                            height="400" width="254.66666666666666" alt="Mobirise" on="tap:lightbox1" role="button"
                            tabindex="0">
                            <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div>
                            </div>

                        </amp-img>
                        <div class="icon-wrap" on="tap:lightbox1" role="button" tabindex="0">
                            <span class="amp-iconfont mbri-search"></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <amp-image-lightbox id="lightbox1" layout="nodisplay">
            <a class="control" data-close-button-aria-label="Close">
                <span class="close"></span>
            </a>
        </amp-image-lightbox>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php' ?>
    <button id="scrollToTopButton" on="tap:top-page.scrollTo(duration=200)"> <a class="scroll-to-top-arrow"></a>
    </button>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $('.targetBorder').on('click', function () {
            $('.targetBorder').removeClass('selected');
            $(this).addClass('selected');
        });
        $('#it').click(function (e) {
            if (typeof (Storage) !== "undefined") {
                // Store
                localStorage.setItem("language", "IT");
            }
        })
        $('#gb').click(function (e) {
            if (typeof (Storage) !== "undefined") {
                // Store
                localStorage.setItem("language", "EN");
            }
        })
    </script>
</body>

</html>