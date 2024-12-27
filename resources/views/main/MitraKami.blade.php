<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERDIKIN-AJA</title>
    <link rel="stylesheet" href="{{asset('css/mainStyles/MitraKami.css')}}">
</head>

<body>
    <nav>
        <div class="Logo">
            <img src="{{asset('storage/CerdikLogo.png')}}" alt="Logo">
            <p>Cerdikin</p>
        </div>
        <ul>
            <li><a href="{{route('landingPage')}}">BERANDA</a></li>
            <li><a href="{{route('mitraKami')}}">MITRA KAMI</a></li>
            <li><a href="{{route('tentangObat')}}">TENTANG OBAT</a></li>
            <li><a href="{{route('panduan')}}">PANDUAN</a></li>
        </ul>
    </nav>

    <div class="Mitra Kami">
        <h1>MITRA KAMI</h1>
        <div class="carousel-container">
            <div class="carousel-slide">
                @foreach ($mitraData as $mitra)
                    <div class="carousel-item">
                        <a href="{{ $mitra->link }}" target="_blank">
                            <img src="{{ asset('storage/' . $mitra->img_src) }}" alt="{{ $mitra->namaMitra }} Logo">
                        </a>
                        <p>{{ $mitra->namaMitra }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    <div class="social-media">
        <h2>SOCIAL MEDIA KAMI</h2>
        <div class="social-icons">
            <a href="https://www.instagram.com" target="_blank" class="icon-box">
                <img src="{{asset('storage/instagram.png')}}" alt="Instagram Logo">
                <p>@Cerdikin</p>
            </a>
            <a href="https://www.facebook.com" target="_blank" class="icon-box">
                <img src="{{asset('storage/facebook.png')}}" alt="Facebook Logo">
                <p>CERDIKIN-AJA</p>
            </a>
            <a href="https://www.tiktok.com" target="_blank" class="icon-box">
                <img src="{{asset('storage/tik-tok.png')}}" alt="TikTok Logo">
                <p>CERDIKIN-AJA</p>
            </a>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>CERDIKIN AJA!</h4>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h5>Mitra Kami</h5>
                    <div class="rata">
                        <li><a href="https://www.instagram.com/telkomuniversity/">Telkom University</a></li>
                        <li><a href="https://www.instagram.com/tmart.official/">T-Mart</a></li>
                        <li><a href="https://nurhax.itch.io/cutcutroadrage">Cut Cut Road Rage</a></li>
                        <li><a href="https://www.instagram.com/pempeknyonyalita/">Pempek Nyonya Lita</a></li>
                        <li><a href="https://www.instagram.com/soufncake/">Souf N Cake</a></li>
                        <li><a href="https://www.instagram.com/mentaico.official/">Mentai Co</a></li>
                        <li><a href="https://www.instagram.com/lets.sendwish/">Sendwish</a></li>
                        <li><a href="https://nurhax.itch.io/">Madjadev</a></li>
                        <li><a href="{{route('login')}}" class="text-white">Admin</a></li>
                    </div>
                </div>
                <div class="footer-column">
                    <h5>About Us</h5>
                    <ul>
                        <li><a href="#">Yang Membuat Web ini :</a></li>
                        <li><a href="https://www.instagram.com/alifzadanir/">Alif Adani Rahmat - 1302220114</a></li>
                        <li><a href="https://www.instagram.com/nurhax.12/">Muhammad Iqbal Nurhaq - 1302223050</a></li>
                        <li><a href="https://www.instagram.com/gabrielleadsense/">Gabrielle Adsense Felime -
                                1302220053</a></li>
                        <li><a href="https://www.instagram.com/farisazh_/">Faris Azhar Dwiputra - 1302223123</a></li>
                        <li><a href="https://www.instagram.com/farahamaliaa.a/">Farah Amalia Putra - 1302223137 </a>
                        </li>
                        <li><a href="https://www.instagram.com/farrelhaykalgiffarii/">Farrel Haykal Giffari -
                                1302220064</a></li>
                        <li><a href="https://www.instagram.com/prabustialwan/">Prabusti Alwan Fauzan - 1302223102</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>Contact Person</h5>
                    <div class="ipo">
                        <li><a href="https://wa.me/6281322400043">+62-8132-2400-043</a></li>
                    </div>
                </div>
            </div>
            <div class="footer-apps">
                <a href="#"><img
                        src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png?hl=id"
                        style="size: 60px;" alt="Get it on Google Play"></a>
                <a href="#"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1280px-Download_on_the_App_Store_Badge.svg.png"
                        style="size: 10px;" alt="Download on the App Store"></a>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/mainScripts/MitraKami.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>