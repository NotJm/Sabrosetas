<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de Direcciones por Usuario</h2>
    <p class="mb-4">
        La ubicación del usuario y los datos relacionados son considerados confidenciales. Esto significa que se trata
        de información personal y privada que no debe ser compartida o revelada sin el consentimiento del usuario.
    </p>
    <a href="?C=UserController&M=__callFormAdd"
        class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
        Agregar nuevo usuario
    </a>
    <!-- Aquí va la tabla con los usuarios -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 py-2 px-4">Usuario</th>
                    <th class="border-b border-gray-300 py-2 px-4">Colonia</th>
                    <th class="border-b border-gray-300 py-2 px-4">Calle</th>
                    <th class="border-b border-gray-300 py-2 px-4">Municipio</th>
                    <th class="border-b border-gray-300 py-2 px-4">Localidad</th>
                    <th class="border-b border-gray-300 py-2 px-4">Numero Casa</th>
                    <th class="border-b border-gray-300 py-2 px-4">Codigo Postal</th>
                    <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato): ?>
                    <tr>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato["NombreUsuario"] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['Colonia'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['Calle'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['Municipio'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['Localidad'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['NumeroCasa'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <?= $dato['CodigoPostal'] ?>
                        </td>
                        <td class="border-b border-gray-300 py-2 px-4">
                            <div class="flex flex-wrap justify-center">
                                <button onclick="editar('<?= $dato['NombreUsuario'] ?>')"
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
<script src="app/view/admin/js/direccion.main.js"></script>