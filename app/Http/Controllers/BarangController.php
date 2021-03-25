<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class BarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        $barang = Barang::latest()->get();
        $firstInvoiceID = Barang::count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $nomor = sprintf("%05d", $secondInvoiceID);
        $kode = "BDP$nomor";
        return view('admin.master.barang.index', compact('barang', 'kode','kategori'));
    }

    public function store(Request $request)
    {
        $insertbarang = new Barang;
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
        DB::table('barang')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $barang = Barang::Find($id);
        $kategori = Kategori::get();
        return view('admin.master.barang.edit', compact('barang','kategori'));
    }

    public function update(Request $request, $id)
    {
        barang::where('id', $id)->update([
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
