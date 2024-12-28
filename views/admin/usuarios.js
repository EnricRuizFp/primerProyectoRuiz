/* -- FUNCIONES -- */
async function fetchUsuarios(){

    const respuesta = await fetch(`?controller=api&action=obtenerAllUsuarios`, 
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );

    const datosPeticion = await respuesta.json();

    const contenedorDatosUsuarios = document.querySelector('#contenedorDatosUsuarios');
    contenedorDatosUsuarios.innerHTML = '';

    datosPeticion.forEach(usuario => {

        const row = document.createElement('div');
        row.classList.add('datosTable', 'row');

        row.innerHTML += `
            <div class="col-1">
                <p><b>${usuario.ID}</b></p>
            </div>
            <div class="col-5">
                <p><b>Usuario:</b> ${usuario.usuario}</p>
                <p><b>Nombre completo:</b> ${usuario.nombre_completo}</p>
                <p><b>Email:</b> ${usuario.email}</p>
                <p><b>Teléfono:</b> ${usuario.telefono}</p>
                <p><b>Fecha registro:</b> ${usuario.fecha_registro}</p>
                <p><b>Contraseña:</b> ${usuario.contraseña}</p>
            </div>
            <div class="col-4">
                <p><b>Tarjeta bancaria:</b> ${usuario.tarjeta_bancaria}</p>
                <p><b>Fecha vencimiento:</b> ${usuario.fecha_vencimiento}</p>
                <p><b>CVV:</b> ${usuario.cvv}</p>
            </div>
            <div class="col-2">
                <button class='botonesTabla botonEditar' onclick='editarUsuario(${usuario.ID})'>Editar datos</button>
                <button class='botonesTabla botonEditar' onclick='cambiarContraseña(${usuario.ID})'>Cambiar contraseña</button>
                <button class='botonesTabla botonEliminar' onclick='eliminarUsuario(${usuario.ID})'>Eliminar</button>
            </div>
        `;

        contenedorDatosUsuarios.appendChild(row);

    });

}

async function editarUsuario(id) {

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

async function cambiarContraseña(id){

    document.querySelector('#cambiar_contraseña_id').value = id;

    // Mostrar el modal
    const modalCambiarContraseña = new bootstrap.Modal(document.getElementById('modalCambiarContraseña'));
    modalCambiarContraseña.show();

}


async function eliminarUsuario(id){

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "delete", "modificado": Number(id), "table":"usuarios", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const datos = {
        id: id
    };

    const respuesta = await fetch(`?controller=api&action=eliminarUsuario`, {
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
        alert("Usuario eliminado");
    }

    fetchUsuarios();

}


/* -- BOTONES -- */
document.querySelector('#botonObtenerAllUsuarios').addEventListener('click', function() {
    fetchUsuarios();
});

/* -- FORMULARIOS -- */
// Editar
document.querySelector('#formularioEditarUsuario').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        id: document.querySelector('#editar_id').value,
        usuario: document.querySelector('#editar_usuario').value,
        nombre_completo: document.querySelector('#editar_nombre_completo').value,
        email: document.querySelector('#editar_email').value,
        telefono: document.querySelector('#editar_telefono').value,
        tarjeta_bancaria: document.querySelector('#editar_tarjeta_bancaria').value,
        fecha_vencimiento: document.querySelector('#editar_fecha_vencimiento').value,
        cvv: document.querySelector('#editar_cvv').value
    };

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "edit", "modificado": Number(datos.id), "table":"usuarios", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const respuesta = await fetch(`?controller=api&action=editarUsuario`, {
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
        alert("Datos actualizados");

        const modalEditarUsuario = bootstrap.Modal.getInstance(document.getElementById('modalEditarUsuario'));
        modalEditarUsuario.hide();
    }

    fetchUsuarios()

});

// Crear
document.querySelector('#formularioCrearUsuario').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Actualizar los logs
    let logs = JSON.parse(sessionStorage.getItem('logs')) || [];
    let log = {"accion": "create", "modificado": null, "table":"usuarios", "fecha": new Date()};
    log.fecha = log.fecha.toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha correcto
    logs.push(log);
    sessionStorage.setItem('logs', JSON.stringify(logs));

    const datos = {
        usuario: document.querySelector('#añadir_usuario').value,
        nombre_completo: document.querySelector('#añadir_nombre_completo').value,
        email: document.querySelector('#añadir_email').value,
        telefono: document.querySelector('#añadir_telefono').value,
        contraseña: document.querySelector('#añadir_contraseña').value,
        tarjeta_bancaria: document.querySelector('#añadir_tarjeta_bancaria').value,
        fecha_vencimiento: document.querySelector('#añadir_fecha_vencimiento').value,
        cvv: document.querySelector('#añadir_cvv').value
    };

    const respuesta = await fetch(`?controller=api&action=crearUsuario`, {
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
        alert("Usuario añadido");

        const modalEditarUsuario = bootstrap.Modal.getInstance(document.getElementById('modalEditarUsuario'));
        modalEditarUsuario.hide();
    }

    fetchUsuarios()

});

// Cambiar contraseña
document.querySelector('#formularioCambiarContraseña').addEventListener('submit', async function(e) {
    e.preventDefault();

    const datos = {
        id: document.querySelector('#cambiar_contraseña_id').value,
        contraseña: document.querySelector('#cambiar_contraseña').value
    };

    const respuesta = await fetch(`?controller=api&action=cambiarContraseña`, {
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
        alert("Contraseña actualizada");

        const modalCambiarContraseña = bootstrap.Modal.getInstance(document.getElementById('modalCambiarContraseña'));
        modalCambiarContraseña.hide();
    }

    fetchUsuarios()

});