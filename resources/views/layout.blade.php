<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@yield('meta-description', 'Esta es el blog de PetBook')">
    <title>@yield('meta-title', config('app.name').' | Blog')</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('style')
</head>
<body>
    <div class="preload"></div>
    <header class="space-inter">
        <div class="container container-flex space-between">
            <figure class="logo">
                <img src="/img/img-pet-book.png" alt="" width="500">
            </figure>
            <nav class="custom-wrapper" id="menu">
                <div class="pure-menu"></div>
                <ul class="container-flex list-unstyled">
                    <li><a href="/" class="text-uppercase">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenido -->
    @yield('content')

    <section class="footer">
        <footer>
            <div class="container">
                <figure class="logo">
                    <img src="/img/logo.png" alt="">
                </figure>
                <nav>
                    <ul class="container-flex space-center list-unstyled">
                        <li><a href="/" class="text-uppercase c-white">home</a></li>
                    </ul>
                </nav>
                <div class="divider-2"></div>
                <p></p>
                <div class="divider-2" style="width: 80%;"></div>
                <p>© {{ date('Y') }} - PetBook. All Rights Reserved. Designed & Developed by <span class="c-white">Rafael Martínez</span></p>
                <ul class="social-media-footer list-unstyled">
                    <li><a href="#" class="fb"></a></li>
                    <li><a href="#" class="tw"></a></li>
                    <li><a href="#" class="in"></a></li>
                    <li><a href="#" class="pn"></a></li>
                </ul>
            </div>
        </footer>
    </section>
    @stack('script')
</body>
</html>