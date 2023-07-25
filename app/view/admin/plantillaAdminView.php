<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta datos  -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sabrosetas</title>
  <!-- Links de Css -->
  <link rel="stylesheet" href="app/view/css/style.css" />
  <link rel="stylesheet" href="app/view/css/invalid.css"/>
  <link rel="stylesheet" href="app/view/admin/css/style.min.css" />
  <link rel="stylesheet" href="app/view/css/owl.carousel.min.css">
  <link rel="stylesheet" href="app/view/css/owl.theme.default.min.css">
  <!-- Fuentes de googleapis -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body class="bg-brown-cream-v2">
  <!-- Cabecera -->
  <header class="sticky top-0 z-50">
    <nav class="bg-brown-cream-opacitiy-v2 border-brown-cream px-4 lg:px-6 py-2.5">
      <!--Contenedor Principal -->
      <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <!-- Logo y nombre de la empresa -->
        <a href="?C=AdminController&M=__index" class="flex items-center">
          <!-- Imagen Logo -->
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white-cream">Sabrosetas<sub
              class="text-brown-cream-v3">Admin</sub></span>
        </a>
        <!-- Area d e logueo y registro de usuarios | Menu de Hamburguesa -->
        <div class="flex items-center lg:order-2">
          <?php

          if (!isset($_SESSION))
            session_start();
          if (isset($_SESSION['logedin']) && $_SESSION['logedin'])
            echo '<a href="?C=UserController&M=__login_out" class="text-white-cream hover:text-brown-cream-v3 focus:ring-4 focus:ring-brown-cream-v3 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Cerrar Sesion</a>';
          else {
            echo '<a href="?C=UserController&M=__callFormLogin" class="text-white-cream hover:text-brown-cream-v3 focus:ring-4 focus:ring-brown-cream-v3 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Log in</a>';
            echo '<a href="?C=UserController&M=__callFormAdd" class="text-white-cream hover:text-brown-cream-v3 focus:ring-4 focus:ring-brown-cream-v3 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Sign Up</a>';

          }
          ?>
        </div>
        <!-- Menu de Hamburguesa -->
        <!-- Opciones del navbar para la pagina -->
        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
          <!-- Creacion de lista desordenada -->
          <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
            <li>
              <a href="?C=ProductsController&M=__index"
                class="block py-2 pr-4 pl-3 text-brown-cream-v3 rounded lg:p-0">Productos</a>
            </li>
            <li>
              <a href="?C=UserController&M=__index"
                class="block py-2 pr-4 pl-3 text-white-cream hover:text-brown-cream-v3 rounded lg:p-0">Usuarios</a>
            </li>
            <li>
              <a href="?C=VentaController&M=__index"
                class="block py-2 pr-4 pl-3 text-white-cream hover:text-brown-cream-v3 rounded lg:p-0">Ventas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Gestor de la vista -->
  <?php include_once($__view); ?>
  <!-- Gestiones Js -->
  <script src="app/view/js/sweetalert2.min.js"></script>
  <script src="app/view/js/jquery.min.js"></script>
  <script src="app/view/admin/js/main.js"></script>
  <script src="app/view/js/owl.carousel.min.js"></script>
</body>

</html>