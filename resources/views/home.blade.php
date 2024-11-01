<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Piscina</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/pie_pag.css') }}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css" rel="stylesheet" />
</head>

<body>
    <!-- Botón para abrir el menú -->
    <div class="menu-btn">&#9776; Menu</div>

    <!-- Menú desplegable -->
    <nav id="menu" class="menu">
        <ul>
            <li><a href="{{ url('/') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 22c1-1 3-1 4 0s3-1 4 0 3-1 4 0 3-1 4 0" />
                        <path d="M5 16c1-1 3-1 4 0s3-1 4 0 3-1 4 0 3-1 4 0" />
                        <path d="M8 16v-9a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v9" />
                        <path d="M16 16v-9a2 2 0 0 0-2-2h0a2 2 0 0 0-2 2v9" />
                        <path d="M6 8h12" />
                    </svg>&nbsp Inicio</a>
            </li>
            <li><a href="{{ url('/contacto') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>&nbsp Contacto</a>
            </li>
            <li><a href="{{ url('/servicios') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                        <path
                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0" />
                    </svg>&nbsp Servicios</a>
            </li>
            <li><a href="{{ url('/reservas') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-calendar3" viewBox="0 0 16 16">
                        <path
                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                        <path
                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>&nbsp Reservas</a>
            </li>
            @auth
                <li>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>&nbsp {{ Auth::user()->Nombre }}
                    </span>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>&nbsp Cerrar Sesión
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ url('/login') }}" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>&nbsp Iniciar Sesión
                    </a>
                </li>
            @endauth
        </ul>
    </nav>

    <div id="main-content" class="content">
        <div class="contenedor-titulo_ini">
            <img src="{{ asset('img/Icon_Playa.png') }}" alt="Piscina" width="300" height="200">
            <h2 class="Titulo_pag">Playa Azul</h2>
        </div>

        <!-- Contenido principal -->
        <section class="principal">
            <div class="container-principal">
                @auth
                    <div class="welcome-banner mb-8 bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-blue-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-2"
                                viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            ¡Bienvenido, {{ Auth::user()->Nombre }}!
                        </h2>
                        <p class="text-gray-600">Gracias por visitarnos. ¿Qué te gustaría hacer hoy?</p>

                    </div>
                @endauth

                <div class="heading-principal">
                    <h1>Un lugar ideal para el descanso y la diversión</h1>
                </div>
                <div class="description-principal">
                    <p>Playa Azul es un lugar donde junto a toda la piscina encontrarán la maravilla del descanso. Los
                        esperamos en Reyes-Beni para que disfruten de una magnífica experiencia.</p>
                </div>
                @guest
                    <div class="login-button">
                        <a href="{{ url('/login') }}"
                            class="btn hover:bg-blue-700 transition duration-300 shadow-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-2"
                                viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            Iniciar Sesión
                        </a>
                    </div>
                @endguest
            </div>
        </section>

        <!-- Apartado de informaciones -->
        <section class="features">
            <div class="feature-item">
                <img src="https://assets.isu.pub/document-structure/210812083223-b351260b42160417696feed135a60472/v1/e4080d0819e7cfeb2c13796f46fb314c.jpeg"
                    alt="Imagen de servicios">
                <div class="feature-text">
                    <h2>Servicios</h2>
                    <p>Ofrecemos una variedad de servicios para hacer de tu experiencia algo inolvidable, desde piscinas
                        para todas las edades hasta áreas de esparcimiento.</p>
                    <a href="{{ url('/servicios') }}" class="btn">Ver Servicios</a>
                </div>
            </div>

            <div class="feature-item">
                <img src="https://fitnessports.eu/wp-content/uploads/2020/09/Perfect-Pixel-Publicidad-fotograf%C3%ADa-piscina-Fitness-Sports-Valle-las-Ca%C3%B1as.jpg"
                    alt="Imagen de la piscina">
                <div class="feature-text">
                    <h2>Información de la piscina</h2>
                    <p>Conoce más sobre nuestras instalaciones y disfruta de nuestras piscinas adaptadas para todas las
                        edades y niveles.</p>
                    <a href="info-piscina.php" class="btn">Más información</a>
                </div>
            </div>

            <div class="feature-item">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/413931143.jpg?k=54272459a3e1cd346273cf7920c91ca00a7c1647fb26a57ec82cf2d4e7bf7f2a&o=&hp=1"
                    alt="Imagen de reservas">
                <div class="feature-text">
                    <h2>Reservas</h2>
                    <p>Reserva ahora para asegurarte un lugar en nuestras instalaciones. ¡Disfruta de una experiencia
                        única con nosotros!</p>
                    <a href="{{ url('/reservas') }}" class="btn">Reservar ahora</a>
                </div>
            </div>
        </section>

        <!-- Carrusel de imágenes -->
        <section class="carousel">
            <div class="slides">
                <div class="slide"><img
                        src="https://www.piscinadecor.com/wp-content/uploads/2023/07/piscinas-fibra-barcelona.jpg"
                        alt="Imagen 1"></div>
                <div class="slide"><img src="https://phbolivia.com/wp-content/uploads/2020/10/unnamed.jpg"
                        alt="Imagen 2"></div>
                <div class="slide"><img
                        src="https://www.piscinasferromar.com/blog/wp-content/uploads/2022/09/agua-piscina.jpg"
                        alt="Imagen 3"></div>
                <div class="slide"><img
                        src="https://images.ecestaticos.com/MANpfYygBUizER13YDE1uP4OtzQ=/49x0:1164x836/1200x900/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2Fcce%2Ff73%2F715%2Fccef73715c1fdcddb168088254316aca.jpg"
                        alt="Imagen 4"></div>
                <div class="slide"><img src="https://a-cero.com/wp-content/uploads/2023/03/piscinas-de-lujo.jpg"
                        alt="Imagen 5"></div>
                <div class="slide"><img src="https://phbolivia.com/wp-content/uploads/2021/09/PHB-IMG-A63-P-scaled.jpg"
                        alt="Imagen 6"></div>
                <div class="slide"><img
                        src="https://www.elmondelapiscina.com/wp-content/uploads/2019/12/cupula-alta-climatizacion-piscinas-5-1.jpg"
                        alt="Imagen 7"></div>
                <div class="slide"><img
                        src="https://image-tc.galaxy.tf/wijpeg-61z74fz67p8b49wynkl3kzaek/pool-2.jpg?width=1920"
                        alt="Imagen 8"></div>
                <div class="slide"><img
                        src="https://coolpool.es/wp-content/uploads/2020/09/piscinas-con-playa-arena.jpg"
                        alt="Imagen 9"></div>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </section>

        <!-- Efecto de olas -->
        <section class="wave-section">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160">
                <path fill="#ffffff"
                    d="M0,128L30,117.3C60,107,120,85,180,74.7C240,64,300,64,360,74.7C420,85,480,107,540,106.7C600,107,660,85,720,69.3C780,53,840,43,900,58.7C960,74,1020,117,1080,128C1140,139,1200,117,1260,85.3C1320,64,1380,22,1410,0L1440,0L1440,160L1410,160C1380,160,1320,160,1260,160C1200,160,1140,160,1080,160C1020,160,960,160,900,160C840,160,780,160,720,160C660,160,600,160,540,160C480,160,420,160,360,160C300,160,240,160,180,160C120,160,60,160,30,160L0,160Z">
                </path>
            </svg>
        </section>

        <div class="Mapa-fondo">
            <section class="map-section">
                <h2>
                    <center>Piscina Playa Azul - Reyes</center>
                </h2>
                <center>
                    <div class="map-container" id="map"></div>
                </center><br>
            </section>
        </div>
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhbWluMTczMyIsImEiOiJjbTA1YjliZWcwaGowMmxxNnh4ZnVhZHdoIn0.go7TrVvHMPB-maWjsyOzQQ'; // Reemplaza con tu token
        var map = new mapboxgl.Map({
            container: 'map', // ID del contenedor donde se mostrará el mapa
            style: 'mapbox://styles/mapbox/streets-v11', // Estilo del mapa
            center: [-66.0617, -16.4072], // Longitud y latitud de tu ubicación
            zoom: 15 // Nivel de zoom inicial
        });

        // Añadir un marcador
        new mapboxgl.Marker()
            .setLngLat([-66.0617, -16.4072])
            .addTo(map);
    </script>
    <script src="{{ asset('JS/menu.js') }}"></script>
    <script src="{{ asset('JS/carousel.js') }}"></script>
</body>
<footer>
    <div class="footer-container">
        <!-- Sección de enlaces legales -->
        <div class="legal-links">
            <ul>
                <li>Términos y Condiciones</li>
                <li>Política de Privacidad</li>
            </ul>
        </div>

        <!-- Sección de redes sociales -->
        <div class="social-media">
            <a href="https://www.facebook.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    style="color: #001f3f;" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a href="https://www.twitter.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    style="color: #001f3f;" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg>
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    style="color: #001f3f;" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>
            </a>
        </div>

        <!-- Sección de copyright -->
        <div class="copyright">
            <p>&copy; 2024 Piscina Playa Azul. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

</html>