<?php include_once 'includes/templates/header.php';?>

    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non eleifend tortor. Duis nec porttitor nunc, non pulvinar lorem. Nam nec tellus arcu. Nunc auctor ipsum non velit auctor cursus. Quisque consectetur, dolor et hendrerit sagittis,
        velit libero bibendum justo, ac ornare sapien lacus non lectus. Curabitur consequat commodo nisi, cursus hendrerit ipsum tristique eget. Nullam leo dolor, consequat sit amet diam vel, rutrum congue libero.
        </p>
    </section>
    <!--seccion-->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4"type="video/mp4">
                <source src="video/video.webm"type="video/webm">
                <source src="video/video.ogv"type="video/ogv">
            </video>
        </div>
        <!--.contenedor-video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>

                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql= "SELECT * FROM categoria_evento ORDER BY id_categoria DESC";
                            $resultado=$conexion->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <nav class="menu-programa">
                        <?php
                            while($categorias = $resultado->fetch_assoc()) { 
                                $categoria = $categorias['categoria_evento']; 
                                $icono = $categorias['icono']?>
                                <a href="#<?php echo strtolower($categoria) ?>"><i class="fas <?php echo strtolower($icono) ?>"></i> <?php echo $categoria ?></a>
                           <?php } ?>
                    </nav>

                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_categoria_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_invitado = invitados.invitado_id ";
                            $sql .= " AND eventos.id_categoria_evento = 1 ";
                            $sql .= " ORDER BY evento_id LIMIT 2;";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_categoria_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_invitado = invitados.invitado_id ";
                            $sql .= " AND eventos.id_categoria_evento = 2 ";
                            $sql .= " ORDER BY evento_id LIMIT 2;";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_categoria_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_invitado = invitados.invitado_id ";
                            $sql .= " AND eventos.id_categoria_evento = 3 ";
                            $sql .= " ORDER BY evento_id LIMIT 2;";
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <?php
                        $conexion->multi_query($sql);

                        do {
                            $resultado = $conexion->store_result();
                            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                            <?php
                                $i = 0;
                                foreach ($row as $evento) {
                                if($i % 2 == 0) { ?>
                                    <div id="<?php echo strtolower($evento['categoria_evento']) ?>" class="info-curso ocultar clearfix">
                                <?php } ?>

                                    <div class="detalle-evento">
                                        <h3><?php echo mb_convert_encoding($evento["nombre_evento"],'UTF-8'); ?></h3>
                                        <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?> </p>
                                        <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?> </p>
                                        <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?> </p>
                                    </div>
                                    
                                    <?php if($i % 2 == 1) { ?>
                                            <a href="calendario.php" class="button float-right">Ver todos</a>
                                        </div> <!--#talleres-->
                                    <?php } ?>

                                <?php $i++; }
                                
                             $resultado->free(); ?>

                        <?php } while ($conexion->more_results() && $conexion->next_result()); ?>

                </div>
                <!--.programa-evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--.contenido-programa-->
    </section>
    <!--programa-->
    
    <?php include_once 'includes/templates/invitados.php'?>

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p> Invitados</li>
                <li>
                    <p class="numero"></p> Talleres</li>
                <li>
                    <p class="numero"></p> Dias</li>
                <li>
                    <p class="numero"></p> Conferencias
                </li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 día</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>

            </ul>
        </div>
    </section>

    <div id="mapa" class="mapa">

    </div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet elementum lacus eu suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet elementum lacus eu suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src=" img/testimonial.jpg " alt="imagen testimonial ">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
            <div class="testimonial ">
                <blockquote>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet elementum lacus eu suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Regístrate al boletín informativo:</p>
            <h3>gdlwebcamp</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
        <!--.contenido-->
    </div>
    <!--.newsletter-->

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p> días</li>
                <li>
                    <p id="horas" class="numero"></p> horas</li>
                <li>
                    <p id="minutos" class="numero"></p> minutos</li>
                <li>
                    <p id="segundos" class="numero"></p> segundos</li>
            </ul>
        </div>
        <!--.cuenta-regresiva-->
    </section>

    <?php include_once 'includes/templates/footer.php';?>