<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // SELECT transactions.no_transaction, COUNT(DISTINCT transaction_details.item)as total_item,SUM(transaction_details.quantity)as total_qyi FROM transaction_details LEFT JOIN transactions ON transaction_details.transaction_id=transactions.id GROUP by transactions.no_transaction;
    public function index()
    {
        $data = TransactionDetail::leftJoin('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')->select(TransactionDetail::raw('transactions.id,transactions.no_transaction, COUNT(DISTINCT transaction_details.item)as total_item,SUM(transaction_details.quantity)as total_qyi'))->groupBy('transactions.no_transaction')->get();
        // dd($data);
        return view('project', ['title' => 'Mini Project', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate();
        $data = [
            'no_transaction' => $request->input('no_trans'),
            'transaction_date' => $request->input('date_trans')
        ];
        $create = Transactions::create($data);
        $lastInsertID = $create->id;

        $data_detail = [
            'transaction_id' => $lastInsertID,
            'item' => $request->input('item_trans'),
            'quantity' => $request->input('qyi_trans'),
        ];
        TransactionDetail::create($data_detail);
        return redirect()->route('project')->with('success', 'Berhasil menambahkan Data');
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
        $data = Transactions::find($id);
        // return $data;
        // return view('update',compact('data'));
        return view('update', ['title' => 'Update','id'=> $id, "data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'no_transaction' => $request->input('no_trans'),
            'transaction_date' => $request->input('date_trans')
        ];
        // dd($id);
        Transactions::findOrFail($id)->update($data);
        return redirect()->route('project')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transactions::where('id', $id)->delete();
        TransactionDetail::where('transaction_id', $id)->delete();
        return redirect()->route('project')->with('success', 'Berhasil menghapus Data');
    }
}
