/*NABVAR*/
window.onscroll = function () { stick(),stick2()};

var navbar = document.getElementById("navbar1");
var navbar2 = document.getElementById("navbar2");

var sticky = navbar.offsetTop;
var sticky2 = navbar2.offsetTop;

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


//Comienzo
var correo;
var pasahitza;
var fallo;




function dosArroba(e) {
    correo1 = document.getElementById("tomarCorreo").value;
    correo2 = document.querySelector(".tomarCorreo").value;

    if (e.key == "@") {
  
      if (correo1.indexOf('@') >= 0) {
        alert("La clave ya tiene un @");
        return false;
      }
      if (correo2.indexOf('@') >= 0) {
        alert("La clave ya tiene un @");
        return false;
      }
    }
  
}






/*LOGIN*/
var iniciar = document.getElementById("btnLogin");
iniciar.addEventListener("click", inicioSesion);


function inicioSesion(event){

    codigo = event.target.value;
    correo = document.getElementById("tomarCorreo").value;
    pasahitza = document.getElementById("tomarPasahitza").value;

    if (correo == "" || pasahitza == ""){
        alert("No has introducido correo o clave");
        return false;
    }



    var datos = {"correo": correo, "pasahitza": pasahitza};

    var url = "../../controller/controller_login.php";

    
    fetch(url, {
	  method: 'POST', 
	  body: JSON.stringify(datos), 
	  headers:{'Content-Type': 'application/json'}
	  })
	  
        .then(res => res.json())	
        .then(result => {

            var persona = result.list;

            if (correo == persona[0].correo && pasahitza == persona[0].contrasena){
              console.log("Bienvenido "+persona[0].correo);

              //colocar nombre
              cuenta = document.getElementById("text6");
              cuenta.innerHTML=persona[0].correo;

              if (persona[0].admin == 1){
                alert("Usted es admin");
                window.location.href="../html/tablas.html";

              } else{
                alert("Usted no es admin");
                window.location.href="../html/index.html";

              }



            } else {
              //fallo
              console.log(persona);
              fallo = document.getElementById("fallo");
              fallo.style="display:inline-block;";

            }


        })
        .catch(error => console.error('Error status:', error));	

}




/*INSERTAR*/ 
var insertar = document.getElementById("btnSumar");
insertar.addEventListener("click", insertarCuenta);

function insertarCuenta(){
	
	var correo=document.querySelector(".tomarCorreo").value;
	var pasahitza=document.querySelector(".tomarPasahitza").value;
  var anular=document.querySelector(".repetirPasahitza").value;



  /*Claves diferentes*/
  if (anular != pasahitza){
    alert("Las claves no coinciden");
    return false;
  }

		    
  if (correo == "" || pasahitza == "" || anular == ""){
    alert("No has introducido correo o clave");
    return false;
  }


  /*Llamada*/
  var url = "../../controller/controller_usuarioInsert.php";	
	var datos = {'correo':correo, 'pasahitza': pasahitza};
	
	fetch(url, {
	  method: 'POST', 
	  body: JSON.stringify(datos), 
	  headers:{'Content-Type': 'application/json'}
	  })
	  
	.then(res => res.json())
		.then(result => {
       		alert("Su cuenta ha sido creada");
	})
	.catch(error => console.error('Error status:', error));	
}
