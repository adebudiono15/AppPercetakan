<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::latest()->get();
        $firstInvoiceID = Supplier::count();
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%05d", $secondInvoiceID);
        $kode_uniq = "SDP$kode";
        return view('admin.master.supplier.index', compact('supplier', 'kode_uniq'));
    }

    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->kode = $request->kode_supplier;
        $supplier->nama = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->email = $request->email;
        $supplier->contact_person = $request->contact_person;
        //   dd($supplier);
        $supplier->save();
        Session::flash('success');
        return redirect()->back();
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.master.supplier.edit', compact('supplier'));
    }

    public function detail($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.master.supplier.detail', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        Supplier::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'contact_person' => $request->contact_person,
        ]);
        Session::flash('update');
        // dd($request->all());
    }

    public function delete($id)
    {
        DB::table('supplier')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
