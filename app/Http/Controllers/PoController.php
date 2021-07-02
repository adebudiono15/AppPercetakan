<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Po;
use App\Models\PoLine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PoController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        $barang = Barang::get();
        $po = Po::latest()->get();
        $kode_satu = date('dmy');
        $firstInvoiceID = Po::whereDay('created_at', date('d'))->count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode_dua = sprintf("%02d", $secondInvoiceID);
        $kode = "PO$kode_satu$kode_dua";
        return view('admin.master.po.index', compact('customer', 'barang', 'kode', 'po'));
    }

    public function get_barang($id)
    {
        $item = Barang::where('id', $id)->first();

        return response()->json([
            'data' => $item
        ]);
    }

    public function store(Request $request)
    {
        try {
            $nama_id = $request->nama;
            $customer_id = $request->customer;
            $qty = $request->qty;
            $kode =  $request->kode;
            $harga =  $request->harga_jual;
            \DB::transaction(function () use ($nama_id, $customer_id,$qty,$kode,$harga) {
                $header = Po::insertGetId([
                    'kode' => $kode,
                    'customer_id' => $customer_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                foreach ($nama_id as $e => $nm) {
                    PoLine::insert([
                        'kode' => $kode,
                        'nama_id' => $nm,
                        'po_id' => $header,
                        'qty' => $qty[$e],
                        'harga' => $harga[$e],
                        'status' => 1,
                        'created_at' =>  Carbon::now(),
                        'updated_at' =>  Carbon::now(),
                        'grand_total' => (int)$qty[$e] * (int) $harga[$e]
                    ]);
                }
                $sum_total = PoLine::where('po_id', $header)->sum('grand_total');
                Po::where('id', $header)->update([
                    'grand_total' => $sum_total,
                ]);
            });
            \Session()->flash('success', 'Berhasil Melakukan Transaksi');
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function detailpo($id)
    {
        $po = Po::find($id);
        $kode = $po->kode;
        $satu = "Pra Cetak";
        $dua = "Cetak";
        $tiga = "Laminating";
        $empat = "Polly";
        $lima = "Pond";
        $enam = "Mesin Lem";
        $tujuh = "Kopek";
        $delapan = "SELESAI";
        return view('admin.master.po.detail', compact('po','kode','satu','dua','tiga','empat','lima','enam','tujuh','delapan'));
    }

    public function delete($id)
    {
        DB::table('po')->where('id', $id)->delete();
        DB::table('po_line')->where('po_id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
    public function status(){
        $poline = PoLine::get();

        return view('admin.master.po.status',compact('poline'));
    }

    public function update1($id){
        PoLine::where('id', $id)->update([
            'status' => 2
        ]);
    }
    public function update2($id){
        PoLine::where('id', $id)->update([
            'status' => 3
        ]);
    }
    public function update3($id){
        PoLine::where('id', $id)->update([
            'status' => 4
        ]);
    }
    public function update4($id){
        PoLine::where('id', $id)->update([
            'status' => 5
        ]);
    }
    public function update5($id){
        PoLine::where('id', $id)->update([
            'status' => 6
        ]);
    }
    public function update6($id){
        PoLine::where('id', $id)->update([
            'status' => 7
        ]);
    }
    public function update7($id){
        PoLine::where('id', $id)->update([
            'status' => 8
        ]);
    }
}
