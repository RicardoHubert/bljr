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
        return Skpi::with("user.kalbiser", "approvedBy", "user.kalbiser.prodi");
    }

    public function map($row): array{
        $fileSkpi = explode("/", $row->file_skpi);
        return [
            $row->user->kalbiser->nim ?? "-",
            $row->user->kalbiser->nama ?? "-",
            $row->user->kalbiser->prodi->nama_prodi ?? "-",
            $row->jenis_dokumen,
            $row->tanggal_dokumen,
            $row->tahun,
            $row->judul_sertifikat,
            $row->penyelenggara,
            end($fileSkpi),
            (((int)$row->status) == 1 ? "Sudah Approved" : "Belum Approved"),
            (!is_null($row->approvedBy) ? $row->approvedBy->name : "-"),
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
