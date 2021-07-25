<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\TransactionDetail;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sell_transactions = TransactionDetail::with(['transaction.user','product.galleries'])
                                        ->whereHas('product', function($product){
                                            $product->where('users_id',Auth::user()->id);
                                        })
                                        ->orderBy('created_at','desc')
                                        ->get();

        $buy_transactions = TransactionDetail::with(['transaction.user','product.galleries'])
                                        ->whereHas('transaction', function($transaction){
                                            $transaction->where('users_id',Auth::user()->id);
                                        })
                                        ->orderBy('created_at','desc')
                                        ->get();

        return view('pages.dashboard-transactions',[
            'sell_transactions' => $sell_transactions,
            'buy_transactions' => $buy_transactions,
        ]);
    }

    public function detail(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                                    ->findOrFail($id);

        return view('pages.dashboard-transactions-detail',[
            'transaction' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-transaction-detail', $id);
    }
}
