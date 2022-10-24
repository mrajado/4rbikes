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

document.getElementById('enviar').addEventListener('click', enviarEmail);

function enviarEmail(event) {

	var url = "/controller/controller_mail.php";
	
  var nombre = document.getElementById('nombre').value;
  var correo = document.getElementById('correo').value;
  var asunto = document.getElementById('asunto').value;
  var mensaje = document.getElementById('mensaje').value;

	var data = { 'nombre': nombre, 'correo':correo, 'asunto': asunto, 'mensaje':mensaje};
	
	fetch(url, {
	  method: 'POST', 
	  body: JSON.stringify(data), // data can be `string` or {object}!
	  headers:{'Content-Type': 'application/json'}  //input data
	  })
	  
	.then(res => res.json()).then(result => {
			  	
		console.log(result.error);
		
	})
	.catch(error => console.error('Error status:', error));
}