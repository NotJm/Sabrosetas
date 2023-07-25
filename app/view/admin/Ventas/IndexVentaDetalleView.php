<div class="container mx-auto p-4">
  <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de Ventas</h2>
  <p class="mb-4">
    En nuestra plataforma de ventas, en Sabrosetas, queremos asegurarte que todos los datos que nos proporcionas son
    tratados con absoluta confidencialidad y resguardados con la máxima seguridad. Nuestra prioridad es garantizar que
    nuestros usuarios se sientan protegidos al darse de alta en nuestro sitio.
    Para proteger la privacidad de tus datos, solo el personal autorizado, que está sujeto a estrictas políticas de
    confidencialidad, tiene acceso a la información que proporcionas. Además, todas las contraseñas se encuentran
    encriptadas para garantizar que tus datos personales y financieros permanezcan seguros y protegidos en todo momento.
  </p>
  <!-- Aquí va la tabla con los usuarios -->
  <div class="overflow-x-auto">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="border-b border-gray-300 py-2 px-4">Folio</th>
          <th class="border-b border-gray-300 py-2 px-4">Usuario</th>
          <th class="border-b border-gray-300 py-2 px-4">Fecha de Venta</th>
          <th class="border-b border-gray-300 py-2 px-4">Hora de Venta</th>
          <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $dato): ?>
          <tr>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['folio'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['NombreUsuario'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['fecha_venta'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['hora_venta'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <div class="flex flex-wrap justify-center">
                <button onclick="eliminar('<?= $dato['folio'] ?>')"
                  class="bg-brown-cream hover:bg-brown-cream-opacity text-white font-bold py-2 px-4 rounded mx-2 mt-2">
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
<script src="app/view/admin/js/venta.main.js"></script>