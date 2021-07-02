<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Logistik;
use App\Models\LogistikMasuk;
use App\Models\LogistikMasukLine;
use App\Models\PoLine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LogistikMasukController extends Controller
{
    public function index()
    {
        $supplier = Supplier::get();
        $logistik = Logistik::get();
        $logistikmasuk = LogistikMasuk::latest()->get();
        $firstInvoiceID = LogistikMasuk::count();
        $secondInvoiceID = $firstInvoiceID + 1;
        $nomor = sprintf("%05d", $secondInvoiceID);
        $kode = "LM$nomor";
        return view('admin.master.logistik-masuk.index', compact('logistikmasuk', 'logistik', 'kode', 'supplier'));
    }

    public function store(Request $request)
    {
        try {
            $nama_id = $request->nama;
            $supplier_id = $request->supplier;
            $qty = $request->qty;
            $kode =  $request->kode;
            $harga =  $request->harga_beli;
            $stok =  $request->stok;
            \DB::transaction(function () use ($nama_id, $supplier_id, $qty, $kode, $harga, $stok) {
                $header = LogistikMasuk::insertGetId([
                    'kode' => $kode,
                    'supplier_id' => $supplier_id,
                    'tanggal' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                foreach ($nama_id as $e => $nm) {
                    LogistikMasukLine::insert([
                        'nama_id' => $nm,
                        'log_masuk_id' => $header,
                        'qty' => $qty[$e],
                        'harga' => $harga[$e],
                        'created_at' =>  Carbon::now(),
                        'updated_at' =>  Carbon::now(),
                        'grand_total' => (int)$qty[$e] * (int) $harga[$e]
                    ]);

                    // update stok
                    $stoknow = $stok;
                    $updatestok = $stoknow [$e] + $qty[$e];
                    Logistik::where('id', $nama_id[$e])->update([
                        'stok' => $updatestok
                    ]);
                }

                $sum_total = LogistikMasukLine::where('log_masuk_id', $header)->sum('grand_total');
                LogistikMasuk::where('id', $header)->update([
                    'grand_total' => $sum_total,
                ]);
            });
            \Session()->flash('success', 'Berhasil Melakukan Transaksi');
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }
    public function get_logistik_masuk($id)
    {
        $item = Logistik::where('id', $id)->first();
        return response()->json([
            'data' => $item
        ]);
    }

    public function delete($id)
    {
        DB::table('logistik_masuk')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }

    public function detaillogmasuk($id)
    {
        $logistik_masuk = LogistikMasuk::find($id);
        $kode = $logistik_masuk->kode;
        return view('admin.master.logistik-masuk.detail', compact('logistik_masuk', 'kode'));
    }
}
