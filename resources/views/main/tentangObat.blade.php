<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/mainStyles/tentangObat.css')}}">
    <title>CERDIK-Tentang Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav>
        <div class="Logo">
            <img src="{{asset('storage/CerdikLogo.png')}}" alt="Logo">
            <p>Cerdikin</p>
        </div>
        <ul>
            <li>
                <a href="{{route('landingPage')}}">BERANDA</a>
            </li>
            <li>
                <a href="{{route('mitraKami')}}">MITRA KAMI</a>
            </li>
            <li>
                <a href="{{route('tentangObat')}}">TENTANG OBAT</a>
            </li>
            <li>
                <a href="{{route('panduan')}}">PANDUAN</a>
            </li>
        </ul>
    </nav>

    <h2>Temukan Obat & Kondisi Anda</h2>

    <div class="container">
        <form action="{{ route('tentangObat') }}" method="GET" class="searchBar">
            <input type="text" placeholder="Cari Obat" name="cariObat" value="{{ $cariObat ?? '' }}">
            <button type="submit">
                <img src="{{ asset('storage/searchIcon.png') }}">
            </button>
        </form>
    </div>

    <div class="column-grid">
        @forelse ($obats as $key => $obat)
            <div class="card c{{ $key }}" onclick="showPopup({{ $key }})"
                style="display: {{ $key < 8 ? 'block' : 'none' }};">
                <img src="{{ $obat['url_gambar'] }}" alt="Gambar {{ $obat['nama_obat'] }}">
                <div class="card-name">{{ $obat['nama_obat'] }}</div>
            </div>
        @empty
            <p>Tidak ada obat yang ditemukan.</p>
        @endforelse
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <button class="back-button" onclick="closePopup()">Kembali</button>
            <img id="popup-img" alt="popup Gambar">
            <p id="popup-title"></p>
            <p id="popup-text"></p>
        </div>
    </div>

    <div class="button-selengkapnya">
        <div class="button-action">
            <button type="button" id="loadMore" onclick="loadMore()">Muat Lebih Banyak</button>
        </div>
    </div>


    <script>
        const allObats = @json($obats); // Semua data obat
        let filteredObats = [...allObats]; // Data obat hasil pencarian
        let displayedCount = 8; // Jumlah item yang ditampilkan awalnya

        function showPopup(index) {
            const popup = document.getElementById('popup');
            const popupImg = document.getElementById('popup-img');
            const popupTitle = document.getElementById('popup-title');
            const popupText = document.getElementById('popup-text');

            const obat = filteredObats[index];
            if (obat) {
                popupImg.src = obat.url_gambar;
                popupImg.alt = "Gambar " + obat.nama_obat;
                popupTitle.textContent = obat.nama_obat;
                popupText.textContent = obat.deskripsi;

                popup.style.display = 'block';
            } else {
                console.error(`Data obat dengan index ${index} tidak ditemukan.`);
            }
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        function renderObats() {
            const container = document.querySelector('.column-grid');
            container.innerHTML = ''; // Kosongkan kontainer

            filteredObats.slice(0, displayedCount).forEach((obat, index) => {
                const card = document.createElement('div');
                card.className = `card c${index}`;
                card.setAttribute('onclick', `showPopup(${index})`);
                card.innerHTML = `
                <img src="${obat.url_gambar}" alt="Gambar ${obat.nama_obat}">
                <div class="card-name">${obat.nama_obat}</div>
            `;
                container.appendChild(card);
            });

            updateLoadMoreButton();
        }

        function loadMore() {
            displayedCount += 8; // Tambah jumlah item yang ditampilkan
            renderObats();
        }

        function updateLoadMoreButton() {
            const loadMoreButton = document.getElementById('loadMore');
            if (displayedCount >= filteredObats.length) {
                loadMoreButton.style.display = 'none';
            } else {
                loadMoreButton.style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            renderObats(); // Render data awal

            const searchForm = document.querySelector('.searchBar');
            searchForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Hindari reload halaman

                const searchInput = document.querySelector('input[name="cariObat"]').value.toLowerCase();
                filteredObats = allObats.filter(obat =>
                    obat.nama_obat.toLowerCase().includes(searchInput)
                );

                displayedCount = 8; // Reset jumlah item yang ditampilkan
                renderObats();
            });
        });
    </script>




    <footer class="text-center py-3">
        <div class="container-fluid text-center py-4">
            <div class="row">
                <h4>CERDIKIN AJA!</h4>
                <div class="col-md-4">
                    <h5>Mitra Kami</h5>
                    <ul class="list-unstyled" id="list">
                        <li><a href="https://www.instagram.com/telkomuniversity/" class="text-white">Telkom
                                University</a></li>
                        <li><a href="https://www.instagram.com/tmart.official/" class="text-white">T-Mart</a></li>
                        <li><a href="https://nurhax.itch.io/cutcutroadrage" class="text-white">Cut Cut Road Rage</a>
                        </li>
                        <li><a href="https://www.instagram.com/pempeknyonyalita/" class="text-white">Pempek Nyonya
                                Lita</a></li>
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
                        <li><a href="https://www.instagram.com/alifzadanir/" class="text-white">Alif Adani Rahmat -
                                1302220114</a></li>
                        <li><a href="https://www.instagram.com/nurhax.12/" class="text-white">Muhammad Iqbal Nurhaq -
                                1302223050</a></li>
                        <li><a href="https://www.instagram.com/gabrielleadsense/" class="text-white">Gabrielle Adsense
                                Felime - 1302220053</a></li>
                        <li><a href="https://www.instagram.com/farisazh_/" class="text-white">Faris Azhar Dwiputra -
                                1302223123</a></li>
                        <li><a href="https://www.instagram.com/farahamaliaa.a/" class="text-white">Farah Amalia Putra -
                                1302223137</a></li>
                        <li><a href="https://www.instagram.com/farrelhaykalgiffarii/" class="text-white">Farrel Haykal
                                Giffari - 1302220064</a></li>
                        <li><a href="https://www.instagram.com/prabustialwan/" class="text-white">Prabusti Alwan Fauzan
                                - 1302223102</a></li>
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
                <a href="#"><img
                        src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png?hl=id"
                        alt="Get it on Google Play" style="width: 150px;"></a>
                <a href="#" class="ms-3"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1280px-Download_on_the_App_Store_Badge.svg.png"
                        alt="Download on the App Store" style="width: 130px; margin-top: 10px;"></a>
            </div>
        </div>
    </footer>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/mainScripts/tentangObat.js')}}"></script> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>