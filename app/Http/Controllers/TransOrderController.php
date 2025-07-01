<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\TransDetails;
use App\Models\TransOrders;
use App\Models\TypeOfServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Transaksi Order";
        $datas = TransOrders::with('customer')->orderBy('id', 'desc')->get();
        return view('trans.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TR-01072025-001
        // $today = date('dmY');
        $today = carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count()+1;
        $runningNumber = str_pad($countDay, 3, '0',STR_PAD_LEFT); //001
        $title = "Tambah Transaksi";
        $orderCode = "TR-". $today . "-". $runningNumber;

        $customers =Customers::orderBy('id', 'desc')->get();
        $services =TypeOfServices::orderBy('id', 'desc')->get();

        return view('trans.create', compact('title', 'orderCode', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_end_date' => 'required'
        ]);
        $transOrder = TransOrders::create([
            'id_customer' => $request->id_customer,
            'order_code' => $request->order_code,
            'order_end_date'=> $request->order_end_date,
            'total'=> $request->grand_total
        ]);

        foreach ($request->id_product as $key => $idProduct) {
            $id_trans= $transOrder->id;
            TransDetails::create([
                'id_trans' =>$id_trans,
                'id_service'=> $idProduct,
                'qty' =>$request->qty[$key],
                'subtotal'=> $request->total[$key]
            ]);
        }

        return redirect()->route('trans.index')->with('status', 'Berhasil');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trans = TypeOfServices::find($id);
        $trans->delete();
        return redirect()->to('trans')->with('success', 'Data Berhasil di Hapus');
    }
}
