window.onscroll = function () { stick(),stick2()};

var navbar = document.getElementById("navbar1");
var navbar2 = document.getElementById("navbar2");
var header = document.getElementById("sect1");



var sticky = navbar.offsetTop;
var sticky2 = navbar2.offsetTop;
var color = header.offsetTop;

function stick() {

  if (window.pageYOffset > sticky) {
    navbar.classList.add("stickyNav");
  }else{
    navbar.classList.remove("stickyNav");
  }

}

function stick2() {

    if (window.pageYOffset > sticky2) {
      navbar2.classList.add("stickyNav2");
    }else{
      navbar2.classList.remove("stickyNav2");
    }
  
}

$(document).ready(main);

var contador = 1;

function main () {
    $('.bi bi-list').click(function(){
        if (contador == 1) {
            $('nav').animate({
                left: '0'
            });
            contador = 0;
        } else {
            contador = 1;
            $('nav').animate({
                left: '-100%'
            });
        }
    });

    // Mostramos y ocultamos submenus
    $('.submenu').click(function(){
        $(this).children('.children').slideToggle();
    });
}