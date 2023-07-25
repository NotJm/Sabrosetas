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
        <h2 class="text-2xl text-brown-cream-v3 font-bold text-center mb-6">Actualización de datos de Productos</h2>
        <form action="?C=PresentacionController&M=__edit" method="post"
            autocomplete="off" enctype="multipart/form-data">
            <!-- IdPresentacion -->
            <div class="mb-4">
                <label for="presentacion" class="block text-white-cream text-sm font-bold mb-2">Codigo Presentacion:</label>
                <input type="text" name="presentacion" id="presentacion" readonly placeholder="Código de Presentacion"
                    value="<?= $datos['idPresentacion'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Descripcion -->
            <div class="mb-4">
                <label for="descripcion" class="block text-white-cream text-sm font-bold mb-2">Descripcion:</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"
                    value="<?= $datos['descripcion'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required minlength="5" pattern="[A-Za-z ]*">
            </div>
            <!-- Existencia del Producto -->
            <div class="mb-4">
                <label for="cantidadpiezas" class="block text-white-cream text-sm font-bold mb-2">Cantidad Piezas:</label>
                <input type="text" name="cantidadpiezas" id="cantidadpiezas" placeholder="Cantidad Piezas"
                    value="<?= $datos['cantidadPiezas'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="1" required pattern="[0-9]*">
            </div>
            <!-- Botón para editar -->
            <div class="flex justify-center">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                    Editar
                </button>
            </div>
        </form>
    </div>
</div>      