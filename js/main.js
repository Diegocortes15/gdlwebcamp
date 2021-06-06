/*(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function() {

        console.log('Listo');

    }); //DOM CONTENT LOADED
})();*/

(function() {
    "use strict";

    let regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {

        if (document.getElementById('mapa')) {
            var map = L.map('mapa').setView([4.683272, -74.041983], 18);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([4.683272, -74.041983]).addTo(map)
                .bindPopup('GDLWebCamp 2020<br> Universidad Militar Nueva Granada.')
                .openPopup();
            // todo el código que empleas en el mapa
        }

        //Campos Datos usuario
        let nombre = document.getElementById('nombre');
        let apellido = document.getElementById('apellido');
        let email = document.getElementById('email');

        // Campos pases
        let pase_dia = document.getElementById('pase_dia');
        let pase_completo = document.getElementById('pase_completo');
        let pase_dosdias = document.getElementById('pase_dosdias');

        //Botones y divs
        let calcular = document.getElementById('calcular');
        let errorDiv = document.getElementById('error');
        let botonRegistro = document.getElementById('btnRegistro');
        let lista_productos = document.getElementById('lista_productos');
        let suma = document.getElementById('suma-total');

        //Extras

        let camisas = document.getElementById('camisa_evento');
        let etiquetas = document.getElementById('etiquetas');

        botonRegistro.disabled = true;
        botonRegistro.style.opacity = "0.5";
        botonRegistro.style.cursor = "auto";

        if (document.getElementById('calcular')) {

            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Este campo es obligatorio';
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                    errorDiv.display = 'none'
                }
            }

            function validarMail() {
                if (this.value.indexOf('@') > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = 'Debe tener almenos una @';
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }
            }

            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert('Debes elegir un regalo');
                    regalo.focus();
                } else {
                    let boletosDia = parseInt(pase_dia.value) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value) || 0,
                        boletoCompleto = parseInt(pase_completo.value) || 0,
                        cantCamisas = parseInt(camisas.value) || 0,
                        cantEtiquetas = parseInt(etiquetas.value) || 0;

                    let totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                    let listadoProductos = [];

                    if (boletosDia == 1) {
                        listadoProductos.push(`${boletosDia} Pase por día`);
                    } else if (boletosDia > 1) {
                        listadoProductos.push(`${boletosDia} Pases por día`);
                    }

                    if (boletos2Dias == 1) {
                        listadoProductos.push(`${boletos2Dias} Pase por 2 días`);
                    } else if (boletos2Dias > 1) {
                        listadoProductos.push(`${boletos2Dias} Pases por 2 días`);
                    }

                    if (boletoCompleto == 1) {
                        listadoProductos.push(`${boletoCompleto} Pase Completo`);
                    } else if (boletoCompleto > 1) {
                        listadoProductos.push(`${boletoCompleto} Pases Completos`);
                    }

                    if (cantCamisas == 1) {
                        listadoProductos.push(`${cantCamisas} Camisa`);
                    } else if (cantCamisas > 1) {
                        listadoProductos.push(`${cantCamisas} Camisas`);
                    }

                    if (cantEtiquetas == 1) {
                        listadoProductos.push(`${cantEtiquetas} Etiqueta`);
                    } else if (cantEtiquetas > 1) {
                        listadoProductos.push(`${cantEtiquetas} Etiquetas`);
                    }

                    lista_productos.style.display = 'block';
                    lista_productos.innerHTML = '';

                    for (let i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                    }

                    suma.innerHTML = `$ ${totalPagar.toFixed(2)}`;


                    botonRegistro.disabled = false;
                    botonRegistro.style.opacity = "1.0";
                    botonRegistro.style.cursor = "pointer";

                    document.getElementById('total_pedido').value = totalPagar;
                }
            }

            function mostrarDias() {
                let boletosDia = parseInt(pase_dia.value) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value) || 0,
                    boletoCompleto = parseInt(pase_completo.value) || 0;

                let diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                    console.log(diasElegidos);
                } else {
                    document.querySelector('#viernes').style.display = 'none';
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                    console.log(diasElegidos);
                } else {
                    document.querySelector('#viernes').style.display = 'none';
                    document.querySelector('#sabado').style.display = 'none';
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                    console.log(diasElegidos);
                } else {
                    document.querySelector('#viernes').style.display = 'none';
                    document.querySelector('#sabado').style.display = 'none';
                    document.querySelector('#domingo').style.display = 'none';
                }
                for (let i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }
        }

    }); //DOM CONTENT LOADED
})();

$(function() {

    //Lettering
    $('.nombre-sitio').lettering();

    //Agregar Clase Menú

    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    //Menu fijo
    let windowHeight = $(window).height();
    let barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
        let scroll = $(window).scrollTop();

        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': +barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0' });
        }
    });

    //Menu Responsive

    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });

    $(window).resize(function() {
        let barraAncho = $('.barra').width();
        if (barraAncho > 768) {
            $('.navegacion-principal').css({ 'display': 'block' });
        } else {
            $('.navegacion-principal').css({ 'display': 'none' });
        }
    });

    //Programa de Conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        let enlace = $(this).attr('href');
        $(enlace).fadeIn();
        return false;
    });

    //Animaciones para los Numeros
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1600);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1800);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1400);

    //Cuenta Regresiva
    $('.cuenta-regresiva').countdown('2021/06/7 00:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //ColorBox
    $('.invitado-info').colorbox({ inline: true, width: "75%" });
});