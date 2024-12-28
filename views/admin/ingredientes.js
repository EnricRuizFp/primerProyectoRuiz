/* -- FUNCIONES -- */
async function fetchIngredientes(){

    const respuesta = await fetch(`?controller=api&action=obtenerAllIngredientes`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );

    const datosPeticion = await respuesta.json();

    const contenedorDatosIngredientes = document.querySelector('#contenedorDatosIngredientes');
    contenedorDatosIngredientes.innerHTML = '';

    datosPeticion.forEach(ingrediente => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${ingrediente.ID}</b></p>
            </div>
            <div class="col-8">
                <p><b>Nombre:</b> ${ingrediente.nombre}</p>
                <p><b>Descripción:</b> ${ingrediente.descripcion}</p>
                <p><b>Categoría:</b> ${ingrediente.categoria}</p>
            </div>
            <div class="col-1">
                <p>${ingrediente.precio_unidad} €</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarIngrediente(${ingrediente.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarIngrediente(${ingrediente.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosIngredientes.appendChild(row);

    });

}

async function fetchIngredientesFiltrados(ingredientes){

    const contenedorDatosIngredientes = document.querySelector('#contenedorDatosIngredientes');
    contenedorDatosIngredientes.innerHTML = '';

    ingredientes.forEach(ingrediente => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${ingrediente.ID}</b></p>
            </div>
            <div class="col-8">
                <p><b>Usuario:</b> ${ingrediente.nombre}</p>
                <p><b>Nombre completo:</b> ${ingrediente.descripcion}</p>
                <p><b>Categoría:</b> ${ingrediente.categoria}</p>
            </div>
            <div class="col-1">
                <p>${ingrediente.precio_unidad}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarIngrediente(${ingrediente.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarIngrediente(${ingrediente.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosIngredientes.appendChild(row);

    });

}

async function filtrarPorCategoria(){

    const respuesta = await fetch(`?controller=api&action=obtenerCategoriasIngredientes`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const categorias = await respuesta.json();

    // Obtener el select del DOM
    const categoriasSelect = document.getElementById('filtrar_ingredientes');

    categoriasSelect.innerHTML = '';

    // Agregar los productos disponibles al select
    categorias.forEach(categoria => {
        const option = document.createElement('option');
        option.value = categoria.categoria;
        option.textContent = categoria.categoria;
        categoriasSelect.appendChild(option);
    });

    // Mostrar el modal
    const modalFiltroIngredientes = new bootstrap.Modal(document.getElementById('modalFiltroIngredientes'));
    modalFiltroIngredientes.show();

}

async function editarIngrediente(id){

    // Llamar a la API para obtener los datos del ingrediente
    const respuesta = await fetch(`?controller=api&action=obtenerIngrediente`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const ingrediente = await respuesta.json();

    // Rellenar los campos del modal
    document.querySelector('#editar_ingrediente_id').value = ingrediente.ID;
    document.querySelector('#editar_nombre_ingrediente').value = ingrediente.nombre;
    document.querySelector('#editar_descripcion_ingrediente').value = ingrediente.descripcion;
    document.querySelector('#editar_precio_ingrediente').value = ingrediente.precio_unidad;
    document.querySelector('#editar_categoria_ingrediente').value = ingrediente.categoria;
    

    // Mostrar el modal
    const modalEditarIngrediente = new bootstrap.Modal(document.getElementById('modalEditarIngrediente'));
    modalEditarIngrediente.show();
}

async function eliminarIngrediente(id){

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "delete", "modificado": Number(id), "table":"ingredientes", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    // Llamar a la API para eliminar el Ingrediente
    const respuesta = await fetch(`?controller=api&action=eliminarIngrediente`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const resultado = await respuesta.json();

    if(resultado.error){
        alert(resultado.error);
    }else{
        alert("Ingrediente eliminado");

        fetchIngredientes();
    }

}


/* -- BOTONES -- */
document.querySelector('#botonObtenerAllIngredientes').addEventListener('click', function() {
    fetchIngredientes();
});



/* -- FORMULARIOS -- */
document.querySelector('#formularioCrearIngrediente').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "create", "modificado": null, "table":"ingredientes", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const datos = {
        nombre: document.querySelector('#añadir_nombre_ingrediente').value,
        descripcion: document.querySelector('#añadir_descripcion_ingrediente').value,
        precio: document.querySelector('#añadir_precio_ingrediente').value,
        categoria: document.querySelector('#añadir_categoria_ingrediente').value
    };

    const respuesta = await fetch(`?controller=api&action=crearIngrediente`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const resultado = await respuesta.json();

    if(resultado.error){
        alert(resultado.error);
    }else{
        alert("Ingrediente creado");

        fetchIngredientes();

        const modalCrearIngrediente = bootstrap.Modal.getInstance(document.getElementById('modalCrearIngrediente'));
        modalCrearIngrediente.hide();
    }

});

document.querySelector('#formularioFiltroIngredientes').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        filtro: document.querySelector('#filtrar_ingredientes').value
    };

    const respuesta = await fetch(`?controller=api&action=obtenerIngredientes`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const ingredientes = await respuesta.json();

    if(ingredientes.error){
        alert(ingredientes.error);
    }else{

        fetchIngredientesFiltrados(ingredientes);

        const modalFiltroIngredientes = bootstrap.Modal.getInstance(document.getElementById('modalFiltroIngredientes'));
        modalFiltroIngredientes.hide();
    }

});

document.querySelector('#formularioEditarIngrediente').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        id: document.querySelector('#editar_ingrediente_id').value,
        nombre: document.querySelector('#editar_nombre_ingrediente').value,
        descripcion: document.querySelector('#editar_descripcion_ingrediente').value,
        precio: document.querySelector('#editar_precio_ingrediente').value,
        categoria: document.querySelector('#editar_categoria_ingrediente').value
    };

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "edit", "modificado": Number(datos.id), "table":"ingredientes", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const respuesta = await fetch(`?controller=api&action=editarIngrediente`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const resultado = await respuesta.json();

    if(resultado.error){
        alert(resultado.error);
    }else{
        alert("Ingrediente actualizado");

        fetchIngredientes();

        const modalEditarIngrediente = bootstrap.Modal.getInstance(document.getElementById('modalEditarIngrediente'));
        modalEditarIngrediente.hide();
    }
});