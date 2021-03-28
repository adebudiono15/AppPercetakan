<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Logistik;
use App\Models\LogistikKeluar;
use App\Models\LogistikKeluarLine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LogistikKeluarController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        $logistik = Logistik::get();
        $logistikkeluar = LogistikKeluar::latest()->get();
        $firstInvoiceID = LogistikKeluar::count();
        $secondInvoiceID = $firstInvoiceID + 1;
        $nomor = sprintf("%05d", $secondInvoiceID);
        $kode = "LK$nomor";
        return view('admin.master.logistik-keluar.index', compact('logistikkeluar', 'logistik', 'kode', 'customer'));
    }

    public function store(Request $request)
    {
        try {
            $nama_id = $request->nama;
            $customer_id = $request->customer;
            $qty = $request->qty;
            $kode =  $request->kode;
            $harga =  $request->harga_jual;
            $stok =  $request->stok;
            \DB::transaction(function () use ($nama_id, $customer_id, $qty, $kode, $harga, $stok) {
                $header = LogistikKeluar::insertGetId([
                    'kode' => $kode,
                    'customer_id' => $customer_id,
                    'tanggal' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                foreach ($nama_id as $e => $nm) {
                    LogistikKeluarLine::insert([
                        'nama_id' => $nm,
                        'log_keluar_id' => $header,
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

                $sum_total = LogistikKeluarLine::where('log_keluar_id', $header)->sum('grand_total');
                LogistikKeluar::where('id', $header)->update([
                    'grand_total' => $sum_total,
                ]);
            });
            \Session()->flash('success', 'Berhasil Melakukan Transaksi');
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('logistik_keluar')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }

    public function get_logistik_keluar($id)
    {
        $item = Logistik::where('id', $id)->first();

        return response()->json([
            'data' => $item
        ]);
    }

    public function detaillogkeluar($id)
    {
        $logistikkeluar = LogistikKeluar::find($id);
        $kode = $logistikkeluar->kode;
        return view('admin.master.logistik-keluar.detail', compact('logistikkeluar', 'kode'));
    }
}
