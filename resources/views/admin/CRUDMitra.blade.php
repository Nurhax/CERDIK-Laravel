
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" href="{{asset('css/adminStyles/CRUDmitra.css')}}" rel="stylesheet">
    <title>CERDIK-CRUD MITRA</title>
</head>
<body>
  <nav>
    <div class="container-fluid" style="padding: 0;">
        <div class="navbar" style="background-color: #2563EB; height: 100px;">
            <div class="d-flex justify-content-start align-items-left">
                <a href="{{ route('adminMenu')}}" target="_blank" style="padding-left: 20px;">
                <img src="{{asset('storage/CerdikLogo.png')}}" alt="Cerdik" class="image" style="height: 70px; padding-right: 0px;">
                </a>
                <h1 style="color: white; font-weight: bold;padding-top: 10px; padding-left: 0px;">Cerdikin</h1>
            </div>
            <ul>
                <li>
                    <a href = "{{ route('CRUDMitra')}}">MITRA</a>
                </li>
                <li>
                    <a href = "{{ route('CRUDObat')}}">OBAT</a>
                </li>
                <li>
                    @if(Auth::check())
                        <a href="#" 
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalLabel">Edit Mitra</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="mitraForm">
                  <div class="mb-3">
                      <label for="inputNamaMitra" class="form-label">Nama Mitra</label>
                      <input type="text" class="form-control" id="inputNamaMitra">
                  </div>
                  <div class="mb-3">
                    <label for="inputSejak" class="form-label">Mitra CERDIK sejak</label>
                    <input type="text" class="form-control" id="inputSejak">
                </div>
                <div class="mb-3">
                    <label for="inputLink" class="form-label">Link Mitra</label>
                    <input type="text" class="form-control" id="inputLink">
                </div>
                  <div class="mb-3">
                      <label for="imageUpload" class="form-label">Upload Image</label>
                      <input class="form-control" type="file" id="imageUpload" accept="image/*">
                  </div>
                  <div class="mb-3">
                      <img id="imagePreview" src="#" alt="Your Image" class="img-thumbnail" style="display: none; width: 200px; height: auto;">
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="modalSaveButton">Add Mitra</button>
          </div>
      </div>
  </div>
</div>

  
  

    <div style="border-bottom: 2px solid black;"></div>

    <div class="container d-flex align-items-center">
        <div class="flex-grow-1 text-center">
            <h1>MITRA</h1>
        </div>
    </div>
    <div class="container-fluid custom-container d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary me-2 addBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
        <button type="button" class="btn btn-primary me-2 editBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Edit</button>
        <button class="btn btn-primary deleteBtn">Delete</button>
    </div>

    <div class="container-fluid">
      <table class="table  table-primary table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Mitra Sejak</th>
              <th scope="col">Logo</th>
              <th scope="col"></th> 
            </tr>
          </thead>
          <tbody>
            
      </table>
  </div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/adminScripts/CRUDmitra.js')}}"></script> 
</body>
</html>