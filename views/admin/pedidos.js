/* -- FUNCIONES -- */
async function fetchPedidos(){

    const respuesta = await fetch(`?controller=api&action=obtenerAllPedidos`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );

    const datosPeticion = await respuesta.json();

    const contenedorDatosPedidos = document.querySelector('#contenedorDatosPedidos');
    contenedorDatosPedidos.innerHTML = '';

    datosPeticion.forEach(pedido => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${pedido.ID}</b></p>
            </div>
            <div class="col-3">
                <button onclick='verProductosPedido(${pedido.ID})'>Ver los productos</button>
            </div>
            <div class="col-1">
                <p>${pedido.precio_final} €</p>
            </div>
            <div class="col-4">
                <p><b>Fecha:</b> ${pedido.fecha}</p>
                <p><b>Cliente:</b> ${pedido.cliente_id}</p>
                <p><b>Oferta:</b> ${pedido.oferta_id}</p>
                <p><b>Precio sin descuento:</b> ${pedido.precio}</p>
                <p><b>Descuento aplicado:</b> ${pedido.descuento}</p>
            </div>
            <div class="col-1">
                <p>${pedido.estado_pedido}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarPedido(${pedido.ID})'>Editar pedido</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarPedido(${pedido.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosPedidos.appendChild(row);
    });

}

async function fetchPedidosFiltrados(pedidos){

    const contenedorDatosPedidos = document.querySelector('#contenedorDatosPedidos');
    contenedorDatosPedidos.innerHTML = '';

    pedidos.forEach(pedido => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${pedido.ID}</b></p>
            </div>
            <div class="col-3">
                <button onclick='verProductosPedido(${pedido.ID})'>Ver los productos</button>
            </div>
            <div class="col-1">
                <p>${pedido.precio_final} €</p>
            </div>
            <div class="col-4">
                <p><b>Fecha:</b> ${pedido.fecha}</p>
                <p><b>Cliente:</b> ${pedido.cliente_id}</p>
                <p><b>Oferta:</b> ${pedido.oferta_id}</p>
                <p><b>Precio sin descuento:</b> ${pedido.precio}</p>
                <p><b>Descuento aplicado:</b> ${pedido.descuento}</p>
            </div>
            <div class="col-1">
                <p>${pedido.estado_pedido}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarPedido(${pedido.ID})'>Editar pedido</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarPedido(${pedido.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosPedidos.appendChild(row);
    });
}

async function verProductosPedido(id){

    // Llamar a la API para obtener los datos del pedido
    const respuesta = await fetch(`?controller=api&action=obtenerProductosPedido`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const productos = await respuesta.json();

    const contenidoTablaProductos = document.querySelector('#contenidoTablaProductos');
    contenidoTablaProductos.innerHTML = '';

    // Rellenar los campos del modal
    productos.forEach(producto => {

        const row = document.createElement('div');
        row.classList.add('row');

        row.innerHTML += `
            <div class="col-3">
                <p><b>${producto.producto_id}</b></p>
            </div>
            <div class="col-3">
                <p>${producto.cantidad}</p>
            </div>
            <div class="col-3">
                <p>${producto.precio_unidad}</p>
            </div>
            <div class="col-3">
                <p>${producto.precio}</p>
            </div>
        `;

        contenidoTablaProductos.appendChild(row);

    });

    // Mostrar el modal
    const modalVerProductos = new bootstrap.Modal(document.getElementById('modalVerProductos'));
    modalVerProductos.show();
}

async function editarPedido(id) {

    // Llamar a la API para obtener los datos del pedido
    const respuesta = await fetch(`?controller=api&action=obtenerPedido`, 
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    });
    const pedido = await respuesta.json();

    // Llamar a la API para obtener los productos seleccionados del pedido
    const respuesta2 = await fetch(`?controller=api&action=obtenerProductosPedido`, 
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    });
    const productosSeleccionados = await respuesta2.json();

    // Llamar a la API para obtener todos los productos disponibles
    const respuestaProd = await fetch(`?controller=api&action=obtenerAllProductos`, 
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    });
    const productosDisponibles = await respuestaProd.json();

    // Rellenar los campos del modal con los datos del pedido
    document.querySelector('#editar_pedido_id').value = pedido.ID;
    document.querySelector('#editar_cliente_id').value = pedido.cliente_id;
    document.querySelector('#editar_oferta_id').value = pedido.oferta_id;
    document.querySelector('#editar_fecha').value = pedido.fecha;
    document.querySelector('#editar_direccion').value = pedido.direccion;

    // Limpiar y rellenar el select de productos con todos los productos disponibles
    const productSelectEdit = document.getElementById('productSelectEdit');
    productSelectEdit.innerHTML = '';
    productosDisponibles.forEach(producto => {
        const option = document.createElement('option');
        option.value = producto.ID;
        option.textContent = producto.nombre;
        productSelectEdit.appendChild(option);
    });

    // Cargar los productos seleccionados en la tabla
    selectedProductsEdit = productosSeleccionados.map(producto => ({
        id: producto.producto_id,
        name: producto.nombre,
        cantidad: producto.cantidad,
        precio: producto.precio
    }));

    renderTableEdit();

    // Mostrar el modal
    const modalEditarPedido = new bootstrap.Modal(document.getElementById('modalEditarPedido'));
    modalEditarPedido.show();
}


