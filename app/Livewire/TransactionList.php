<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class TransactionList extends Component
{
    public $perPage = 5;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function reverseTransaction($paystackTransactionID)
    {
        // Process payStack refund
        dd($paystackTransactionID);
    }

    public function render()
    {
        $transactions = Transaction::paginate(15);
        // dd($transactions);
        return view('livewire.transaction-list', compact('transactions'));
    }
}
