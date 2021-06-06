<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>gdlwebcamp</span></h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus, nunc id imperdiet sodales, elit erat pharetra urna, vel vestibulum diam dui quis nisi. Phasellus feugiat condimentum lectus, a volutpat diam pretium et. Nam sit amet volutpat arcu.
                    Etiam condimentum vel nisl at consequat. Quisque aliquet felis tortor, vitae placerat tellus commodo a. Cras facilisis quam et eros ullamcorper sagittis. Praesent arcu lectus, viverra vel lectus nec, vulputate pretium tellus. Vivamus
                    sollicitudin et neque ac molestie.
                </p>
            </div>
            <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus, nunc id imperdiet sodales, elit erat pharetra urna, vel vestibulum diam dui quis nisi.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus, nunc id imperdiet sodales, elit erat pharetra urna, vel vestibulum diam dui quis nisi.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus, nunc id imperdiet sodales, elit erat pharetra urna, vel vestibulum diam dui quis nisi.</li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-pinterest-p"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>

        <p class="copyright">Todos los derechos Reservados GDLWEBCAMP 2020 &copy</p>

    </footer>

    <!-----------------
        AutorEnds
    ------------------>

    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>

    <?php
        //retorna el archivo que esta cargando la pagina actual
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php" ,"", $archivo);

        if($pagina == "invitados" || $pagina == "index")
        {
            echo '<script src="js/jquery.colorbox.js"></script>';
        } else if($pagina == "conferencia")
        {
            echo '<script src="js/lightbox.js"></script>';
        }
        
    ?>
    
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview');
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>