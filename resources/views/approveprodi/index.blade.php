
@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">SKPI</h3>
									<div class="left">
										<input type="checkbox" onclick="toggle(this);" />Select All

										<form action="/approveskpiall" id="form">
												<button type="submit" class="button btn-xl" style="background-color: yellow;" value="Approve All">Approve All</button>
										</form>
									</div>
									<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
							<div class="panel-body">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th></th>
													<th>Gambar</th>
													<th>Nim</th>
													<th>Nama Mahasiswa</th>	
													<th>Prodi</th>					
													<th>Jenis Dokumen</th>
													<th>Tanggal Dokumen</th>
													<th>Judul Sertifikat</th>
													<th>Status</th>		
											</tr>
										</thead>
										<tbody>


												@foreach($data as $skpi)
												<tr>										
													<td>
														<input form="form" type="checkbox" name="approveId[]" value="{{ $skpi->id }}">
													</td>
													<td><img style="height: 50px;" src="fileskpi/{{$skpi->file_skpi}}" /></td>
													@php
														$kalbiser = \App\kalbiser::where('user_id', $skpi->user_id)->first();
													@endphp
													<td>{{ $kalbiser->nim }}</td>
													<td>{{ $kalbiser->nama }}</td>
													<td>{{ $kalbiser->prodi }}</td>
												


													<td>{{$skpi->jenis_dokumen}}</td>
													<td>{{$skpi->tanggal_dokumen}}</th>
													<th>{{$skpi->judul_sertifikat}}</th>
													<td>
													@if($skpi->status != '1')
														<a href="/approveskpi/{{$skpi->id}}" class="btn btn-sm btn-warning">approve</a>
													@else
														<span>Sudah di approve</span>
													@endif
													</td>

												</tr>
												@endforeach
										</tbody>
									</table>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	<script type="text/javascript">
	$(document).ready(function() {
	$('.data').DataTable();
	});
	</script>


<script>
	function toggle(source) {
	    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
	    for (var i = 0; i < checkboxes.length; i++) {
	        if (checkboxes[i] != source)
	            checkboxes[i].checked = source.checked;
	    }
	}

	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt = $(this).val();
			if(txt != '')
			{

			}
			else{
				$('#result').html('');
				$.ajax({
					url:'index',
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#result').html(data);
					}
				});
			}
		});
	});
</script>
@stop