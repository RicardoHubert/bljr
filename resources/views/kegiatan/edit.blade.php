@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Kegiatan</h3>
						</div>
						<div class="panel-body">
							<form action="/kegiatan/{{$kegiatan->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
						<label for="exampleInputEmail1">Poster</label>
						<input type="file" name="poster" value="{{$kegiatan->poster}}" class="form-control">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Nama Kegiatan</label>
						<input type="text" name="nama_kegiatan" value="{{$kegiatan->nama_kegiatan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Kegiatan</label>
							<input type="date" name="tanggal_kegiatan" class="form-control" id="exampleInputEmail1" value="{{$kegiatan->tanggal_kegiatan}}" aria-describedby="emailHelp">
						</div>


					   <div class="form-group">
					    <label for="exampleInputEmail1">Deskripsi Kegiatan</label>
					    <textarea id="konten" class="form-control" name="deskripsi_kegiatan" valie="{{$kegiatan->deskripsi_kegiatan}}" rows="10" cols="50"></textarea>
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Judul Sertifikat </label>
						<input type="text" name="sertifikat" value="{{$kegiatan->sertifikat}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">File Unggah</label>
						<input type="file" name="file_sertifikat" value="{{$kegiatan->file_sertifikat}}" class="form-control">
						</div>



							<button type="submit" class="btn btn-warning">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop