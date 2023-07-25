<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de Productos</h2>
    <p class="mb-4">
        En nuestra plataforma de ventas, en Sabrosetas, queremos asegurarte que todos los datos que nos proporcionas
        para la compra de productos son tratados con absoluta confidencialidad y resguardados con la máxima seguridad.
        Nuestra prioridad es garantizar que nuestros clientes tengan la tranquilidad de que sus datos personales se
        encuentran protegidos al darse de alta en nuestro sitio.

        Para proteger la privacidad de tus datos, solo el personal autorizado, que está sujeto a estrictas políticas de
        confidencialidad, tiene acceso a la información que proporcionas durante el proceso de compra. Además, todas las
        contraseñas relacionadas con tu cuenta se encuentran encriptadas para garantizar que tus datos personales y
        financieros permanezcan seguros y protegidos en todo momento.
    </p>
    <a href="?C=ProductsController&M=__callFormAdd"
        class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
        Agregar nuevo producto
    </a>
    <a href="?C=PresentacionController&M=__index"
        class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
        Editar Presentaciones de Productos
    </a>
    <!-- Aquí va la tabla con los usuarios -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 py-2 px-4">Codigo Barras</th>
                    <th class="border-b border-gray-300 py-2 px-4">Nombre del Producto</th>
                    <th class="border-b border-gray-300 py-2 px-4">Descripcion</th>
                    <th class="border-b border-gray-300 py-2 px-4">Precio</th>
                    <th class="border-b border-gray-300 py-2 px-4">Estado</th>
                    <th class="border-b border-gray-300 py-2 px-4">Caducidad</th>
                    <th class="border-b border-gray-300 py-2 px-4">Presentacion</th>
                    <th class="border-b border-gray-300 py-2 px-4">Cantidad Piezad</th>
                    <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato): ?>
                    <tr>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['codigoBarras'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['nombreProducto'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['descripcion'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['precio'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?php
                            if ($dato['estado'] == 1)
                                echo "Disponible";
                            else
                                echo "No disponible";
                            ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?php echo "" . $dato['fecha_caducidad'] . " " . $dato['hora_caducidad'] . ""; ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['presentacion'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['cantidadPiezas'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <div class="flex flex-wrap justify-center">
                                <button onclick="editar('<?= $dato['codigoBarras'] ?>','<?= $dato['nombreProducto'] ?>')"
                                    class="bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mx-2 mt-2">
                                    Editar
                                </button>
                                <button onclick="eliminar('<?= $dato['codigoBarras'] ?>','<?= $dato['nombreProducto'] ?>')"
                                    class="bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mx-2 mt-2">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="app/view/admin/js/products.main.js"></script>