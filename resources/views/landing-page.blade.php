<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="White Company - Línea blanca de calidad para tu hogar" />
    <meta name="author" content="" />
    <title>White Company - Línea Blanca de Calidad</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --white: #ffffff;
            --black: #000000;
            --gray-light: #f8f9fa;
            --gray-medium: #6c757d;
            --gray-dark: #343a40;
            --accent: #e63946;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--gray-dark);
            scroll-behavior: smooth;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: var(--white);
            padding: 150px 0 100px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 3rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent);
        }
        
        .product-card {
            border: none;
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .category-card {
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            display: flex;
            align-items: flex-end;
            padding: 20px;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .category-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            z-index: 1;
        }
        
        .category-card h3 {
            position: relative;
            z-index: 2;
        }
        
        .category-card:hover {
            transform: scale(1.03);
            color: var(--white);
            text-decoration: none;
        }
        
        .benefit-icon {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }
        
        .testimonial-card {
            background-color: var(--gray-light);
            border-radius: 8px;
            padding: 2rem;
            height: 100%;
        }
        
        .testimonial-img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        
        .footer {
            background-color: var(--black);
            color: var(--white);
            padding: 3rem 0;
        }
        
        /* Estilos mejorados para el carrusel */
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .carousel:hover .carousel-control-prev,
        .carousel:hover .carousel-control-next {
            opacity: 1;
        }
        
        .carousel-control-prev {
            left: 15px;
        }
        
        .carousel-control-next {
            right: 15px;
        }
        
        .carousel-control-prev-icon, 
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
        }
        
        .carousel-indicators {
            bottom: -50px;
        }
        
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--gray-medium);
            margin: 0 5px;
            border: none;
        }
        
        .carousel-indicators .active {
            background-color: var(--accent);
        }
        
        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            padding: 0.75rem 2rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #c1121f;
            border-color: #c1121f;
        }
        
        .btn-outline-light:hover {
            color: var(--black);
        }
        
        /* Animaciones adicionales */
        .fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }
        
        @keyframes slideInLeft {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }
        
        @keyframes slideInRight {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Efectos de hover para tarjetas de productos */
        .product-img-container {
            overflow: hidden;
            height: 250px;
        }
        
        .product-img {
            transition: transform 0.5s ease;
            height: 100%;
            object-fit: cover;
        }
        
        .product-card:hover .product-img {
            transform: scale(1.05);
        }
        
        /* Contador de productos en el carrusel */
        .carousel-counter {
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <i class="bi bi-house-heart me-2"></i>WHITE COMPANY
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#categorias">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#beneficios">Beneficios</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="/login">Iniciar Sesión</a></li>
                </ul>
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#contactModal">
                    <span class="d-flex align-items-center">
                        <i class="bi bi-telephone me-2"></i>
                        <span class="small">Contáctanos</span>
                    </span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="inicio">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center justify-content-center text-center">
                <div class="col-lg-8 fade-in">
                    <h1 class="display-4 fw-bold mb-4">Transforma tu hogar con nuestra línea blanca</h1>
                    <p class="lead mb-5">Encuentra los mejores electrodomésticos para tu hogar con calidad, diseño y la mejor tecnología.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#productos">Ver Productos</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#categorias">Explorar Categorías</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Carousel Section -->
    <section class="py-5 bg-light" id="productos">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="section-title slide-in-left">Productos Destacados</h2>
            
            <div id="productsCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#productsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#productsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://www.lg.com/content/dam/channel/wcms/mx/images/lavadoras-y-secadoras/wm22vv2s6gr_df22vv2_enms_mx_c/gallery/large02.jpg" alt="Lavadora LG" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Lavadora LG Carga Frontal</h5>
                                            <p class="card-text">Tecnología inverter, 20 kg de capacidad, 10 programas de lavado.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$12,499</span>
                                            <span class="fw-bold" style="color: var(--accent);">$9,999</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://cantia.com.mx/cdn/shop/products/M8132_2b52000f-6e96-4918-8112-8c688e84996e.png?v=1659026261" alt="Refrigerador Samsung" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Refrigerador Samsung Side by Side</h5>
                                            <p class="card-text">Dispensador de agua y hielo, 623 litros, tecnología Digital Inverter.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$24,999</span>
                                            <span class="fw-bold" style="color: var(--accent);">$19,999</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://www.costco.com.mx/medias/sys_master/products/hc6/hbe/45257161998366.jpg" alt="Horno Mabe" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Horno Empotrable Mabe</h5>
                                            <p class="card-text">60 cm, acero inoxidable, 8 funciones de cocción, autolimpieza.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$8,499</span>
                                            <span class="fw-bold" style="color: var(--accent);">$6,799</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://www.lg.com/content/dam/channel/wcms/mx/images/lavadoras-y-secadoras/df22vv2sgr_asselat_enms_mx_c/gallery/1600x1062_DF22VV2SGR_MX_Front.jpg/jcr:content/renditions/thum-1600x1062.jpeg" alt="Secadora LG" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Secadora LG Heat Pump</h5>
                                            <p class="card-text">Tecnología Heat Pump, 20 kg, 14 programas, ahorro de energía.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$15,999</span>
                                            <span class="fw-bold" style="color: var(--accent);">$12,799</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3JAHiFOl6CqVBATQT29MrWKhD3SOqs9Rlvw&s" alt="Lavavajillas Whirlpool" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Lavavajillas Whirlpool</h5>
                                            <p class="card-text">14 servicios, 6 programas, display digital, ahorrador de agua.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$11,499</span>
                                            <span class="fw-bold" style="color: var(--accent);">$9,199</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://http2.mlstatic.com/D_NQ_730272-MLA71806846513_092023-OO.jpg" alt="Microondas Panasonic" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Microondas Panasonic</h5>
                                            <p class="card-text">1.6 pies cúbicos, 1100W, 10 niveles de potencia, grill.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$3,499</span>
                                            <span class="fw-bold" style="color: var(--accent);">$2,799</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://homesolution.net/blog/wp-content/uploads/2019/02/carga-de-gas-para-split-aire-acondicionado-D_NQ_NP_916847-MLA26619046313_012018-F.jpeg" alt="Aire Acondicionado" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Aire Acondicionado Split</h5>
                                            <p class="card-text">12,000 BTU, tecnología inverter, modo silencioso, control remoto.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$8,999</span>
                                            <span class="fw-bold" style="color: var(--accent);">$7,199</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWg_K7VNBRtTr9h8y9YiikRJUHXxZXOLl6qQ&s" alt="Estufa de Gas" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Estufa de Gas Mabe</h5>
                                            <p class="card-text">4 quemadores, parrilla de hierro fundido, encendido automático.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$4,999</span>
                                            <span class="fw-bold" style="color: var(--accent);">$3,999</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card product-card h-100">
                                    <div class="product-img-container">
                                        <img class="card-img-top product-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_Yi8baHOVkqcu6yuADuDivMLEGuVf0JWG1Q&s" alt="Lavavajillas Bosch" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">Lavavajillas Bosch</h5>
                                            <p class="card-text">Eficiencia energética A++, 12 servicios, programa intensivo.</p>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <span class="text-muted text-decoration-line-through">$13,499</span>
                                            <span class="fw-bold" style="color: var(--accent);">$10,799</span>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-primary mt-auto" href="#">Agregar al carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
                <div class="carousel-counter">
                    <span id="currentSlide">1</span> / <span id="totalSlides">3</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5" id="categorias">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="section-title slide-in-right">Nuestras Categorías</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="category-card" style="background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1558&q=80');">
                        <h3>Lavadoras</h3>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="category-card" style="background-image: url('https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
                        <h3>Refrigeradores</h3>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="category-card" style="background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
                        <h3>Estufas y Hornos</h3>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="category-card" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_Yi8baHOVkqcu6yuADuDivMLEGuVf0JWG1Q&s');">
                        <h3>Lavavajillas</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-5 bg-light" id="beneficios">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="section-title slide-in-left">¿Por qué elegir White Company?</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Garantía Extendida</h4>
                    <p>Todos nuestros productos incluyen garantía extendida y servicio técnico especializado.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="benefit-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h4>Envío Gratis</h4>
                    <p>Entrega gratuita en toda la ciudad con instalación incluida en productos seleccionados.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="benefit-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h4>Financiamiento</h4>
                    <p>Hasta 24 meses sin intereses con tarjetas participantes y planes de pago flexibles.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="benefit-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4>Calidad Garantizada</h4>
                    <p>Trabajamos con las mejores marcas del mercado para garantizar la máxima calidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5" id="testimonios">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="section-title slide-in-right">Lo que dicen nuestros clientes</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Cliente" class="testimonial-img mx-auto">
                        <h5>María González</h5>
                        <div class="d-flex justify-content-center text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-0">"Compré mi refrigerador con White Company y el servicio fue excelente. La entrega fue puntual y la instalación muy profesional. ¡Totalmente recomendados!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Cliente" class="testimonial-img mx-auto">
                        <h5>Carlos Rodríguez</h5>
                        <div class="d-flex justify-content-center text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p class="mb-0">"Excelente atención al cliente y precios competitivos. La lavadora que compré funciona perfectamente y el proceso de financiamiento fue muy sencillo."</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/women/67.jpg" alt="Cliente" class="testimonial-img mx-auto">
                        <h5>Ana Martínez</h5>
                        <div class="d-flex justify-content-center text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-0">"Hice mi cocina completa con White Company y quedé encantada. La calidad de los electrodomésticos es excelente y el asesoramiento fue muy profesional."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 bg-dark text-white">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">¿Listo para transformar tu hogar?</h2>
                    <p class="mb-4">Contáctanos hoy mismo y recibe asesoría personalizada para encontrar los electrodomésticos perfectos para tu hogar.</p>
                    <a class="btn btn-primary btn-lg" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Solicitar Asesoría</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="text-uppercase mb-4">White Company</h4>
                    <p class="mb-0">Tu tienda de confianza para electrodomésticos de línea blanca. Calidad, servicio y garantía en un solo lugar.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Enlaces rápidos</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#inicio" class="text-white text-decoration-none">Inicio</a></li>
                        <li class="mb-2"><a href="#productos" class="text-white text-decoration-none">Productos</a></li>
                        <li class="mb-2"><a href="#categorias" class="text-white text-decoration-none">Categorías</a></li>
                        <li class="mb-2"><a href="#beneficios" class="text-white text-decoration-none">Beneficios</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Contacto</h4>
                    <p class="mb-1"><i class="bi bi-geo-alt me-2"></i> Av. Principal 123, Ciudad</p>
                    <p class="mb-1"><i class="bi bi-telephone me-2"></i> (555) 123-4567</p>
                    <p class="mb-0"><i class="bi bi-envelope me-2"></i> info@whitecompany.com</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 White Company. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a class="text-white me-3" href="#"><i class="bi bi-facebook"></i></a>
                    <a class="text-white me-3" href="#"><i class="bi bi-twitter"></i></a>
                    <a class="text-white me-3" href="#"><i class="bi bi-instagram"></i></a>
                    <a class="text-white" href="#"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white p-4">
                    <h5 class="modal-title" id="contactModalLabel">Contáctanos</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script para actualizar el contador del carrusel
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('productsCarousel');
            const currentSlide = document.getElementById('currentSlide');
            const totalSlides = document.getElementById('totalSlides');
            
            // Establecer el número total de slides
            totalSlides.textContent = carousel.querySelectorAll('.carousel-item').length;
            
            // Actualizar el contador cuando cambie el slide
            carousel.addEventListener('slid.bs.carousel', function() {
                const activeIndex = Array.from(carousel.querySelectorAll('.carousel-item')).indexOf(carousel.querySelector('.carousel-item.active')) + 1;
                currentSlide.textContent = activeIndex;
            });
            
            // Animaciones al hacer scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, observerOptions);
            
            // Observar elementos para animaciones
            document.querySelectorAll('.section-title').forEach(function(el) {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>