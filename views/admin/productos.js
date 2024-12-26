/* -- FUNCIONES -- */
async function fetchProductos() {
    const respuesta = await fetch(`?controller=api&action=obtenerAllProductos`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    });
    const datosPeticion = await respuesta.json();

    const contenedorDatosProductos = document.querySelector('#contenedorDatosProductos');
    contenedorDatosProductos.innerHTML = '';

    for (const producto of datosPeticion) {

        // Obtener los ingredientes del producto
        const respuestaIngredientes = await fetch(`?controller=api&action=obtenerIngredientesProducto`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: producto.ID })
        });
        const datosIngredientes = await respuestaIngredientes.json();

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${producto.ID}</b></p>
            </div>
            <div class="col-6">
                <p><b>Nombre:</b> ${producto.nombre}</p>
                <p><b>Descripción:</b> ${producto.descripcion}</p>
                <p><b>Ingredientes:</b> ${datosIngredientes}</p>
                <p><b>Sección:</b> ${producto.seccion}</p>
                <p><b>Categoría:</b> ${producto.categoria}</p>
            </div>
            <div class="col-1">
                <p>${producto.precio}</p>
            </div>
            <div class="col-2">
                <img src="${producto.imagen}" alt="imagen del producto" width="100%">
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarProducto(${producto.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarProducto(${producto.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosProductos.appendChild(row);

    }
}

async function fetchProductosFiltrados(productos){

    console.log("A");

    const contenedorDatosProductos = document.querySelector('#contenedorDatosProductos');
    contenedorDatosProductos.innerHTML = '';

    for (const producto of productos) {

        // Obtener los ingredientes del producto
        const respuestaIngredientes = await fetch(`?controller=api&action=obtenerIngredientesProducto`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: producto.ID })
        });
        const datosIngredientes = await respuestaIngredientes.json();

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${producto.ID}</b></p>
            </div>
            <div class="col-6">
                <p><b>Nombre:</b> ${producto.nombre}</p>
                <p><b>Descripción:</b> ${producto.descripcion}</p>
                <p><b>Ingredientes:</b> ${datosIngredientes}</p>
                <p><b>Sección:</b> ${producto.seccion}</p>
                <p><b>Categoría:</b> ${producto.categoria}</p>
            </div>
            <div class="col-1">
                <p>${producto.precio}</p>
            </div>
            <div class="col-2">
                <img src="${producto.imagen}" alt="imagen del producto" width="100%">
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarProducto(${producto.ID})'>Editar datos</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarProducto(${producto.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosProductos.appendChild(row);

    }

}

