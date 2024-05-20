<?php

namespace App\Exports;

use App\Models\Penjual;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PenjualExport implements FromView, WithEvents
{
    public function view(): View
    {
        $search = request('search');
        if(isset($search)){
            $penjual = Penjual::where('TotalHarga', 'LIKE', '%'.$search.'%')
            ->orWhere('TanggalPenjualan', 'LIKE', '%'.$search.'%')
            ->get();
            if(count($penjual) == 0){
                $pelanggan = Pelanggan::where('NamaPelanggan', 'LIKE', '%'.$user.'%')->first('id');
                if($pelanggan){
                    $penjual = Penjual::where('PelangganID', $pelanggan['id'])->get();
                }
            }
        }else{
            $penjual = Penjual::all();
        }
        $p = Pelanggan::all();

        return view('excel.transaction', ['penjualans' => $penjual, 'pelanggan' => $p]);
        }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ]
                ]);
            },
        ];
    }
}
