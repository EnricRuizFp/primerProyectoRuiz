<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario en Modal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
        Añadir Productos
    </button>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Seleccionar Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <!-- Select de productos -->
                        <div class="mb-3">
                            <label for="productSelect" class="form-label">Producto</label>
                            <select id="productSelect" class="form-select">
                                <!-- Estos valores se poblarán desde la base de datos -->
                                <option value="1">Producto 1</option>
                                <option value="2">Producto 2</option>
                                <option value="3">Producto 3</option>
                            </select>
                        </div>
                        <!-- Cantidad -->
                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Cantidad</label>
                            <input type="number" id="productQuantity" class="form-control" min="1" placeholder="Cantidad">
                        </div>
                        <!-- Botón para añadir producto -->
                        <div class="mb-3">
                            <button type="button" id="addProductBtn" class="btn btn-success">Añadir Producto</button>
                        </div>
                        <!-- Tabla de productos seleccionados -->
                        <div>
                            <h6>Productos seleccionados:</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="productTableBody">
                                    <!-- Productos añadidos dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="submitForm" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
            // Limpiar la tabla antes de renderizar
            productTableBody.innerHTML = '';

            // Recorrer los productos seleccionados y añadir filas a la tabla
            selectedProducts.forEach((product, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.name}</td>
                    <td>${product.quantity}</td>
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
            const quantity = parseInt(productQuantity.value);

            if (!quantity || quantity <= 0) {
                alert('Por favor, introduce una cantidad válida.');
                return;
            }

            // Comprobar si el producto ya está en la lista
            const existingProduct = selectedProducts.find(p => p.id === productId);
            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                selectedProducts.push({ id: productId, name: productName, quantity });
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

        // Función para manejar el envío del formulario
        submitForm.addEventListener('click', () => {
            console.log('Productos seleccionados:', selectedProducts);
            alert('Productos guardados. Revisa la consola para más detalles.');
        });
    </script>
</body>
</html>
