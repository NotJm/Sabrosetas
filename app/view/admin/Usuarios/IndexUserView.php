<div class="container mx-auto p-4">
  <h2 class="text-2xl font-bold mb-6 text-white-cream">Administración de usuarios</h2>
  <p class="mb-4">
    Todos los datos que los usuarios nos proporcionan son confidenciales y se encuentran resguardados por la empresa
    Sabrosetas. Es importante que los usuarios tengan seguridad en los datos que proporcionan al darse de alta, y
    solo
    el personal autorizado tiene acceso a esos datos. Además, las contraseñas se encuentran encriptadas para
    garantizar
    la confidencialidad que la empresa maneja.
  </p>
  <a href="?C=UserController&M=__callFormAdd"
    class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
    Agregar nuevo usuario
  </a>
  <a href="?C=DireccionController&M=__index"
    class="inline-block bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mb-6">
    Mostrar Direcciones de los Usuarios
  </a>
  <!-- Aquí va la tabla con los usuarios -->
  <div class="overflow-x-auto">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="border-b border-gray-300 py-2 px-4">Permisos</th>
          <th class="border-b border-gray-300 py-2 px-4">Usuario</th>
          <th class="border-b border-gray-300 py-2 px-4">Direccion</th>
          <th class="border-b border-gray-300 py-2 px-4">Nombre Completo</th>
          <th class="border-b border-gray-300 py-2 px-4">Email</th>
          <th class="border-b border-gray-300 py-2 px-4">Teléfono</th>
          <th class="border-b border-gray-300 py-2 px-4">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $dato): ?>
          <tr>
            <td class="border-b border-gray-300 py-2 px-4">
              <?php

              if ($dato["Permisos"] == 0)
                echo "Usuario Admin";
              else
                echo "Usuario Publico";
              ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['NombreUsuario'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <button onclick="editarDireccion('<?= $dato['NombreUsuario'] ?>')"
                class="bg-brown-cream hover:bg-brown-cream-opacity text-white font-bold py-2 px-4 rounded mx-2 mt-2">
                Editar Direccion
              </button>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?php echo "" . $dato['Nombre'] . " " . $dato['Apaterno'] . " " . $dato['Amaterno'] . ""; ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['Email'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <?= $dato['Telefono'] ?>
            </td>
            <td class="border-b border-gray-300 py-2 px-4">
              <div class="flex flex-wrap justify-center">
                <button onclick="editar('<?= $dato['NombreUsuario'] ?>')" id="sendData"
                  class="bg-brown-cream hover:bg-brown-cream-opacitiy text-white font-bold py-2 px-4 rounded mx-2 mt-2">
                  Editar
                </button>
                <button onclick="eliminar('<?= $dato['NombreUsuario'] ?>')"
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
<script src="app/view/admin/js/users.main.js"></script>