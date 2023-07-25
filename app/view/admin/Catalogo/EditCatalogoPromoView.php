<div class="flex flex-col justify-center items-center h-screen bg-brown-cream-v2 mt-8">
    <div class="w-full max-w-md p-6 rounded shadow-md">
        <h2 class="text-2xl text-brown-cream-v3 font-bold text-center mb-6">Actualización de datos del Catalogo Promocion</h2>
        <form action="?C=CatalogoPromoController&M=__edit" method="post"
            autocomplete="off" enctype="multipart/form-data">
            <!-- Código de Promocion-->
            <div class="mb-4">
                <label for="codigoBarras" class="block text-white-cream text-sm font-bold mb-2">Código de Promocion:</label>
                <input type="text" name="codigoBarras" id="codigoBarras" readonly placeholder="Código de Barras"
                    value="<?= $datos['idPromociones'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Nombre del Producto -->
            <div class="mb-4">
                <label for="nombreProducto" class="block text-white-cream text-sm font-bold mb-2">Nombre del
                    Producto:</label>
                <input type="text" name="nombreProducto" id="nombreProducto" placeholder="Nombre del Producto"
                    value="<?= $datos['NombreProducto'] ?>"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required minlength="5" pattern="[A-Za-zñ ]*">
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