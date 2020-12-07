<?php

namespace App\DataTables;

use App\Skpi;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SkpiDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn("nim", function ($skpi) {
                return $skpi->user->user->nim;
            })
            ->addColumn("nama", function ($skpi) {
                return $skpi->user->user->nama;
            })
            ->addColumn("prodi", function ($skpi) {
                return $skpi->user->user->prodi->nama_prodi;
            })
            ->addColumn("aksi", function ($skpi) {
                $html = '<a href="' . route("skpi.edit", $skpi->id) . '" class="btn btn-sm btn-warning col-md-12">Edit</a>
                <a href="' . route("skpi.destroy", $skpi->id) . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Jika data ini dihapus maka dapat menghilangkan seluruh kegiatan didalamnya, Apakah anda yakin ingin menghapus data ini??\')">Delete</a>';
                return $html;
            })
            ->addColumn("approvedBy", function ($skpi) {
                return (is_null($skpi->approvedby) ? "-" : $skpi->approvedBy->name);
            })
            ->addColumn("status", function ($skpi) {
                return '<div class="p-1 alert alert-' . ($skpi->status == 0 ? "warning" : "success") . '">' . ($skpi->status == 0 ? "Belum diapproved" : "Sudah diapproved") . "</div>";
            })
            ->addColumn("file_skpi", function ($skpi) {
                $html = '
                <div>
                    <button id="buttonViewModal" type="button" class="btn btn-primary col-md-12" data-toggle="modal" data-id="' . $skpi->file_skpi . '" data-target="#viewModal">
                        View file
                    </button>
                    <form method="post" action="' . route("file.download", ["file" => $skpi->file_skpi]) . '">'
                    . csrf_field()
                    . '<input class="btn btn-default" type="submit" value="Download Sertifikat" />
                    </form>
                </div>';
                return $html;
            })
            ->addColumn("tanggal_dokumen", function ($skpi) {
                Carbon::setLocale("id");
                return Carbon::parse($skpi->tanggal_dokumen)->locale("id")->isoFormat("D MMMM YYYY");
            })
            ->addColumn("prodi", function ($skpi) {
                return $skpi->user->user->prodi->nama_prodi;
            })
            ->rawColumns(["status", "aksi", "file_skpi"]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Skpi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Skpi $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('skpi-table')
            ->columns($this->getColumns())
            ->parameters([
                "buttons" => ["print", "excel"],
                "scrollX" => "true"
            ])
            ->minifiedAjax()
            ->dom('Bflrtip')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('nim'),
            Column::make('nama'),
            Column::make('prodi'),
            Column::make('jenis_dokumen'),
            Column::make('tanggal_dokumen'),
            Column::make('tahun'),
            Column::make('judul_sertifikat'),
            Column::make('penyelenggara'),
            Column::make('file_skpi'),
            Column::make('aksi'),
            Column::make('status'),
            Column::make('approvedBy')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Skpi_' . date('YmdHis');
    }
}
