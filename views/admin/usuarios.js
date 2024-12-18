const API_URL = "http://localhost/DAW/PRIMER PROYECTO/Pagina Web/controllers/apiController.php";
let usuarios;

async function fetchUsuarios(action){

    const respuesta = await fetch(API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }       
     }
    );
    console.log('datosPeticion');

    const datosPeticion = await respuesta.json();
    console.log(datosPeticion);

    // fetch(`?controller=api&action=obtenerAllUsuarios`,)
    //     .then(response => {
    //         console.log(response)
    //         response.json()
    //     })
    //     .then(data => {

    //         const tableBody = document.querySelector('#usuariosTable tbody');
    //         tableBody.innerHTML = '';

    //         data.forEach(usuario => {

    //             const row = document.createElement('<tr>');
    //             row.innerHTML = `
    //                 <td>${usuario.ID}</td>
    //                 <td>${usuario.usuario}</td>
    //                 <td>${usuario.nombre_completo}</td>
    //                 <td>${usuario.email}</td>
    //                 <td>${usuario.telefono}</td>
    //                 <td>${usuario.fecha_registro}</td>
    //                 <td>${usuario.contraseña}</td>
    //                 <td>${usuario.tarjeta_bancaria}</td>
    //                 <td>${usuario.fecha_vencimiento}</td>
    //                 <td>${usuario.cvv}</td>
    //             `;
    //             tableBody.appendChild(row);

    //         });

    //     })
    //     .catch(error => console.error('Error: ', error));

}


/* -- BOTONES -- */
document.querySelector('#botonObtenerAllUsuarios').addEventListener('click', function() {
    console.log('111');
    fetchUsuarios('obtenerAllUsuarios');
});