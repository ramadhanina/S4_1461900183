<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Pengembangan Teknologi Web</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px #ddd;
        }
        thead {
            background-color: #f2f2f2;
            width: 100%
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
    </style>
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: rgb(0, 0, 0)">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TUGAS KEGIATAN 4</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/pasien')}}">Data Pasien</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/guru')}}">Data Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/kelas')}}">Data Kelas</a>
        </li>-->
      </ul>
    </div>
  </div>
</nav>
  <body>
  <h1 style="text-align:center; padding-top:10px">DATA PASIEN</h1>
    <div style="overflow-x: auto">
        <table>
            <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Nama Pasien</th>
                    <th style="text-align:center">Alamat Pasien</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php $no=1 ?>
                @foreach ($pasien as $pasien)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pasien->nama}}</td>
                    <td>{{ $pasien->alamat}}</td>
                    <td>
                      <form action="{{ url('pasien/' . $pasien->id)}}" method="post" style="display:inline-block;">
                        @csrf
                        <a href="{{url('pasien/' . $pasien->id . '/edit')}}" class="btn btn-warning">Edit</a>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>    
    </div>
    <div class="d-grid gap-2 gap-2 col-6 mx-auto" style="padding-top:50px">
       <a href="{{url('pasien/create')}}" class="btn btn-dark">Tambah Data</a>
    </div>
    <div class="d-grid gap-2 gap-2 col-6 mx-auto" style="padding-top:20px;padding-bottom:50px">
    <button type="button" class="btn btn-dark mr-5" data-toggle="modal" data-target="#importExcel" >
			Import Excel
		</button>
    </div>
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/pasien/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>