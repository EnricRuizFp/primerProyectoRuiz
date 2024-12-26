/* -- FUNCIONES -- */
async function fetchOfertas(){

    const respuesta = await fetch(`?controller=api&action=obtenerAllOfertas`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const datosPeticion = await respuesta.json();

    const contenedorDatosOfertas = document.querySelector('#contenedorDatosOfertas');
    contenedorDatosOfertas.innerHTML = '';

    datosPeticion.forEach(oferta => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${oferta.ID}</b></p>
            </div>
            <div class="col-5">
                <p><b>Nombre:</b> ${oferta.nombre}</p>
                <p><b>Descripción:</b> ${oferta.descripcion}</p>
            </div>
            <div class="col-2">
                <p>${oferta.descuento} ${oferta.tipo}</p>
            </div>
            <div class="col-2">
                <p><b>Fecha de inicio:</b> ${oferta.fecha_inicio}</p>
                <p><b>Fecha de fin:</b> ${oferta.fecha_fin}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarOferta(${oferta.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarOferta(${oferta.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosOfertas.appendChild(row);

    });

}

async function fetchOfertasFiltradas(ofertas){

    const contenedorDatosOfertas = document.querySelector('#contenedorDatosOfertas');
    contenedorDatosOfertas.innerHTML = '';

    ofertas.forEach(oferta => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${oferta.ID}</b></p>
            </div>
            <div class="col-5">
                <p><b>Nombre:</b> ${oferta.nombre}</p>
                <p><b>Descripción:</b> ${oferta.descripcion}</p>
            </div>
            <div class="col-2">
                <p>${oferta.descuento} ${oferta.tipo}</p>
            </div>
            <div class="col-2">
                <p><b>Fecha de inicio:</b> ${oferta.fecha_inicio}</p>
                <p><b>Fecha de fin:</b> ${oferta.fecha_fin}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarOferta(${oferta.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarOferta(${oferta.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosOfertas.appendChild(row);

    });

}

async function editarOferta(id){

    // Llamar a la API para obtener los datos del ingrediente
    const respuesta = await fetch(`?controller=api&action=obtenerOferta`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const oferta = await respuesta.json();

    console.log(oferta);

    // Rellenar los campos del modal
    document.querySelector('#editar_id_oferta').value = oferta.ID;
    document.querySelector('#editar_nombre_oferta').value = oferta.nombre;
    document.querySelector('#editar_descripcion_oferta').value = oferta.descripcion;
    document.querySelector('#editar_descuento_oferta').value = oferta.descuento;
    
    // Select de descuento
    const tipoSelect = document.querySelector('#editar_tipo_oferta');
    tipoSelect.innerHTML = '';
    
    const tipos = ['%', '€'];
    tipos.forEach(tipo => {
        const optionElement = document.createElement('option');
        optionElement.value = tipo;
        if(tipo == "%"){
            optionElement.textContent = "Porcentaje";
        }else{
            optionElement.textContent = "Euros";
        }

        // Si la opción coincide con la de la oferta se preselecciona
        if (tipo == oferta.tipo) {
            optionElement.selected = true;
        }

        tipoSelect.appendChild(optionElement);
    });

    document.querySelector('#editar_fecha_inicio_oferta').value = oferta.fecha_inicio;
    document.querySelector('#editar_fecha_final_oferta').value = oferta.fecha_fin;
    
    // Mostrar el modal
    const modalEditarOferta = new bootstrap.Modal(document.getElementById('modalEditarOferta'));
    modalEditarOferta.show();
}

async function eliminarOferta(id){

    // Llamar a la API para eliminar el Ingrediente
    const respuesta = await fetch(`?controller=api&action=eliminarOferta`, 
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
        alert("Oferta eliminada.");

        fetchOfertas();
    }

}

async function filtrarPorTipo(){

    // Mostrar el modal
    const modalFiltroOfertas = new bootstrap.Modal(document.getElementById('modalFiltroOfertas'));
    modalFiltroOfertas.show();

}

/* -- BOTONES -- */
document.querySelector('#botonObtenerAllOfertas').addEventListener('click', function() {
    fetchOfertas();
});


/* -- FORMULARIOS -- */
document.querySelector('#formularioCrearOferta').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        nombre: document.querySelector('#añadir_nombre_oferta').value,
        descripcion: document.querySelector('#añadir_descripcion_oferta').value,
        descuento: document.querySelector('#añadir_descuento_oferta').value,
        tipo: document.querySelector('#añadir_tipo_oferta').value,
        fecha_inicio: document.querySelector('#añadir_fecha_inicio_oferta').value,
        fecha_fin: document.querySelector('#añadir_fecha_final_oferta').value
    };

    const respuesta = await fetch(`?controller=api&action=crearOferta`, {
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
        alert("Oferta creada");

        fetchOfertas();

        const modalCrearOferta = bootstrap.Modal.getInstance(document.getElementById('modalCrearOferta'));
        modalCrearOferta.hide();
    }

});

document.querySelector('#formularioEditarOferta').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        id: document.querySelector('#editar_id_oferta').value,
        nombre: document.querySelector('#editar_nombre_oferta').value,
        descripcion: document.querySelector('#editar_descripcion_oferta').value,
        descuento: document.querySelector('#editar_descuento_oferta').value,
        tipo: document.querySelector('#editar_tipo_oferta').value,
        fecha_inicio: document.querySelector('#editar_fecha_inicio_oferta').value,
        fecha_fin: document.querySelector('#editar_fecha_final_oferta').value
    };

    const respuesta = await fetch(`?controller=api&action=editarOferta`, {
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
        alert("Oferta actualizada");

        fetchOfertas();

        const modalEditarOferta = bootstrap.Modal.getInstance(document.getElementById('modalEditarOferta'));
        modalEditarOferta.hide();
    }

});

document.querySelector('#modalFiltroOfertas').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        filtro: document.querySelector('#filtrar_ofertas').value
    };

    const respuesta = await fetch(`?controller=api&action=obtenerOfertas`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const ofertas = await respuesta.json();

    if(ofertas.error){
        alert(ofertas.error);
    }else{

        fetchOfertasFiltradas(ofertas);

        const modalFiltroOfertas = bootstrap.Modal.getInstance(document.getElementById('modalFiltroOfertas'));
        modalFiltroOfertas.hide();
    }

});