<!-- Contendor principal -->
<div class="flex h-screen">
    <!-- Contenedor de la imagen responsive-->
    <div class="hidden lg:block w-1/2 bg-gray-100">
        <!-- Aquí puedes colocar la imagen -->
        <img src="app/view/resources/pastiseta-image.jpg" alt="Imagen de fondo" class="object-cover w-full h-full">
    </div>
    <!-- Contenedor de formulario -->
    <div class="w-full lg:w-1/2 bg-brown-cream-v2 flex flex-col justify-center items-center">
        <h1 class="text-2xl italic font-bold mb-4 text-white-cream">! Inicie Sesion PastiUsuario !</h1>
        <form class="w-full sm:max-w-md" action="?C=UserController&M=__login" method="post" autocomplete="off">
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-bold text-white-cream">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-bold text-white-cream">Contraseña:</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <p class="font-extrabold underline">
                    <?php 
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);  
                        }
                    ?>
                </p>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full py-2 px-4 bg-brown-cream text-white rounded hover:bg-brown-cream-opacitiy transition duration-200">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>
   