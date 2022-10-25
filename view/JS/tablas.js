loadComponentes();
loadMarca();

document.getElementById("btnInsertar").addEventListener("click", execInsertar);



/*Funcion cargar*/
function loadComponentes() {

    var url = "../../controller/controller_cargarComponentes.php";


    fetch(url, {
        method: 'GET',
    })
        .then(res => res.json()).then(result => {

            console.log(result.list);
            var productos = result.list;

            var newRow = "<br/><h2>COMPONENTES</h2><br/>";
            newRow += "<table > ";
            newRow += "<tr><th>idComponente</th><th>nombre</th><th>tipo</th><th>stock</th><th>Eliminar</th><th>Cambiar</th><th>idMarca</th></tr>";

            for (let i = 0; i < productos.length; i++) {

                newRow += "<tr>" + "<td>" + productos[i].idComponente + "</td>"
                    + "<td>" + productos[i].nombre + "</td>"
                    + "<td>" + productos[i].tipo + "</td>"
                    + "<td>" + productos[i].stock + "</td>"
                    + "<td><button class='btnBorrar' value='" + productos[i].idComponente + "'>DELETE</button></td>"
                    + "<td><button class='btnActualizar' value='" + productos[i].idComponente + "'>UPDATE</button></td>"
                    + "<td>" + productos[i].objMarca.idMarca + "</td>"
                    + "</tr>"
            }
            newRow += "</table>";


            document.getElementById("container1").innerHTML = newRow;

            //Eliminar
            var deletear = document.querySelectorAll(".btnBorrar")
            var actualizar = document.querySelectorAll(".btnActualizar")

            for (let i = 0; i < deletear.length; i++) {
                deletear[i].addEventListener("click", execEliminar, false);
                actualizar[i].addEventListener("click", mostrarUpdate, false);

            }


        })
        .catch(error => console.error('Error status:', error));


}

/*Cargar marcas */

function loadMarca() {
    var url2 = "../../controller/controller_cargaraMarcas.php";

    fetch(url2, {
        method: 'GET',
    })
        .then(res => res.json()).then(result => {
            var marcas = result.list;

            for (let i = 0; i < marcas.length; i++) {

                document.getElementById("contMarca").innerHTML += "<option value='" + marcas[i].idMarca + "'>" + marcas[i].nombre + "</option>"
            }

        })
        .catch(error => console.error('Error status:', error));


}


/*Funcion sumar*/
function execInsertar() {

    var nombre = document.getElementById("contNombre").value;
    var tipo = document.getElementById("contTipo").value;
    var stock = document.getElementById("contStock").value;
    var idMarca = document.getElementById("contMarca").value;

    var url = "../../controller/controller_insertarComponente.php";

    var data = { 'nombre': nombre, 'tipo': tipo, 'stock': stock, 'idMarca': idMarca };

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: { 'Content-Type': 'application/json' }
    })

        .then(res => res.json())
        .then(result => {

            console.log(result.error);
            alert(result.error);
            loadComponentes();
            document.getElementById("contNombre").value = "";
            document.getElementById("contStock").value = "";

        })
        .catch(error => console.error('Error status:', error));
}


function execEliminar(event) {

    var idComponente = event.currentTarget.value;
    var url = "../../controller/controller_deleteComponentes.php";

    var datos = { 'idComponente': idComponente };

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(datos), // data can be `string` or {object}!
        headers: { 'Content-Type': 'application/json' }  //input data
    })

        .then(res => res.json()).then(result => {

            console.log(result.error);
            alert(result.error);
            loadComponentes();
            //location.reload();  //recarga la pagina
        })
        .catch(error => console.error('Error status:', error));
}


function mostrarUpdate(event){

    var leer = event.target.value;
	
	idComponente = document.getElementById("valorIdComponente");
	nombre = document.getElementById("valorNombre");
	tipo = document.getElementById("valorTipo");
	stock = document.getElementById("valorStock");
	nombreMarca = document.getElementById("valorMarca");

	document.getElementById("contenedor2").style.display = "block";
		
	var url = "../../controller/controller_mostrarAldatu.php";
	var data = {'leer':leer};

    fetch(url, {
        method: 'POST', 
        body: JSON.stringify(data), // data can be `string` or {object}!
        headers:{'Content-Type': 'application/json'}  //input data
        })
        
      .then(res => res.json())
      .then(result => {
  
                 var componente = result.list;       		
                 console.log(componente);
  
                 idComponente.value=componente[0].idComponente;
                 nombre.value=componente[0].nombre;
                 tipo.value=componente[0].tipo;
                 stock.value=componente[0].stock;
                 //nombreMarca.value=book[0].numPag;
                 
      })
      .catch(error => console.error('Error status:', error));	
}