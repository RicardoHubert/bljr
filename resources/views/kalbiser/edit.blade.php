@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Kalbiser</h3>
						</div>
						<div class="panel-body">
							<form action="/kalbiser/{{$kalbiser->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto" value="{{$kalbiser->foto}}" class="form-control">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Nama</label>
						<input type="text" name="nama" value="{{$kalbiser->nama}}" class="form-control">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">NIM</label>
						<input type="text" name="nim" value="{{$kalbiser->nim}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Prodi</label>
							<input type="text" name="prodi" class="form-control" id="exampleInputEmail1" value="{{$kalbiser->prodi}}" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">No.Handphone</label>
							<input type="text" name="nohp" class="form-control" id="exampleInputEmail1" value="{{$kalbiser->nohp}}" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{$kalbiser->email}}" aria-describedby="emailHelp">
						</div>

							<button type="submit" class="btn btn-warning">Edit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop