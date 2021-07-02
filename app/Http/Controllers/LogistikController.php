<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Logistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LogistikController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        $logistik = Logistik::latest()->get();
        $firstInvoiceID = Logistik::count();
        $secondInvoiceID = $firstInvoiceID + 1;
        $nomor = sprintf("%05d", $secondInvoiceID);
        $kode = "LDP$nomor";
        return view('admin.master.logistik.index', compact('logistik', 'kode','kategori'));
    }

    public function store(Request $request)
    {
        $insertbarang = new Logistik;
        $insertbarang->kode = $request->kode;
        $insertbarang->nama = $request->nama;
        $insertbarang->kategori_id = $request->kategori;
        $hargabelisementara = $request->harga_beli;
        $insertbarang->harga_beli = str_replace([".", "Rp", " "], '', $hargabelisementara);
        $hargajualsementara = $request->harga_jual;
        $insertbarang->harga_jual = str_replace([".", "Rp", " "], '', $hargajualsementara);
        $stocksementara = $request->stok;
        $insertbarang->stok = str_replace([".", "Rp", " "], '', $stocksementara);
        $insertbarang->save();
        Session::flash('success');
        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('logistik')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $logistik = Logistik::Find($id);
        $kategori = Kategori::get();

        return view('admin.master.logistik.edit', compact('logistik','kategori'));
    }

    public function update(Request $request, $id)
    {
        Logistik::where('id', $id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
        Session::flash('update');
        // dd($request->all());
    }
}
