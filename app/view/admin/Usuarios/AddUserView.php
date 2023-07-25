<style>
  input:valid {
    border: 2px solid green;
  }

  input:invalid {
    border: 2px solid red;
  }
</style>
<div class="flex flex-col lg:flex-row h-screen">
  <div class="hidden lg:block w-1/2 bg-gray-100">
    <!-- Aquí puedes colocar la imagen -->
    <div class="w-full h-full">
      <img src="app/view/resources/pastiseta-image.jpg" alt="Imagen de fondo" class="object-cover w-full h-full">
    </div>
  </div>
  <div class="w-full lg:w-1/2 bg-brown-cream-v2 flex flex-col justify-center items-center overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4 text-white-cream">¡Regístrate un Nuevo PastiUsuario!</h1>
    <div id="formContainer">
      <form id="registroUsuario" action="?C=UserController&M=__add" method="post"
        class="w-full sm:max-w-md registro-form active" autocomplete="off" enctype="multipart/form-data">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
          <!-- Campo de Nombre de Usuario -->
          <div>
            <label for="username" class="block mb-2 text-sm font-bold text-white-cream">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" class="w-full px-4 py-2 rounded border-gray-300" required
              minlength="5" pattern="[A-Za-z ]*">
          </div>
          <!-- Campo de Contraseña -->
          <div>
            <label for="password" class="block mb-2 text-sm font-bold text-white-cream">Contraseña:</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded border-gray-300"
              required minlength="4" maxlength="60">
          </div>
          <!-- Campo de Confirmar Contraseña -->
          <div>
            <label for="cpassword" class="block mb-2 text-sm font-bold text-white-cream">Confirmar Contraseña:</label>
            <input type="password" id="cpassword" name="cpassword" class="w-full px-4 py-2 rounded border-gray-300">
            <div id="validate"></div>
          </div>
          <!-- Campo de Nombre -->
          <div>
            <label for="name" class="block mb-2 text-sm font-bold text-white-cream">Nombre:</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded border-gray-300" minlength="4"
              pattern="[A-Z-a-z]* " required>
          </div>
          <!-- Campo de Apellido Paterno -->
          <div>
            <label for="apaterno" class="block mb-2 text-sm font-bold text-white-cream">Apellido Paterno:</label>
            <input type="text" id="apaterno" name="apaterno" class="w-full px-4 py-2 rounded border-gray-300"
              minlength="4" required pattern="[A-Z-a-z]* ">
          </div>
          <!-- Campo de Apellido Materno -->
          <div>
            <label for="amaterno" class="block mb-2 text-sm font-bold text-white-cream">Apellido Materno:</label>
            <input type="text" id="amaterno" name="amaterno" class="w-full px-4 py-2 rounded border-gray-300"
              minlength="4" required pattern="[A-Z-a-z]* ">
          </div>
          <!-- Campo de Email -->
          <div>
            <label for="email" class="block mb-2 text-sm font-bold text-white-cream">Email:</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded border-gray-300" required>
          </div>
          <!-- Campo de Teléfono -->
          <div>
            <label for="telefono" class="block mb-2 text-sm font-bold text-white-cream">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="w-full px-4 py-2 rounded border-gray-300" required
              minlength="10" maxlength="10" pattern="[0-9]*">
          </div>
          <!-- Campo de Colonia -->
          <div>
            <label for="colonia" class="block mb-2 text-sm font-bold text-white-cream">Colonia:</label>
            <input type="text" id="colonia" name="colonia" class="w-full px-4 py-2 rounded border-gray-300"
              minlength="5" required pattern="[A-Z-a-z]* ">
          </div>
          <!-- Campo de Municipio -->
          <div>
            <label for="municipio" class="block mb-2 text-sm font-bold text-white-cream">Municipio:</label>
            <input type="text" id="municipio" name="municipio" class="w-full px-4 py-2 rounded border-gray-300"
              minlength="5" required pattern="[A-Z-a-z]* ">
          </div>
          <!-- Campo de Localidad -->
          <div>
            <label for="localidad" class="block mb-2 text-sm font-bold text-white-cream">Localidad:</label>
            <input type="text" id="localidad" name="localidad" class="w-full px-4 py-2 rounded border-gray-300"
              minlength="5" required pattern="[A-Z-a-z]* ">
          </div>
          <!-- Campo de Calle -->
          <div>
            <label for="calle" class="block mb-2 text-sm font-bold text-white-cream">Calle:</label>
            <input type="text" id="calle" name="calle" class="w-full px-4 py-2 rounded border-gray-300" minlength="5"
              required pattern="[A-Z-a-z]*">
          </div>
          <!-- Campo de Número de Casa -->
          <div>
            <label for="ncasa" class="block mb-2 text-sm font-bold text-white-cream">Número Casa:</label>
            <input type="text" id="ncasa" name="ncasa" class="w-full px-4 py-2 rounded border-gray-300" minlength="1"
              maxlength="4" pattern="[0-9]*">
          </div>
          <!-- Campo de Código Postal -->
          <div>
            <label for="codigopostal" class="block mb-2 text-sm font-bold text-white-cream">Código Postal:</label>
            <input type="text" id="codigopostal" name="codigopostal" class="w-full px-4 py-2 rounded border-gray-300"
              maxlength="5" minlength="5" required pattern="[0-9]{5}">
          </div>
        </div>
        <!-- Campo del avatar -->
        <div class="relative">
          <label for="avatar" class="block mb-2 text-sm font-bold text-white-cream">Imagen de Perfil:</label>
          <input type="file" id="avatar" name="avatar" accept="image/*"
            class="w-full py-2 appearance-none bg-transparent border-gray-300 border rounded-lg px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            required>
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <svg class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </div>
        </div>
        <div>
          <p class="font-extrabold underline">
            <?php
            if (isset($_SESSION['error'])) {
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            }
            ?>
          </p>
        </div>
        <div class="flex justify-center">
          <button type="submit"
            class="w-full lg:w-auto py-2 px-4 bg-brown-cream text-white rounded hover:bg-brown-cream-opacitiy transition duration-200">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="app/view/public/js/registro.js"></script>