// Referencias al DOM del modal de edición
const productSelectEdit = document.getElementById('productSelectEdit');
const productQuantityEdit = document.getElementById('productQuantityEdit');
const addProductBtnEdit = document.getElementById('addProductBtnEdit');
const productTableBodyEdit = document.getElementById('productTableBodyEdit');

// Array para almacenar los productos seleccionados en el modal de edición
let selectedProductsEdit = [];

// Función para renderizar la tabla de productos en el modal de edición
function renderTableEdit() {

    // Limpiar tabla
    productTableBodyEdit.innerHTML = '';

    selectedProductsEdit.forEach((producto, index) => {

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${producto.id}</td>
            <td>${producto.cantidad}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeProductEdit(${index})">Eliminar</button>
            </td>
        `;
        productTableBodyEdit.appendChild(row);
    });
}

// Función para añadir un producto en el modal de edición
addProductBtnEdit.addEventListener('click', () => {
    const selectedOption = productSelectEdit.options[productSelectEdit.selectedIndex];
    const productName = selectedOption.text;
    const productId = selectedOption.value;
    const cantidad = parseInt(productQuantityEdit.value);

    if (!cantidad || cantidad <= 0) {
        alert('Introduzca una cantidad válida.');
        return;
    }

    // Comprobar si el producto ya está en la lista
    const existingProduct = selectedProductsEdit.find(p => p.id === productId);
    if (existingProduct) {
        existingProduct.cantidad += cantidad;
    } else {
        selectedProductsEdit.push({ id: productId, name: productName, cantidad });
    }

    // Renderizar la tabla
    renderTableEdit();

    // Limpiar los campos del formulario
    productQuantityEdit.value = '';
});

// Función para eliminar un producto en el modal de edición
function removeProductEdit(index) {
    selectedProductsEdit.splice(index, 1);
    renderTableEdit();
}


async function crearPedido(){

    // Llamar a la api para obtener los datos de los productos
    const respuestaProd = await fetch(`?controller=api&action=obtenerAllProductos`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const productos = await respuestaProd.json();

    // Obtener el select del DOM
    const productSelect = document.getElementById('productSelect');

    productSelect.innerHTML = '';

    // Agregar los productos disponibles al select
    productos.forEach(producto => {
        const option = document.createElement('option');
        option.value = producto.ID;
        option.textContent = producto.nombre;
        productSelect.appendChild(option);
    });

    // Mostrar el modal
    const modalCrearPedido = new bootstrap.Modal(document.getElementById('modalCrearPedido'));
    modalCrearPedido.show();

}

// Referencias al DOM
const productSelect = document.getElementById('productSelect');
const productQuantity = document.getElementById('productQuantity');
const addProductBtn = document.getElementById('addProductBtn');
const productTableBody = document.getElementById('productTableBody');
const submitForm = document.getElementById('submitForm');

// Array para almacenar los productos seleccionados
const selectedProducts = [];

// Función para renderizar la tabla de productos
function renderTable() {

    // Limpiar tabla
    productTableBody.innerHTML = '';

    selectedProducts.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.name}</td>
            <td>${product.cantidad}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeProduct(${index})">Eliminar</button>
            </td>
        `;
        productTableBody.appendChild(row);
    });
}

// Función para añadir un producto
addProductBtn.addEventListener('click', () => {
    const selectedOption = productSelect.options[productSelect.selectedIndex];
    const productName = selectedOption.text;
    const productId = selectedOption.value;
    const cantidad = parseInt(productQuantity.value);

    if (!cantidad || cantidad <= 0) {
        alert('Introduzca una cantidad válida.');
        return;
    }

    // Comprobar si el producto ya está en la lista
    const existingProduct = selectedProducts.find(p => p.id === productId);
    if (existingProduct) {
        existingProduct.cantidad += cantidad;
    } else {
        selectedProducts.push({ id: productId, name: productName, cantidad });
    }

    // Renderizar la tabla
    renderTable();

    // Limpiar los campos del formulario
    productQuantity.value = '';
});

// Función para eliminar un producto
function removeProduct(index) {
    selectedProducts.splice(index, 1);
    renderTable();
}

