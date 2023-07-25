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
        <h2 class="text-2xl text-brown-cream-v3 font-bold text-center mb-6">Actualización de datos de direccion del
            usuario</h2>
        <form action="?C=DireccionController&M=__edit" method="post"
            autocomplete="off" enctype="multipart/form-data" id="formSendData">
            <!-- Permisos -->
            <div class="mb-4">
                <!-- Permisos de Usuario -->
                <label for="username" class="block text-white-cream text-sm font-bold mb-2">Usuario:</label>
                <input type="text" name="username" id="username" placeholder="Nombre de Usuario"
                    value="<?= $datos['NombreUsuario'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required readonly>
            </div>
            <!-- Contenedor de Nombre Usuario -->
            <div class="mb-4">
                <!-- Nombre Usuario -->
                <label for="colonia" class="block text-white-cream text-sm font-bold mb-2">Colonia:</label>
                <input type="text" name="colonia" id="colonia" placeholder="Colonia" value="<?= $datos['Colonia'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="5" required pattern="[A-Z-a-z]* ">
            </div>
            <div class="mb-4">
                <label for="calle" class="block text-white-cream text-sm font-bold mb-2">Calle:</label>
                <input type="text" name="calle" id="calle" placeholder="Calle" value="<?= $datos['Calle'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="5" required pattern="[A-Z-a-z]* ">
            </div>
            <div class="mb-4">
                <label for="muncipio" class="block text-white-cream text-sm font-bold mb-2">Municipio:</label>
                <input type="text" name="municipio" id="municipio" placeholder="Municipio"
                    value="<?= $datos['Municipio'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="5" required pattern="[A-Z-a-z]* ">
            </div>
            <div class="mb-4">
                <label for="localidad" class="block text-white-cream text-sm font-bold mb-2">Localidad:</label>
                <input type="text" name="localidad" id="localidad" placeholder="Localidad"
                    value="<?= $datos['Localidad'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="5" required pattern="[A-Z-a-z]* ">
            </div>
            <div class="mb-4">
                <label for="ncasa" class="block text-white-cream text-sm font-bold mb-2">Numero Casa:</label>
                <input type="text" name="ncasa" id="ncasa" placeholder="Numero Casa" value="<?= $datos['NumeroCasa'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="4" maxlength="4" pattern="[0-9]*">
            </div>

            <div class="mb-4">
                <label for="codigop" class="block text-white-cream text-sm font-bold mb-2">Codigo Postal:</label>
                <input type="text" name="codigop" id="codigop" placeholder="Codigo Postal"
                    value="<?= $datos['CodigoPostal'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    maxlength="5" minlength="5" required pattern="[0-9]{5}">
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