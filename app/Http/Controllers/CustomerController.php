<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Customers::orderBY('id', 'DESC')->get();
        $title = 'Data Customer';
        return view('customer.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Customer';
        return view('customer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customers::create($request->all());
        return redirect()->to('customer')->with('success', 'Data level berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit customer';
        $customer = Customers::find($id); //blank
        // $level = Levels::findOrFail($id); //404
        // $level = Levels::where('id', $id)->first();
        return view('customer.edit', compact('customer', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customers::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->adress = $request->adress;
        $customer->save();
        return redirect()->to('customer')->with('success', 'Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cutomer = Customers::find($id);
        $cutomer->delete();
        return redirect()->to('customer')->with('success', 'Data Berhasil di Hapus');
    }
}
