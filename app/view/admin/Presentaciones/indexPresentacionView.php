<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de Productos</h2>
    <p class="mb-4">
        Todos los datos que los usuarios nos proporcionan son confidenciales y se encuentran resguardados por la empresa
        Sabrosetas. Es importante que los usuarios tengan seguridad en los datos que proporcionan al darse de alta, y
        solo
        el personal autorizado tiene acceso a esos datos. Además, las contraseñas se encuentran encriptadas para
        garantizar
        la confidencialidad que la empresa maneja.
    </p>
    <a href="?C=ProductsController&M=__callFormAdd"
        class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
        Agregar Nuevo Producto
    </a>
    <a href="?C=PresentacionController&M=__callFormAdd"
        class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
        Agregar Nueva Presentacion
    </a>
    <!-- Aquí va la tabla con los usuarios -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 py-2 px-4">ID Presentacion</th>
                    <th class="border-b border-gray-300 py-2 px-4">Descripcion</th>
                    <th class="border-b border-gray-300 py-2 px-4">Cantidad Piezas</th>
                    <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato): ?>
                    <tr>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['idPresentacion'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['descripcion'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['cantidadPiezas'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <div class="flex flex-wrap justify-center">
                                <button onclick="editar('<?= $dato['idPresentacion'] ?>')"
                                    class="bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mx-2 mt-2">
                                    Editar
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="app/view/admin/js/presentacion.main.js"></script>