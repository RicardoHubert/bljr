@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Kompetisi Internal</h3>
						</div>
						<div class="panel-body">
							<form action="/kompetisiinternal/{{$kompetisiinternal->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group">
						<label for="exampleInputEmail1">Poster</label>
						<input type="file" name="poster" value="{{$kompetisiinternal->poster}}" class="form-control">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Nama kompetisi</label>
						<input type="text" name="nama_kompetisi" value="{{$kompetisiinternal->nama_kompetisi}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>

					<div class="form-group">
					    <label for="exampleInputEmail1">Jenis kompetisi</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kompetisi">
					      <option value="">"------Pilih Jenis kompetisi-------"</option>
					      <option value="Internal">Internal</option>
					      <option value="Eksternal">Eksternal</option>
					    </select>
					 </div>

					 <div class="form-group">
						<label for="exampleInputEmail1">URL</label>
						<input type="text" name="url" value="{{$kompetisiinternal->url}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>


					 <div class="form-group">
						<label for="exampleInputEmail1">Judul Sertifikat</label>
						<input type="text" name="sertifikat" value="{{$kompetisiinternal->sertifikat}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>

				 <div class="form-group">
				    <label for="exampleInputEmail1">File Unggah Sertifikat</label>
				    <input type="file" name="file_sertifikat" value="{{$kompetisiinternal->file_sertifikat}}" class="form-control" >
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Skala</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="skala">
				      <option value="">"------Pilih skala-------"</option>
				      <option value="Wilayah">Wilayah</option>
				      <option value="Nasional">Nasional</option>
				      <option value="Internasional">Internasional</option>
				    </select>
				 </div>

				 <div class="form-group">
					<label for="exampleInputEmail1">Pencapaian</label>
					<input type="text" name="pencapaian" value="{{$kompetisiinternal->pencapaian}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">Nama Kegiatan</label>
				    <input type="text" name="nama_kegiatan" value="{{$kompetisiinternal->nama_kegiatan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				 </div>

	 			<div class="form-group">
				    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
				    <input type="date" name="tanggal_kegiatan" value="{{$kompetisiinternal->tanggal_kegiatan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				 </div>

				 <div class="form-group">
				    <label for="exampleInputEmail1">Penyelenggara</label>
				    <input type="text" name="penyelenggara" value="{{$kompetisiinternal->penyelenggara}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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