<?php

namespace App\Http\Controllers;

use App\Models\Kategori as Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();
        $firstInvoiceID = Kategori::count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $nomor = sprintf("%05d", $secondInvoiceID);
        $kode = "KDP$nomor";
        return view('admin.master.kategori.index', compact('kategori', 'kode'));
    }

    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;
        $kategori->save();
        Session::flash('success');
        return redirect()->back();
    }
    public function edit(Request $request, $id)
    {
        $kategori = Kategori::Find($id);
        return view('admin.master.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        Kategori::where('id', $id)->update([
            'nama' => $request->nama,
        ]);
        Session::flash('update');
    }

    public function delete($id)
    {
        DB::table('kategori')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