async function crearProducto(){

    // Llamar a la api para obtener los datos de los ingredientes
    const respuestaProd = await fetch(`?controller=api&action=obtenerAllIngredientes`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const ingredientes = await respuestaProd.json();

    // Obtener el select del DOM
    const ingredientSelect = document.getElementById('añadir_ingredientes');

    ingredientSelect.innerHTML = '';

    // Agregar los productos disponibles al select
    ingredientes.forEach(ingrediente => {
        const option = document.createElement('option');
        option.value = ingrediente.ID;
        option.textContent = ingrediente.nombre;
        ingredientSelect.appendChild(option);
    });

    // Mostrar el modal
    const modalCrearProducto = new bootstrap.Modal(document.getElementById('modalCrearProducto'));
    modalCrearProducto.show();
}

async function editarProducto(id){

    // Llamar a la api para obtener los datos del producto
    const respuestaProducto = await fetch(`?controller=api&action=obtenerProducto`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const producto = await respuestaProducto.json();

    console.log(producto);

    // Llamar a la api para obtener los datos de los ingredientes
    const respuestaIngredientes = await fetch(`?controller=api&action=obtenerAllIngredientes`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const ingredientes = await respuestaIngredientes.json();

    console.log(ingredientes);

    // Llamar a la api para obtener los ingredientes seleccionados
    const respuestaIngredientesSeleccionados = await fetch(`?controller=api&action=obtenerSelectedIngredientes`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const ingredientesSeleccionados = await respuestaIngredientesSeleccionados.json();

    console.log(ingredientesSeleccionados);

    // Obtener el select del DOM
    const ingredientSelect = document.getElementById('editar_ingredientes');

    ingredientSelect.innerHTML = '';

    // Agregar los productos disponibles al select
    ingredientes.forEach(ingrediente => {
        const option = document.createElement('option');
        option.value = ingrediente.ID;
        option.textContent = ingrediente.nombre;

        // Si el ingrediente está en los ingredientes seleccionados, se preselecciona
        if (ingredientesSeleccionados.some(selected => selected.ingrediente_id == ingrediente.ID)) {
            option.selected = true;
        }

        ingredientSelect.appendChild(option);
    });

    // Meter los datos del producto en el modal
    document.querySelector('#editar_producto_id').value = producto.ID;
    document.querySelector('#editar_nombre').value = producto.nombre;
    document.querySelector('#editar_descripcion').value = producto.descripcion;
    document.querySelector('#editar_seccion').value = producto.seccion;
    document.querySelector('#editar_categoria').value = producto.categoria;
    document.querySelector('#editar_precio').value = producto.precio;
    document.querySelector('#editar_imagen').value = producto.imagen;

    // Mostrar el modal
    const modalEditarProducto = new bootstrap.Modal(document.getElementById('modalEditarProducto'));
    modalEditarProducto.show();
}

async function eliminarProducto(id){

    // Llamar a la API para eliminar el pedido
    const respuesta = await fetch(`?controller=api&action=eliminarProducto`, 
        {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
        }
    );
    const resultado = await respuesta.json();

    console.log(resultado);

    fetchProductos();

}


/* -- BOTONES -- */
document.querySelector('#botonObtenerAllProductos').addEventListener('click', function() {
    fetchProductos();
});

/* -- FORMULARIOS -- */
document.querySelector('#formularioCrearProducto').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Obtener los datos del select múltiple de ingrefientes
    const ingredientesSeleccionados = Array.from(document.querySelector('#añadir_ingredientes').selectedOptions)
        .map(option => option.value);

    const datos = {
        nombre: document.querySelector('#añadir_nombre').value,
        descripcion: document.querySelector('#añadir_descripcion').value,
        seccion: document.querySelector('#añadir_seccion').value,
        ingredientes: ingredientesSeleccionados,
        categoria: document.querySelector('#añadir_categoria').value,
        precio: document.querySelector('#añadir_precio').value,
        imagen: document.querySelector('#añadir_imagen').value,
    };

    console.log("Datos del formulario:");
    console.log(datos);

    const respuesta = await fetch(`?controller=api&action=crearProducto`, {
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
        alert("Producto creado");

        fetchProductos();

        const modalCrearProducto = bootstrap.Modal.getInstance(document.getElementById('modalCrearProducto'));
        modalCrearProducto.hide();
    }

});

document.querySelector('#formularioFiltroProductos').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        filtro: document.querySelector('#filtrar_seccion').value
    };

    console.log(datos);

    const respuesta = await fetch(`?controller=api&action=obtenerProductos`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const productos = await respuesta.json();

    if(productos.error){
        alert(productos.error);
    }else{

        fetchProductosFiltrados(productos);

        const modalFiltroSeccion = bootstrap.Modal.getInstance(document.getElementById('modalFiltroSeccion'));
        modalFiltroSeccion.hide();
    }

});

document.querySelector('#formularioEditarProducto').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Obtener los datos del select múltiple de ingrefientes
    const ingredientesSeleccionados = Array.from(document.querySelector('#editar_ingredientes').selectedOptions)
        .map(option => option.value);

    const datos = {
        id: document.querySelector('#editar_producto_id').value,
        nombre: document.querySelector('#editar_nombre').value,
        descripcion: document.querySelector('#editar_descripcion').value,
        seccion: document.querySelector('#editar_seccion').value,
        ingredientes: ingredientesSeleccionados,
        categoria: document.querySelector('#editar_categoria').value,
        precio: document.querySelector('#editar_precio').value,
        imagen: document.querySelector('#editar_imagen').value
    };

    console.log("Datos del formulario:");
    console.log(datos);

    const respuesta = await fetch(`?controller=api&action=editarProducto`, {
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
        alert("Producto actualizado");

        fetchProductos();

        const modalEditarProducto = bootstrap.Modal.getInstance(document.getElementById('modalEditarProducto'));
        modalEditarProducto.hide();
    }

});