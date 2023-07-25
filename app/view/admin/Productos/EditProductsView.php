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
        <form action="?C=ProductsController&M=__edit" method="post"
            autocomplete="off" enctype="multipart/form-data">
            <!-- Código de Barras -->
            <div class="mb-4">
                <label for="codigoBarras" class="block text-white-cream text-sm font-bold mb-2">Código de
                    Barras:</label>
                <input type="text" name="codigoBarras" id="codigoBarras" readonly placeholder="Código de Barras"
                    value="<?= $datos['codigoBarras'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Imagen del Producto -->
            <div class="mb-4">
                <label for="imagenProducto" class="block text-white-cream text-sm font-bold mb-2">Imagen del
                    Producto:</label>
                <input type="file" name="imagenProducto" id="imagenProducto" placeholder="Imagen del Producto"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Nombre del Producto -->
            <div class="mb-4">
                <label for="nombreProducto" class="block text-white-cream text-sm font-bold mb-2">Nombre del
                    Producto:</label>
                <input type="text" name="nombreProducto" id="nombreProducto" placeholder="Nombre del Producto"
                    value="<?= $datos['nombreProducto'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required minlength="5" pattern="[A-Za-zñ ]*">
            </div>
            <!-- Descripción del Producto -->
            <div class="mb-4">
                <label for="descripcion" class="block text-white-cream text-sm font-bold mb-2">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del Producto"
                    value="<?= $datos['descripcion'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Precio del Producto -->
            <div class="mb-4">
                <label for="precio" class="block text-white-cream text-sm font-bold mb-2">Precio:</label>
                <input type="text" name="precio" id="precio" placeholder="Precio" value="<?= $datos['precio'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="2" pattern="[0-9]*.[0-9]*" required>
            </div>

            <!-- Estado del Producto -->
            <div class="mb-4">
                <label for="estado" class="block text-white-cream text-sm font-bold mb-2">Estado del Producto:</label>
                <select name="estado" id="estado"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <?php
                    if ($datos['estado'] != 0) {
                        echo "<option value='1' selected>Disponible</option>";
                        echo "<option value='0'>No Disponible</option>";
                    } else {
                        echo "<option value='1'>Disponible</option>";
                        echo "<option value='0' selected>No Disponible</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Existencia del Producto -->
            <div class="mb-4">
                <label for="existencia" class="block text-white-cream text-sm font-bold mb-2">Existencia:</label>
                <input type="text" name="existencia" id="existencia" placeholder="Precio"
                    value="<?= $datos['existencia'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    minlength="1" required pattern="[0-9]*">
            </div>
            <!-- Caducidad del Producto -->
            <div class="mb-4">
                <label class="block text-white-cream text-sm font-bold mb-2">Caducidad del
                    Producto:</label>
                <input type="date" name="date" id="date" value="<?= $datos['fecha_caducidad'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required>
                <input type="time" name="time" id="time" value="<?= $datos['hora_caducidad'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 mt-4"
                    required step="1">
            </div>

            <!-- Presentación del Producto -->
            <div class="mb-4">
                <label for="presentacion" class="block text-white-cream text-sm font-bold mb-2">Presentación:</label>
                <select name="presentacion" id="presentacion"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <?php
                    require_once("app/model/presentacionModel.php");
                    $__model = new __presentacionModel();
                    $datos = $__model->__getAll();
                    foreach ($datos as $dato) {
                        echo "<option value='{$dato['idPresentacion']}'>{$dato['descripcion']}</option>";
                    }
                    ?>
                </select>
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