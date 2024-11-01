<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/servicio.css') }}">    
    <link rel="stylesheet" href="{{ asset('CSS/pie_pag.css') }}">
</head>
<body>
    <!-- Botón para abrir el menú -->
    <div class="menu-btn">&#9776; Menu</div>

    <!-- Menú desplegable -->
    <nav id="menu" class="menu">
        <ul>
            <li><a href="{{ url('/') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 22c1-1 3-1 4 0s3-1 4 0 3-1 4 0 3-1 4 0" />
                    <path d="M5 16c1-1 3-1 4 0s3-1 4 0 3-1 4 0 3-1 4 0" />
                    <path d="M8 16v-9a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v9" />
                    <path d="M16 16v-9a2 2 0 0 0-2-2h0a2 2 0 0 0-2 2v9" />
                    <path d="M6 8h12" />
                </svg>&nbsp  Inicio</a></li>
            <li><a href="{{ url('/contacto') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg>&nbsp Contacto</a></li>
            <li><a href="{{ url('/servicios') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                </svg>&nbsp Servicios</a></li>
            <li><a href="{{ url('/reservas') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>&nbsp Reservas</a></li>
            <li><a href="{{ url('/login') }}">                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>&nbsp Iniciar Sesión</a>
            </li>
        </ul>
    </nav>
    <div class="content">
        <!-- Sección de Servicios -->
        <section id="services" class="services-section">
            <div class="container">
                <h2>Nuestros Servicios</h2>

                <div class="services-grid">
                    <!-- Piscina -->
                    <div class="service-item">
                        <img src="https://images.unsplash.com/photo-1470376619031-a6791e534bf0?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8c3dpbXxlbnwwfHwwfHx8MA%3D%3D" alt="Piscina">
                        <h3>Piscina</h3>
                        <p>Disfruta de nuestra piscina de aguas cristalinas con áreas de relajación y juegos para toda la familia.</p>
                        <a href="{{ url('/piscina') }}" class="btn">Nuestras Piscinas</a>
                    </div>

                    <!-- Snacks -->
                    <div class="service-item">
                        <img src="https://barradeideas.theobjective.com/wp-content/uploads/2019/09/fast-food.jpg" alt="Snacks">
                        <h3>Snacks</h3>
                        <p>Prueba nuestros deliciosos snacks y bebidas refrescantes, perfectos para acompañar tu día de diversión.</p>
                        <a href="{{ url('/snack') }}" class="btn">Nuestros snaks</a>
                    </div>

                    <!-- Souvenirs -->
                    <div class="service-item">
                        <img src="https://i0.wp.com/piscinasenpanama.com/wp-content/uploads/2021/09/invitacion-a-fiesta-de-piscina.jpg?resize=768%2C512&ssl=1" alt="Souvenirs y Hospedaje">
                        <h3>Souvenirs</h3>
                        <p>Lleva un recuerdo de tu visita con nuestros souvenirs.</p>
                        <a href="{{ url('/souvenirs') }}" class="btn">Nuestros Productos</a>
                    </div>
                    <!-- Hospedaje -->
                    <div class="service-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR11mE7UjAERaFpumSeegMF_bn_ejN8SPxptQ&s" alt="Souvenirs y Hospedaje">
                        <h3>Hospedaje</h3>
                        <p>¿Deseas quedarte un tiempo? Relájate en nuestras cómodas habitaciones.</p>
                        <a href="info-piscina.php" class="btn">Nuestro Hospedaje</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('JS/menu.js') }}"></script>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="color: #001f3f;" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
            </a>
            <a href="https://www.twitter.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="color: #001f3f;" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg>
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"  style="color: #001f3f;" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
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
