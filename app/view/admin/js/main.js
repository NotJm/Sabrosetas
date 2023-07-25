// Declarando la variable
let owl = $(".owl-carousel"); // Mediante la libreria jquery para poder encontrar elementos mas rapido

// Cuando el documento se haya cargado por completo el owl se ejecutara
// Configuracio del carousel de imagenes mediante la libreria jquery y owl
$(document).ready(function () {
  owl.owlCarousel({
    // Se ejecute el movimiento solo
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,

    // Repita por siempre
    loop:true,

    // Configuracion responsiva para las imagenes
    navigation: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    items: 1,
    itemsDesktop: false,
    itemsDesktopSmall: false,
    itemsTablet: false,
    itemsMobible: false,
  });
});