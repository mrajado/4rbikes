var recuerdos;
var adapto;
var kitelec;

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



function enseñar(esto){
  ver=document.getElementsByClassName("ver")
  for (let i = 0; i < ver.length; i++) {
    ver[i].style.display='none';
  }
	vista=document.getElementById(esto).style.display;
	if (vista=='none'){
		vista='block';
}
	else
		vista='none';

	document.getElementById(esto).style.display = vista;
}