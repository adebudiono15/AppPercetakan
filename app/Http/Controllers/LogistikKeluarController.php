<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Logistik;
use App\Models\LogistikKeluar;
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
            $kode = $request->kode;
            $customer = $request->customer;
            // id logistik
            $logistik = $request->logistikkeluar;
            $idlogistik = Logistik::find($logistik);
            //    stok logistik
            $stoklogistik = $idlogistik->stok;
            // Minta stok
            $qtysem = $request->qty;
            $qty = str_replace([".", "Rp", " "], '', $qtysem);
            // update stok
            $updatestok = $stoklogistik - $qty;
            Logistik::where('id', $idlogistik->id)->update([
                'stok' => $updatestok
            ]);
            LogistikKeluar::insert([
                'kode' => $kode,
                'customer_id' => $customer,
                'nama_id' => $idlogistik->id,
                'qty' => $qty,
                'tanggal' => Carbon::now()
            ]);
            Session::flash('success');
            return redirect()->back();
       
    }

    public function delete($id)
    {
        DB::table('logistik_keluar')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
