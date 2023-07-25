<style>
  input:valid {
    border: 2px solid green;
  }

  input:invalid {
    border: 2px solid red;
  }
</style>
<div class="flex flex-col justify-center items-center h-screen bg-brown-cream-v2 mt-8">
  <div class="w-full max-w-md p-6 rounded shadow-md">
    <h2 class="text-2xl text-brown-cream-v3 font-bold text-center mb-6">Actualización de datos de usuario</h2>
    <form action="?C=UserController&M=__edit" method="post"
      autocomplete="off" enctype="multipart/form-data" id="formSendData">
      <!-- Permisos -->
      <div class="mb-4">
        <!-- Permisos de Usuario -->
        <label for="permisos" class="block text-white-cream text-sm font-bold mb-2">Permiso de Usuario:</label>
        <select
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required name="permisos" id="permiso">
          <?php
            if($datos['Permisos'] != 0)
            {
              echo "<option value='0'>Admin</option>";
              echo "<option value='1' selected>Normal</option>";
            } else {
              echo "<option value='0' selected>Admin</option>";
              echo "<option value='1'>Normal</option>";
            }
          ?>
        </select>
        
      </div>
      <!-- Contenedor de Nombre Usuario -->
      <div class="mb-4">
        <!-- Nombre Usuario -->
        <label for="username" class="block text-white-cream text-sm font-bold mb-2">Nombre de usuario:</label>
        <input type="text" name="username" id="username" readonly placeholder="Nombre de usuario"
          value="<?= $datos['NombreUsuario'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-white-cream text-sm font-bold mb-2">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Contraseña"
          value="<?= $datos['Contrasenia'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          required minlength="4" maxlength="60">
      </div>
      <div class="mb-4">
        <label for="name" class="block text-white-cream text-sm font-bold mb-2">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="<?= $datos['Nombre'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          minlength="4" required pattern="[A-Z-a-z]* ">
      </div>
      <div class="mb-4">
        <label for="apaterno" class="block text-white-cream text-sm font-bold mb-2">Apellido Paterno:</label>
        <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno"
          value="<?= $datos['Apaterno'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          required minlength="4" pattern="[A-Z-a-z]* ">
      </div>
      <div class="mb-4">
        <label for="amaterno" class="block text-white-cream text-sm font-bold mb-2">Apellido Materno:</label>
        <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno"
          value="<?= $datos['Amaterno'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          required minlength="4" pattern="[A-Z-a-z]* ">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-white-cream text-sm font-bold mb-2">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" value="<?= $datos['Email'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          required>
      </div>
      <div class="mb-6">
        <label for="telefono" class="block text-white-cream text-sm font-bold mb-2">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono" value="<?= $datos['Telefono'] ?>"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          required minlength="10" maxlength="10" pattern="[0-9]*">
      </div>
      <div class="mb-6">
        <label for="avatar" class="block text-white-cream text-sm font-bold mb-2">Imagen de perfil:</label>
        <input type="file" name="avatar" id="avatar"
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="flex justify-center">
        <button type="submit"
          class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
          Editar
        </button>
      </div>
    </form>
  </div>
</div>