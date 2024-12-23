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

    console.log(datosPeticion);

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
                <p><b>Descuento aplicado:</b> ${pedido.descuento}</p>
                <p><b>Precio sin descuento:</b> ${pedido.precio}</p>
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
    })

}

async function verProductosPedido(id){

    console.log("A");

    // Llamar a la API para obtener los productos del pedido
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

    // Llamar a la api para obtener los datos del usuario
    const respuesta = await fetch(`?controller=api&action=obtenerUsuario`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        }
    );
    const usuario = await respuesta.json();

    // Rellenar los campos del modal
    document.querySelector('#editar_id').value = usuario.ID;
    document.querySelector('#editar_usuario').value = usuario.usuario;
    document.querySelector('#editar_nombre_completo').value = usuario.nombre_completo;
    document.querySelector('#editar_email').value = usuario.email;
    document.querySelector('#editar_telefono').value = usuario.telefono;
    document.querySelector('#editar_tarjeta_bancaria').value = usuario.tarjeta_bancaria;
    document.querySelector('#editar_fecha_vencimiento').value = usuario.fecha_vencimiento;
    document.querySelector('#editar_cvv').value = usuario.cvv;

    // Mostrar el modal
    const modalEditarUsuario = new bootstrap.Modal(document.getElementById('modalEditarUsuario'));
    modalEditarUsuario.show();
}


/* -- BOTONES -- */
document.querySelector('#botonObtenerAllPedidos').addEventListener('click', function() {
    fetchPedidos();
});