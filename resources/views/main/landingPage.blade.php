<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERDIK-Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #003cff;
        }
        nav img {
            height: 50px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        nav ul li a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <img src="{{asset('storage/CerdikLogo.png')}}" alt="Logo">
            <span class="text-white ms-2" style="font-size: 24px; font-weight: bold;">Cerdikin</span>
        </div>
        <ul>
            <li><a href="{{route('landingPage')}}">BERANDA</a></li>
            <li><a href="{{route('mitraKami')}}">MITRA KAMI</a></li>
            <li><a href="{{route('tentangObat')}}">TENTANG OBAT</a></li>
            <li><a href="{{route('panduan')}}">PANDUAN</a></li>
        </ul>
    </nav>
</body>
</html>

<main>
    <section id="banner" class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>CERDIK</h1>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($carousels as $key => $carousel)
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        @foreach ($carousels as $key => $carousel)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }} mb-5">
                                <h3>{{ $carousel->title }}</h3>
                                <p>{!! nl2br(e($carousel->description)) !!}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <a href="https://play.google.com/store/games?device=windows" class="d-block mt-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                    alt="Get it on Google Play" class="img-fluid" style="max-width: 200px;">
            </a>
        </div>
    </section>
</main>

<footer class="text-center py-3">
    <div class="container-fluid text-center py-4">
        <div class="row">
            <h4>CERDIKIN AJA!</h4>
            <div class="col-md-4">
                <h5>Mitra Kami</h5>
                <ul class="list-unstyled " id = "list">
                    <li><a href="https://www.instagram.com/telkomuniversity/" class="text-white">Telkom University</a></li>
                    <li><a href="https://www.instagram.com/tmart.official/" class="text-white">T-Mart</a></li>
                    <li><a href="https://nurhax.itch.io/cutcutroadrage" class="text-white">Cut Cut Road Rage</a></li>
                    <li><a href="https://www.instagram.com/pempeknyonyalita/" class="text-white">Pempek Nyonya Lita</a></li>
                    <li><a href="https://www.instagram.com/soufncake/" class="text-white">Souf N Cake</a></li>
                    <li><a href="https://www.instagram.com/mentaico.official/" class="text-white">Mentai Co</a></li>
                    <li><a href="https://www.instagram.com/lets.sendwish/" class="text-white">Sendwish</a></li>
                    <li><a href="https://nurhax.itch.io/" class="text-white">Madjadev</a></li>
                    <li><a href="{{route('login')}}" class="text-white">Admin</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>About Us</h5>
                <ul class="list-unstyled" id="list">
                    <li><a href="#" class="text-white">Yang Membuat Web ini :</a></li>
                    <li><a href="https://www.instagram.com/alifzadanir/" class="text-white">Alif Adani Rahmat - 1302220114</a></li>
                    <li><a href="https://www.instagram.com/nurhax.12/" class="text-white">Muhammad Iqbal Nurhaq - 1302223050</a></li>
                    <li><a href="https://www.instagram.com/gabrielleadsense/" class="text-white">Gabrielle Adsense Felime - 1302220053</a></li>
                    <li><a href="https://www.instagram.com/farisazh_/" class="text-white">Faris Azhar Dwiputra - 1302223123</a></li>
                    <li><a href="https://www.instagram.com/farahamaliaa.a/" class="text-white">Farah Amalia Putra - 1302223137</a></li>
                    <li><a href="https://www.instagram.com/farrelhaykalgiffarii/" class="text-white">Farrel Haykal Giffari - 1302220064</a></li>
                    <li><a href="https://www.instagram.com/prabustialwan/" class="text-white">Prabusti Alwan Fauzan - 1302223102</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Person</h5>
                <ul class="list-unstyled" id="list">
                    <li><a href="https://wa.me/6281322400043" class="text-white">+62-8132-2400-043</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3" id="listGambar">
            <a href="#"><img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png?hl=id" alt="Get it on Google Play" style="width: 150px;"></a>
            <a href="#" class="ms-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1280px-Download_on_the_App_Store_Badge.svg.png" alt="Download on the App Store" style="width: 130px; margin-top: 10px;"></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    footer {
    background-color: #003cff;  /* Warna latar belakang biru */
    color: #ffffff;  /* Warna teks putih */
    padding: 40px 0;
    font-family: Arial, sans-serif;
    }

    footer h4 {
    margin-bottom: 20px;
    }

    footer h5, #list {
        text-align: left;
        padding-left: 90px;
    }

    footer a {
    color: #ffffff;  /* Warna tautan putih */
    text-decoration: none;
    }

    footer a:hover {
    text-decoration: underline;
    }

    footer .container-fluid {
    max-width: 1200px;
    }

    footer ul {
    list-style: none;
    padding: 0;
    text-align: left;
    }

    footer ul li {
    margin-bottom: 10px;
    }

    footer .d-flex img {
    width: 140px;
    }

    footer .d-flex img:first-child {
    margin-right: 15px;
    }

    footer, #listGambar{
        justify-content: center;
    }

    nav a:hover {
        background-color: white;
        color: #003cff !important;
        padding: 10px 20px;
        border-radius: 30px;
        transition: background-color 0.3s, color 0.3s;
    }

</style>
