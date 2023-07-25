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
        <h1 class="text-2xl font-bold mb-4 text-white-cream">Registro para producto</h1>
        <div>
            <form action="?C=ProductsController&M=__add" method="post"
                class="w-full sm:max-w-md" autocomplete="off" enctype="multipart/form-data">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <!-- Campo de Codigo Barras--->
                    <div>
                        <label for="codigobarras" class="block mb-2 text-sm font-bold text-white-cream">Codigo de
                            Barras:</label>
                        <input type="text" id="codigobarras" name="codigobarras"
                            class="w-full px-4 py-2 rounded border-gray-300" required maxlength="12" pattern="[0-9]*">
                    </div>
                    <!-- Campo de Nombre de Producto -->
                    <div>
                        <label for="product" class="block mb-2 text-sm font-bold text-white-cream">Nombre del
                            Producto:</label>
                        <input type="text" id="product" name="product" class="w-full px-4 py-2 rounded border-gray-300"
                            required minlength="5" pattern="[A-Za-z ]*">
                    </div>
                    <!-- Campo de Descripcion -->
                    <div>
                        <label for="descripcion"
                            class="block mb-2 text-sm font-bold text-white-cream">Descripcion:</label>
                        <input type="text" id="descripcion" name="descripcion"
                            class="w-full px-4 py-2 rounded border-gray-300" required>
                    </div>
                    <!-- Campo de Precio -->
                    <div>
                        <label for="price" class="block mb-2 text-sm font-bold text-white-cream">Precio:</label>
                        <input type="text" id="price" name="price" class="w-full px-4 py-2 rounded border-gray-300"
                            minlength="3" pattern="[0-9]*.[0-9]*" required>
                    </div>
                    <!-- Campo de Caducidad-->
                    <div>
                        <label for="date" class="block mb-2 text-sm font-bold text-white-cream">Caducidad (Fecha):</label>
                        <input type="date" id="date" name="date"
                            class="w-full px-4 py-2 rounded border-gray-300" required>
                    </div>
                    <div>
                        <label for="time" class="block mb-2 text-sm font-bold text-white-cream">Caducidad (Hora):</label>
                        <input type="time" id="time" name="time"
                            class="w-full px-4 py-2 rounded border-gray-300" required step="1">
                    </div>
                    <!-- Campo de Existencia -->
                    <div>
                        <label for="existencia"
                            class="block mb-2 text-sm font-bold text-white-cream">Existencia:</label>
                        <input type="text" id="existencia" name="existencia"
                            class="w-full px-4 py-2 rounded border-gray-300" minlength="1" required pattern="[0-9]*">
                    </div>
                    <!-- Campo de Descripcion -->
                    <div>
                        <label for="pdescripcion" class="block mb-2 text-sm font-bold text-white-cream">Descripcion
                            Presentacion:</label>
                        <input type="text" id="pdescripcion" name="pdescripcion"
                            class="w-full px-4 py-2 rounded border-gray-300" required>
                    </div>
                </div>
                <!-- Campo de Existencia -->
                <div>
                    <label for="cantidad" class="block mb-2 text-sm font-bold text-white-cream">Cantidad de
                        Piezas:</label>
                    <input type="text" id="cantidad" name="cantidad" class="w-full px-4 py-2 rounded border-gray-300"
                        minlength="1" required pattern="[0-9]*">
                </div>  
                <!-- Campo del Imagen del Producto -->
                <div class="relative mt-4">
                    <label for="imageProduct" class="block mb-2 text-sm font-bold text-white-cream">Imagen del
                        producto:</label>
                    <input type="file" id="imageProduct" name="imageProduct" accept="image/*"
                        class="w-full py-2 appearance-none bg-transparent border-gray-300 border rounded-lg px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        required>
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
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
                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="w-full lg:w-auto py-2 px-4 bg-brown-cream text-white rounded hover:bg-brown-cream-opacitiy transition duration-200">Registrar
                        Productos</button>
                </div>
            </form>
        </div>
    </div>
</div>