async function eliminarPedido(id){

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "delete", "modificado": Number(id), "table":"pedidos", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    // Llamar a la API para eliminar el pedido
    const respuesta = await fetch(`?controller=api&action=eliminarPedido`, 
        {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
        }
    );
    const resultado = await respuesta.json();

    fetchPedidos();

}

/* -- FILTROS -- */

async function filtrarPorUsuario(){

    // Obtener todos los usuarios de la DB
    const respuesta = await fetch(`?controller=api&action=obtenerAllUsuarios`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
    const usuarios = await respuesta.json();

    // Obtener el select del DOM
    const usuarioSelect = document.getElementById('usuarioSelect');

    usuarioSelect.innerHTML = '';

    // Agregar los productos disponibles al select
    usuarios.forEach(usuario => {
        const option = document.createElement('option');
        option.value = usuario.ID;
        option.textContent = "ID: "+usuario.ID+", Nombre: "+usuario.nombre_completo;
        usuarioSelect.appendChild(option);
    });

    // Mostrar el modal
    const modalFiltroUsuario = new bootstrap.Modal(document.getElementById('modalFiltroUsuario'));
    modalFiltroUsuario.show();

}

async function filtrarPorFecha(){
    const modalFiltroFecha = new bootstrap.Modal(document.getElementById('modalFiltroFecha'));
    modalFiltroFecha.show();
}

async function filtrarPorPrecio(){
    const modalFiltroPrecio = new bootstrap.Modal(document.getElementById('modalFiltroPrecio'));
    modalFiltroPrecio.show();
}

/* -- BOTONES -- */
document.querySelector('#botonObtenerAllPedidos').addEventListener('click', function() {
    fetchPedidos();
});

/* -- FORMULARIOS -- */
document.querySelector('#formularioCrearPedido').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "create", "modificado": null, "table":"pedidos", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const datos = {
        cliente_id: document.querySelector('#añadir_cliente_id').value,
        oferta_id: document.querySelector('#añadir_oferta_id').value,
        fecha: document.querySelector('#añadir_fecha').value,
        direccion: document.querySelector('#añadir_direccion').value,
        productos: selectedProducts
    };

    const respuesta = await fetch(`?controller=api&action=crearPedido`, {
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
        alert("Pedido creado");

        const modalCrearPedido = bootstrap.Modal.getInstance(document.getElementById('modalCrearPedido'));
        modalCrearPedido.hide();
    }

    fetchPedidos();

});

document.querySelector('#formularioEditarPedido').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        pedido_id: document.querySelector('#editar_pedido_id').value,
        cliente_id: document.querySelector('#editar_cliente_id').value,
        oferta_id: document.querySelector('#editar_oferta_id').value,
        fecha: document.querySelector('#editar_fecha').value,
        direccion: document.querySelector('#editar_direccion').value,
        estado: document.querySelector('#selectEstado').value,
        productos: selectedProductsEdit
    };

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "edit", "modificado": Number(datos.pedido_id), "table":"pedidos", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const respuesta = await fetch(`?controller=api&action=editarPedido`, {
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
        alert("Pedido actualizado");

        const modalEditarPedido = bootstrap.Modal.getInstance(document.getElementById('modalEditarPedido'));
        modalEditarPedido.hide();
    }

    fetchPedidos();

});

document.querySelector('#formularioFiltroUsuario').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        cliente_id: document.querySelector('#usuarioSelect').value
    };

    const respuesta = await fetch(`?controller=api&action=obtenerPedidos`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    });
    const resultado = await respuesta.json();

    fetchPedidosFiltrados(resultado);

    const modalFiltroUsuario = bootstrap.Modal.getInstance(document.getElementById('modalFiltroUsuario'));
    modalFiltroUsuario.hide();

});

document.querySelector('#formularioFiltroFecha').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        fecha_inicio: document.querySelector('#filtrar_fecha_inicio').value,
        fecha_fin: document.querySelector('#filtrar_fecha_fin').value,
        orden: document.querySelector('#orden_filtro_fecha').value
    };

    const respuesta = await fetch(`?controller=api&action=obtenerPedidos`, {
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
        fetchPedidosFiltrados(resultado);

        const modalFiltroFecha = bootstrap.Modal.getInstance(document.getElementById('modalFiltroFecha'));
        modalFiltroFecha.hide();
    }

});

document.querySelector('#formularioFiltroPrecio').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        precio_ini: document.querySelector('#filtrar_precio_inicio').value,
        precio_fin: document.querySelector('#filtrar_precio_fin').value,
        orden: document.querySelector('#orden_filtro_precio').value
    };

    const respuesta = await fetch(`?controller=api&action=obtenerPedidos`, {
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
        fetchPedidosFiltrados(resultado);

        const modalFiltroPrecio = bootstrap.Modal.getInstance(document.getElementById('modalFiltroPrecio'));
        modalFiltroPrecio.hide();
    }

});