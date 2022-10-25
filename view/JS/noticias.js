document.addEventListener("DOMContentLoaded", function (event) {
	loadNoticia();
});

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



function loadNoticia(){
	
	var url= "/controller/controller_index.php";
	
	fetch(url)
	.then(res => res.json()).then(result => {
		
   		var MisNoticias = result.list;
   		
   		VerNoticias(MisNoticias);

   		
	})
	.catch(error => console.error('Error status:', error));	
		
}; //end loadNoticias

function VerNoticias(ListaNoticias){
	CodigoHTML="";
	
	ListaNoticias.forEach(elemNoticia => {
		// CodigoHTML += elemNoticia.imagenNoticia;
		CodigoHTML += "<div class='noticia'><div class='imagen'><img src="+elemNoticia.imagenNoticia+"></div><div class='texto'>";
		CodigoHTML += "<div class='titulo'>"+elemNoticia.titulo+"</div><div class='parrafo'>"+elemNoticia.texto+"</div><div class='fecha'>"+"Noticia publicada en: "+elemNoticia.fecha+"</div>";
		CodigoHTML += "</div></div>";
	});

	document.getElementById('container-noticias').innerHTML=CodigoHTML;

}