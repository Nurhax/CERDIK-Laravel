<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CERDIK-CRUD OBAT</title>

    <style>
        .btn-hover:hover{
            background-color: white;
            color: rgb(39, 39, 249) !important;
        }
    </style>

    <script>
        const routes = {
            adminMenu: @json(route('login')),
            CRUDMitra: @json(route('CRUDMitra')),
            CRUDObat: @json(route('admin.CRUDObat'))
        };
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid" style="font-family: Arial, Helvetica, sans-serif;">
            <a class="navbar-brand" href="{{ route('adminMenu')}}">
                <img src="{{asset('storage/CerdikLogo.png')}}" alt="logo" width="70" height="70">
                <span class="fw-bold fs-1" style="color: white; font-family: Arial, Helvetica, sans-serif; padding-top: 10px;">Cerdikin</span>
            </a>

            <!--NAVBAR-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button type="button" class="btn  me-3 btn-hover fs-5 fw-bold" style="color: white" onclick="window.location.href= routes.CRUDMitra">MITRA</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn me-3 btn-hover fs-5 fw-bold" style="color: white;" onclick="window.location.href= routes.CRUDObat">OBAT</button>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                        <a href="#" class="btn me-3 btn-hover fs-5 fw-bold" style="color: white;"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            LOGOUT
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1 class="text-center fw-bold">OBAT</h1>
    </div>

    <!--BUTTON TAMBAH OBAT-->
    <div class="container d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add New</button>
    </div>
<!-- MODAL TAMBAH OBAT -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.CRUDObat.submit') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Obat Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nama Obat -->
                    <div class="mb-3">
                        <label for="namaObatBaru" class="form-label">Nama Obat</label>
                        <input type="text" id="namaObatBaru" name="nama_obat" class="form-control" placeholder="Masukkan nama obat" required>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsiObat" class="form-label">Deskripsi</label>
                        <textarea id="deskripsiObat" name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi obat" required></textarea>
                    </div>
                    <!-- URL Gambar -->
                    <div class="mb-3">
                        <label for="urlGambarObat" class="form-label">URL Gambar</label>
                        <input type="url" id="urlGambarObat" name="url_gambar" class="form-control" placeholder="Masukkan URL gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- TABLE OBAT-->    
    <div class="container mt-5" style="font-family: Arial, Helvetica, sans-serif;">
        <table class="table table-bordered table-striped" id="obatTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Url_Gambar</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(empty($obats))
                    <td colspan = "5" class="text-center table-warning">Tidak Ada Data</td>
                @else
                    @foreach($obats as $obat)
                    <tr>
                        <td>{{$obat['id']}}</td>
                        <td>{{$obat['nama_obat']}}</td>
                        <td>{{$obat['deskripsi']}}</td>
                        <td><img src="{{$obat['url_gambar']}}" alt="{{$obat['nama_obat']}}"></td>
                        <td>
                            <div class="container d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$obat['id']}}">Edit</button>
                            </div>

                            <!-- MODAL EDIT OBAT -->
                            <div class="modal fade" id="editModal{{$obat['id']}}" tabindex="-1" aria-labelledby="editModalLabel{{$obat['id']}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.CRUDObat.update', $obat['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{$obat['id']}}">Edit Obat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Nama Obat -->
                                                <div class="mb-3">
                                                    <label for="namaObatBaru{{$obat['id']}}" class="form-label">Nama Obat</label>
                                                    <input type="text" id="namaObatBaru{{$obat['id']}}" name="nama_obat" class="form-control" value="{{$obat['nama_obat']}}" required>
                                                </div>
                                                <!-- Deskripsi -->
                                                <div class="mb-3">
                                                    <label for="deskripsiObat{{$obat['id']}}" class="form-label">Deskripsi</label>
                                                    <textarea id="deskripsiObat{{$obat['id']}}" name="deskripsi" class="form-control" rows="3" required>{{$obat['deskripsi']}}</textarea>
                                                </div>
                                                <!-- URL Gambar -->
                                                <div class="mb-3">
                                                    <label for="urlGambarObat{{$obat['id']}}" class="form-label">URL Gambar</label>
                                                    <input type="url" id="urlGambarObat{{$obat['id']}}" name="url_gambar" class="form-control" value="{{$obat['url_gambar']}}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            
                        <form action="{{ route('admin.CRUDObat.destroy', $obat['id']) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-secondary" 
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Paracetamol</td>
                    <td>
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Detail</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="editObat(1, 'Paracetamol')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a></li>
                            <li><a class="dropdown-item" href="#" >Delete</a></li>
                        </ul>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <!-- MODAL EDIT OBAT-->
    <!-- <div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editObatId">
                <input type="text" id="editNamaObat" class="form-control" placeholder="Nama Obat">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpanEditObat()">Save Changes</button>
            </div>
        </div>
    </div> -->
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="{{asset('js/adminScripts/CRUD.js')}}"></script> <!-- Link ke file JavaScript eksternal -->
</body>
</html>
