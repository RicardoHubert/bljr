@extends('layout.master')

@section('content')
<div class="main">
	<div class="main-control">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
						<h3 class="panel-title">Edit Data Skpi</h3>

						</div>
						<div class="panel-body">
							<form action="/skpi/{{$data_skpi->id}}/update" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

							
				      		  <div class="form-group">
													   	
							   <label for="exampleInputEmail1">Nama Mahasiswa</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
							      <option value="">"------Pilih-------"</option>
				  					
									@foreach($data_kalbiser as $kalbiser)
									@if($kalbiser->user_id == auth()->user()->id|| auth()->user()->role == 'admin')	
							      <option value="{{$kalbiser->user_id}}">{{$kalbiser->nama}} <span>{{$kalbiser->nim}}</span></option>
	
							      	@endif
							     	@endforeach
							     </select>
							 </div>

							 
						 <div class="form-group">
							    <label for="exampleInputEmail1">Jenis Dokumen</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="jenis_dokumen">
							      <option value="">"------Pilih-------"</option>
							      <option value="jkk">JKK</option>
							      <option value="seminar">Seminar</option>
							      <option value="piagam">Piagam</option>
							      <option value="kompetisi eksternal">Kompetisi Eksternal</option>
							    </select>
						</div>

						<br>
					  	<div class="form-check form-check-inline">
						  <input class="form-check-input " type="radio" name="kegiatan_id" id="kegiatan_radio" value="kegiatan">
						  <label class="form-check-labl" for="inlineRadio1">Kegiatan</label>
						  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						  <input class="form-check-input " type="radio" name="kegiatan_id" id="kompetisi_radio" value="kompetisi">
						  <label class="form-check-label" for="inlineRadio1">Kompetisi</label>
						</div>
						<br>

						

					  <div class="form-group kegiatan_radio_hasil">
				
					    	<label for="exampleInputEmail1">Kegiatan</label>
							     <select class="form-control" id="exampleFormControlSelect1" name="kegiatan_id">
							      <option value="">"------Pilih-------"</option>
							    @foreach($data_kegiatan as $kegiatan)
							      <option value="{{$kegiatan->id}}">{{$kegiatan->id}}</option>
							    @endforeach
							    </select>
					    
					  </div>

  					  <div class="form-group kompetisi_radio_hasil">
				
					    	<label for="exampleInputEmail1">Kompetisi</label>
							     <select class="form-control" id="exampleFormControlSelect1" name="kompetisi_id">
							      <option value="">"------Pilih-------"</option>
							      @foreach($data_kompetisi as $kompetisi)
							      <option value="{{$kompetisi->id}}">{{$kompetisi->id}}</option>
							      @endforeach
							    </select>
					    
					  </div>
					

					 <input type="hidden" name="status" value="0">
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>

				  	<div class="modal-dialog">
				  		<div class="col-md-4">
				  		<div class="modal-content">
					  		<div class="modal-header">
					  		<h5 class="modal-title" id="exampleModalLabel">Search List Kegiatan Data SKPI</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				  		<div class="form-group">
						    <label for="exampleInputEmail1">Kegiatan</label>
						    <input type="text" name="kegiatan_id" id="kegiatan_id" list="datalistkegiatan" class="form-control" aria-describedby="emailHelp" placeholder="">
						    <datalist id="datalistkegiatan">
						    	@foreach($data_kegiatan as $kegiatan)
						    	<select name="{{$kegiatan->nama_kegiatan}}" id="kegiatan_id">
						    	<option value="{{$kegiatan->id}}">{{$kegiatan->nama_kegiatan}}</option>
						    	@endforeach
						    	</select>
						    </datalist>
						 </div>
						</div>
					</div>
					</div>
						
					<div class="col-md-4">
				  		<div class="modal-content">
					  		<div class="modal-header">
					  		<h5 class="modal-title" id="exampleModalLabel">Search List Kompetisi Data SKPI</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				  		<div class="form-group ">
						    <label for="exampleInputEmail1">Kompetisi</label>
						    <input type="text" name="kompetisi_id" list="datalistkompetisi" class="form-control" aria-describedby="emailHelp" placeholder="">
						    <datalist id="datalistkompetisi">
						    	@foreach($data_kompetisi as $kompetisi)
						    	<select name="{{$kompetisi->nama_kompetisi}}">
						    	<option value="{{$kompetisi->id}}">{{$kompetisi->nama_kompetisi}}</option>
						    	@endforeach
						    	</select>
						    </datalist>
						 </div>
						</div>
					</div>
					</div>

					<div class="col-md-4">
				  		<div class="modal-content">
					  		<div class="modal-header">
					  		<h5 class="modal-title" id="exampleModalLabel">Search List Mahasiswa Data SKPI</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				  		<div class="form-group ">
						    <label for="exampleInputEmail1">Mahasiswa</label>
						    <input type="text" name="" list="datalistkalbiser" class="form-control" aria-describedby="emailHelp" placeholder="">
						    <datalist id="datalistkalbiser">
						    	@foreach($data_kalbiser as $kalbiser)
						    	<select name="{{$kalbiser->nama}}">
						    	<option value="{{$kalbiser->user_id}}">{{$kalbiser->nama}}</option>
						    	@endforeach
						    	</select>
						    </datalist>
						 </div>
						</div>
					</div>
					</div>
				</div>
@stop