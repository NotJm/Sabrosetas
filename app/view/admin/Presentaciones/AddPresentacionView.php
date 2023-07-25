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
        <h1 class="text-2xl font-bold mb-4 text-white-cream">Registro para presentacion</h1>
        <div>
            <form action="?C=PresentacionController&M=__add" method="post"
                class="w-full sm:max-w-md" autocomplete="off">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <!-- Campo de Codigo Barras--->
                    <div>
                        <label for="presentacion" class="block mb-2 text-sm font-bold text-white-cream">ID
                            Presentacion:</label>
                        <input type="text" id="presentacion" name="presentacion"
                            class="w-full px-4 py-2 rounded border-gray-300" required pattern="[0-9]*">
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
                        Presentacion</button>
                </div>
            </form>
        </div>
    </div>
</div>