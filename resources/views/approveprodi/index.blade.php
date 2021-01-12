
@extends('layout.master')

@section('content')
		<div class="main">
			<div class="main-control">
				<div class="container-fluid" style="margin-top: 50px !important;">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">SKPI</h3>
									<div class="left">
										<input type="checkbox" onclick="toggle(this);" />Select All

										<form action="{{action('SkpiController@approvestatusall')}}" id="form">
												<button type="submit" class="button btn-xl" style="background-color: yellow;" value="Approve All">Approve All</button>
										</form>
									</div>
								<!-- 	<div class="right">
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div> -->
								</div>
							<div class="panel-body">
								<div class="table-responsive">
									 <table class="table table-hover data">
									 	<thead>
												<tr>
													<th></th>
													<th>NIM</th>
													<th>Nama Mahasiswa</th>
													<th>Program Studi</th>
													<th>Jenis Dokumen</th>
													<th>Tanggal Dokumen</th>
													<th>Judul Sertifikat</th>
													<th>Status</th>
													<th>Aksi</th>
											</tr>
										</thead>
										<tbody>


												@foreach($data as $skpi)
												<tr>
													<td>
														<input form="form" type="checkbox" name="approveId[]" value="{{ $skpi->id }}">
													</td>
													@php
														$kalbiser = \App\kalbiser::where('user_id', $skpi->user_id)->first();
													@endphp
													<td>{{ $kalbiser->nim }}</td>
													<td><a href="{{action('KalbiserController@profile',$kalbiser->id)}}">{{$kalbiser->nama}}</td></a>

													<td>{{ $kalbiser->prodi->nama_prodi }}</td>



													<td>{{$skpi->jenis_dokumen}}</td>
													<td>{{$skpi->tanggal_dokumen}}</td>
													<td>{{$skpi->judul_sertifikat}}</td>
														<td>@if($skpi->status != '1' )
															<span class="alert-danger">Belum Di Approve</span>
														@else
															<span class="alert-success">Sudah Di Approve</span>
														@endif
													<td>
													<button id="buttonViewModal" type="button" class="btn btn-primary" data-toggle="modal" data-id="{{ asset($skpi->file_skpi) }}" data-target="#viewModal">
													View File
													</button>
													@if(is_null($skpi->status) || $skpi->status == '0')
                                                        <button data-id="{{$skpi->id}}" data-status="{{(is_null($skpi->status) ? 0 : $skpi->status)}}" class="btn btn-sm btn-success btn-approval"><span>Approve</span> &nbsp;<img width="24" class="spiner hidden" src="{{asset("spiner.svg")}}" /></button>
                                                    @else
                                                        <button data-id="{{$skpi->id}}" data-status="{{(is_null($skpi->status) ? 0 : $skpi->status)}}" class="btn btn-sm btn-warning btn-approval"><span>Disapprove</span> &nbsp;<img width="24" class="spiner hidden" src="{{asset("spiner.svg")}}" /></button>
                                                    @endif
												</td>



												</tr>
												@endforeach
										</tbody>
										<tfoot>
													<td></td>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>

										</tfoot>
									</table>
								</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	<script type="text/javascript">
		$(document).ready(function() {
	    // Setup - add a text input to each footer cell
    	$('.data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

		});

		  var table = $('.data').DataTable( {
		  "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    	} );

		 $(".data tfoot input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    	});
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


<!-- Button View Modal untuk vie files gambar -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body-view-file"></div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
</div>

<script>
		$(document).on("click", "#buttonViewModal", function(){
		var skpiId = $(this).data('id');
		var bodyElement = $('.modal-body-view-file');
		bodyElement.html('');
		var domImage = `<img src="${skpiId}" style="width:80%" />`

		bodyElement.append(domImage)
	})
</script>
@stop
