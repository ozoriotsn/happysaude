<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title ?? 'Page Title' }}</title>
    <meta name="description" content="{{ $description ?? 'Page Description' }}" />
    <meta name="keywords" content="{{ $keywords ?? 'Page Keywords' }}" />
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-blue text-emphasis-primary">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand" href="/"><img src="https://saudehappy.com.br/wp-content/uploads/2022/01/HAPPY-BRANCO-1.png"
                    height="50"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>


                </ul>





            </div>
        </div>
    </nav>

    @yield('content')


    <section class="printer">

        <!-- Modal -->
        <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @livewire('upload-file')

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-green"><i class="bi-cart-fill me-1"></i> Continuar</button> -->
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer-->
    <footer class="py-5 bg-green">
        <div class="container">

            <p class=" text-center text-white">
                <a href="sobre" target="_self" class="btn btn-outline-light">Sobre</a>
                <a href="projetos" target="_self" class="btn btn-outline-light">Imprimir</a>
                <a href="contato" target="_self" class="btn btn-outline-light">Contato</a>


            </p>

            <p class="m-0 text-center text-white">© 2023 Fábrica das Apostilas. Todos os direitos reservados. CNPJ.:
                10.698.022.0001.20 </p>
            <p class="m-0 text-center text-white mt-3 social-icons">
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-twitter"></i></a>
            </p>
        </div>
    </footer>


    <a href="https://wa.me/555141414654" class="float" target="_blank">
        <i class="bi bi-whatsapp my-float"></i>
    </a>

</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>

</html>
