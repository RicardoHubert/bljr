@extends('layout.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class="main">
    <div class="main-control">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h5 class="panel-title" id="exampleModalLabel">Input Data Kegiatan</h5>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#kegiatan_anggota_modal"><i class="lnr lnr-plus-circle"></i>Create New</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if($message ?? '')
                                <span class="alert alert-success">{{$message}}</span>
                            @endif
                            <div class="table-responsive">
                                 <table class="table table-hover data" id="tableexcel">
                                     <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Nim</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Prodi</th>
                                                <th>Jenis Dokumen</th>
                                                <th>Tanggal Dokumen</th>
                                                <th>Tahun Dokumen</th>
                                                <th>Judul Sertifikat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="modal fade" id="kegiatan_anggota_modal" role="dialog" aria-labelledby="kegiatan_anggota_modal_label" aria-hidden="true">
                            <form enctype="multipart/form-data" action="{{route('kegiatan_anggota.post')}}" method="POST">
                                @csrf
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Ormawa</label>
                                                <select class="form-control" id="ormawa_id" name="ormawa_id">
                                                    <option value="">"------Pilih-------"</option>
                                                    @foreach($ormawas as $ormawa)
                                                    <option value="{{$ormawa->id}}" {{ request('ormawa_id') == $ormawa->id ? 'selected' : null }}>{{$ormawa->nama_ormawa}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Kegiatan</label>
                                                <select class="form-control select2" ajax="kegiatan" id="kegiatan_id" name="kegiatan_id" style="width:100%" />

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Mahasiswa</label>
                                                <select class="form-control select2" ajax="kalbiser" id="kalbiser_id" name="kalbiser_id" style="width:100%" />

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenis Dokumen</label>
                                                <select class="form-control" id="jenis_dokumen" name="jenis_dokumen">
                                                    <option value="">"------Pilih-------"</option>
                                                    <option value="jkk">JKK</option>
                                                    <option value="seminar">Seminar</option>
                                                    <option value="piagam">Piagam</option>
                                                    <option value="kompetisi eksternal">Kompetisi Eksternal</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tanggal Dokumen</label>
                                                <input type="text" name="tanggal_dokumen" class="form-control datepicker date" aria-describedby="emailHelp" placeholder="dd/mm/yyyy" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tahun Dokumen</label>
                                                <input type="text" name="tahun" class="form-control datepicker year" aria-describedby="emailHelp" placeholder="Tahun Dokumen" />
                                                Sesuai dengan tanggal dokumen
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kegiatanAnggota').DataTable();

        $(".datepicker.date").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $(".datepicker.year").datepicker({dateFormat: "yy"});

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
                        type: this[0].getAttribute("ajax"),
                        q: params.term
                    }
                },
                processResults: function (data) {
                    console.log(this.$element[0].id);
                    if(this.$element[0].id == "kalbiser_id"){
                        return processResults.users(data);
                    }else{
                        return processResults.kegiatans(data);
                    }
                }
            },
            minimumInputLength: 1
        });

        const processResults = {
            users: (data) => {
                return {
                    results: data.map(u => {
                        return {id: u.id, text: u.nama + " - " + u.nim};
                    })
                };
            },
            kegiatans: (data) => {
                return {
                    results: data.map(k => {
                        return {id: k.id, text: k.nama_kegiatan};
                    })
                };
            }
        }
    });
</script>
@endsection

