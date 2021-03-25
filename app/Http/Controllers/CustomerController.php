<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::latest()->get();
        $firstInvoiceID = Customer::count();
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%05d", $secondInvoiceID);
        $kode_uniq = "CDP$kode";
        return view('admin.master.customer.index', compact('customer', 'kode_uniq'));
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->kode = $request->kode_customer;
        $customer->nama = $request->nama_customer;
        $customer->alamat = $request->alamat;
        $customer->telepon = $request->telepon;
        $customer->email = $request->email;
        $customer->contact_person = $request->contact_person;
        //   dd($customer);
        $customer->save();
        Session::flash('success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.master.customer.edit', compact('customer'));
    }

    public function detail($id)
    {
        $customer = Customer::find($id);
        return view('admin.master.customer.detail', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        Customer::where('id', $id)->update([
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
        DB::table('customer')->where('id', $id)->delete();
        Session::flash('delete');
        return redirect()->back();
    }
}
