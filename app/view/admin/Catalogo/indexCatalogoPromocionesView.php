<div class="container mx-auto p-4">
  <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de Catalogo de Promociones</h2>
  <p class="mb-4">
  </p>
  <a href="?C=PromocionController&M=__callFormAdd"
    class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
    Agregar nuevo Promocion
  </a>
  <a href="?C=PromocionController&M=assingProducto"
  class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
    Asignar Promocion a Producto
  </a>
  <!-- Aquí va la tabla con los usuarios -->
  <div class="overflow-x-auto">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="border-b border-gray-300 py-2 px-4">Codigo Promocion</th>
          <th class="border-b border-gray-300 py-2 px-4">Nombre Producto</th>
          <th class="border-b border-gray-300 py-2 px-4">Descuento</th>
          <th class="border-b border-gray-300 py-2 px-4">Estado</th>
          <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $dato): ?>
          <tr>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['idPromociones'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['NombreProducto'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['descuento'] ?>%
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?php
                if($dato['Estado'] != 1)
                  echo "Finalizado";
                else
                  echo "Activo";
              ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <div class="flex flex-wrap justify-center">
                <button onclick="eliminar('<?= $dato['idPromociones'] ?>','<?= $dato['codigoBarras'] ?>')"
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
<script src="app/view/admin/js/catalogo.main.js"></script>