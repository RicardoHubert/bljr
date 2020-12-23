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
							<form action="{{action('SkpiController@update', $data_skpi->id)}}" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}


							<div class="form-group">
								<label for="exampleInputEmail1">Nama Mahasiswa</label>
								<select class="form-control select2" id="exampleFormControlSelect1" name="user_id" required>
									<option value="{{$kalbiser->user_id}}">{{$kalbiser->nama}} - {{$kalbiser->nim}}</option>
								</select>
							</div>


						 <x-form.wrapper title="Jenis Dokumen" required="true">
							    <select class="form-control" id="exampleFormControlSelect1" name="jenis_dokumen" required>
							      <option value="">"------Pilih-------"</option>
							      <option value="SK" {{ $data_skpi->jenis_dokumen == 'SK' ? 'selected' : null }}>Surat Keputusan (SK)</option>
							      <option value="SERTIFIKAT" {{ $data_skpi->jenis_dokumen == 'SERTIFIKAT' ? 'selected' : null }}>Sertifikat</option>
							      <option value="STU" {{ $data_skpi->jenis_dokumen == 'STU' ? 'selected' : null }}>Surat Tugas (STU)</option>
							      <option value="PIAGAM" {{ $data_skpi->jenis_dokumen == 'PIAGAM' ? 'selected' : null }}>Piagam</option>
							    </select>
						</x-form.wrapper>

						<x-form.wrapper title="Tanggal Dokumen" required="true">
								<input readonly type="text" name="tanggal_dokumen" class="form-control datepicker date" aria-describedby="emailHelp" placeholder="dd/mm/yyyy" value="{{$data_skpi->tanggal_dokumen}}" id="tanggaldokumen">
				      	</x-form.wrapper>

				      	<x-form.wrapper title="Tahun" required="true">
								<input readonly type="text" name="tahun" class="form-control" aria-describedby="emailHelp" placeholder="dd/mm/yyyy" value="{{$data_skpi->tahun}}">
				      	</x-form.wrapper>

				      	<x-form.wrapper title="Judul Sertifikat" required="true">
				      			<x-form.input name="judul_sertifikat" required placeholder="Judul Sertifikat" value="{{$data_skpi->judul_sertifikat}}" />
				      	</x-form.wrapper>


				      	<x-form.wrapper title="Penyelenggara" required="true">
				      			<x-form.input name="penyelenggara" required placeholder="Penyelenggara" value="{{$data_skpi->penyelenggara}}" />
				      	</x-form.wrapper>



					 <input type="hidden" name="status" value="0">
				      <div class="modal-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
<script>
		$(document).ready(function() {

		$(".datepicker.date").datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
              changeYear: true,
              onSelect: (dateText, inst) => {
                  console.log(inst);
              }
		});

		        //UNTUK SELECT 2
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select2').select2({
            ajax: {
                url: `{{route("ajax.datas")}}`,
                dataType: 'json',
                data: function(params){
                    return {
                        type: "kalbiser",
                        q: params.term
                    }
                },
                processResults: function (data) {
					return processResults.users(data);
                }
            },
            minimumInputLength: 1
        });

        const processResults = {
            users: (data) => {
                return {
                    results: data.map(u => {
                        return {id: u.user_id, text: u.nama + " - " + u.nim};
                    })
                };
            }
        }

		});
</script>
@stop
