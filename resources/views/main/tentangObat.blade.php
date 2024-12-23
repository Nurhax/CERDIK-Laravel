<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" href="{{asset('css/mainStyles/tentangObat.css')}}">
        <title>CERDIK-Tentang Obat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>

        <nav>
            <div class="Logo">
                <img src="{{asset('storage/CerdikLogo.png')}}"  alt="Logo">
                <p>Cerdikin</p>
            </div>    
            <ul>
                <li>
                    <a href = "{{route('landingPage')}}">BERANDA</a>
                </li>
                <li>
                    <a href = "{{route('mitraKami')}}">MITRA KAMI</a>
                </li>
                <li>
                    <a href = "{{route('tentangObat')}}">TENTANG OBAT</a>
                </li>
                <li>
                    <a href = "{{route('panduan')}}">PANDUAN</a>
                </li>
            </ul>
        </nav>
    
        <h2>Temukan Obat & Kondisi Anda</h2>
        
        <div class="container">
            <form action="" class="searchBar">
                <input type="text" placeholder="Cari Obat" name="cariObat">
                <button type="submit"><img src="{{asset('storage/searchIcon.png')}}"> </button>
            </form>
        </div>
        
        <div class="column-grid">
            <div class="card c0" onclick="showPopup(0)">
                <img src="https://i.pinimg.com/564x/97/00/b7/9700b7cb43f8e17fd4c0e973bbb36821.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT NUROFEN</div>
            </div>
            <div class="card c1" onclick="showPopup(1)">
                <img src="https://i.pinimg.com/564x/c5/0a/f6/c50af693b6972884032e07bbffd17355.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT PARECETAMOL</div>
            </div>
            <div class="card c2" onclick="showPopup(2)">
                <img src="https://i.pinimg.com/564x/20/5c/48/205c48ead79d3ed8f58c1a0dc1ccce26.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT VOLTAREN</div>
            </div>
            <div class="card c3" onclick="showPopup(3)">
                <img src="https://i.pinimg.com/564x/48/c9/99/48c999875d6fab5970513a9a71edcf2c.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT RANIGAST</div>
            </div>
            <div class="card c4" onclick="showPopup(4)">
                <img src="https://i.pinimg.com/564x/62/c1/f2/62c1f2a3c6db32bd391ebd470c5962e6.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT GAVISCON</div>
            </div>
            <div class="card c5" onclick="showPopup(5)">
                <img src="https://i.pinimg.com/564x/3b/a1/f4/3ba1f47bae58c579f9f02232b7afd25a.jpg" alt="Gambar Obat">
                <div class="card-name">OBAT BISOLVON</div>
            </div>
            <div class="card c6" onclick="showPopup(6)">
                <img src="https://d2qjkwm11akmwu.cloudfront.net/products/638089_30-6-2019_22-35-32-1665801908.webp" alt="Gambar Obat">
                <div class="card-name">OBAT DIAPET</div>
            </div>
            <div class="card c7" onclick="showPopup(7)">
                <img src="https://d3bbrrd0qs69m4.cloudfront.net/images/product/apotek_online_k24klik_20220803090741359225_foto-produk-ORLISTAT.png" alt="Gambar Obat">
                <div class="card-name">OBAT ORLISTAT</div>
            </div>
        </div>

        <div id="popup" class="popup">
            <div class="popup-content">
                <button class="back-button" onclick="closePopup()">Kembali</button>
                <img id="popup-img" w alt="popup Gambar">
                <p id = 'popup-title'></p>
                <p id="popup-text"></p>
            </div>
        </div>


        <div class="button-selengkapnya">
            <div class="button-action">
                <button type="button" >Muat Lebih Banyak</button>
            </div>
        </div>

        <footer class="text-center py-3">
            <div class="container-fluid text-center py-4">
                <div class="row">
                    <h4>CERDIKIN AJA!</h4>
                    <div class="col-md-4">
                        <h5>Mitra Kami</h5>
                        <ul class="list-unstyled" id="list">
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
                        <ul class="list-unstyled" id="list" >
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('js/mainScripts/tentangObat.js')}}"></script>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</html>