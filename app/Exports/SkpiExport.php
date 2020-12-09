<?php

namespace App\Exports;

use App\Skpi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SkpiExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Skpi::with("user.user", "approvedBy", "user.user.prodi");
    }

    public function map($row): array{
        $fileSkpi = explode("/", $row->file_skpi);
        return [
            $row->user->user->nim,
            $row->user->user->nama,
            $row->user->user->prodi->nama_prodi,
            $row->jenis_dokumen,
            $row->tanggal_dokumen,
            $row->tahun,
            $row->judul_sertifikat,
            $row->penyelenggara,
            end($fileSkpi),
            (((int)$row->status) == 1 ? "Sudah Approved" : "Belum Approved"),
            $row->approvedBy->name,
        ];
    }

    public function headings(): array
    {
        return [
            "Nim",
            "Nama",
            "Prodi",
            "Jenis Dokumen",
            "Tanggal Dokumen",
            "Tahun",
            "Judul Sertifikat",
            "Penyelenggara",
            "File SKPI",
            "Status",
            "Approved By"
        ];
    }

    // public function prepareRows($rows): array{
    //     return array_map(function($row){
    //         $row->
    //     }, $rows);
    // }
}
