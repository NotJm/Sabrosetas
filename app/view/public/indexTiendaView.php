<div class="w-full lg:w-auto lg:order-3">
    <div class="bg-brown-cream-opacitiy-v2 py-2 px-4 lg:hidden">
        <input type="text" placeholder="Buscar Sabrosetas" id="search-input"
            class="bg-transparent border-brown-cream placeholder-slate-300 text-white-cream w-full focus:outline-none focus:placeholder-slate-400" />
    </div>
</div>
<div class="flex flex-wrap mt-4">
    <?php foreach ($datos as $dato): ?>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-8 px-2 producto">
            <div class="flex flex-col h-full">
                <div class="flex-none">
                    <!-- Imagen Producto -->
                    <img src="app/view/src/img/products/<?= $dato["imagenProducto"] ?>" alt=""
                        class="w-full h-auto object-cover rounded-lg" loading="lazy" />
                </div>
                <!-- Formulario de Compra -->
                <form action="#" class="flex-auto p-6">
                    <div class="flex flex-wrap items-baseline">
                        <!-- Nombre Producto -->
                        <h1 id="productName" class="w-full flex-none mb-3 text-3xl leading-none text-white-cream">
                            <?= $dato["nombreProducto"] ?>
                        </h1>
                        <!-- Precio Producto -->
                        <div class="flex-auto text-lg font-medium text-white-cream" id="price">
                            $<?= $dato["precio"] ?>
                        </div>
                        <!-- Disponibilidad -->
                        <div class="text-xs leading-6 font-medium uppercase text-white-cream">
                            <?= $dato['estado'] == 1 ? 'Disponible' : 'No Disponible' ?>
                        </div>
                    </div>
                    <!-- De más datos -->
                    <div class="flex space-x-4 mb-5 text-sm font-medium">
                        <div class="flex-auto flex space-x-4 pr-4">
                            <button
                                class="flex-none w-1/2 h-12 uppercase font-medium tracking-wider bg-brown-cream hover:bg-brown-cream-opacitiy text-white"
                                type="button">
                                Comprar ahora
                            </button>
                            <!-- Boton de Añadir Carrito id = shop-car -->
                            <button id="shop-car"
                                class="flex-none w-1/2 h-12 uppercase font-medium tracking-wider bg-brown-cream hover:bg-brown-cream-opacitiy text-white-cream"
                                type="button">
                                Añadir al carrito
                            </button>
                        </div>
                        <button
                            class="flex-none flex items-center justify-center w-12 h-12 text-slate-300 border border-slate-200"
                            type="button" aria-label="Like">
                            <svg width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                            </svg>
                        </button>
                    </div>
                    <!-- Descripcion -->
                    <p class="text-sm text-white-cream italic font-extrabold">
                        <?= $dato['descripcion'] ?>
                    </p>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="app/view/public/js/search.js"></script>