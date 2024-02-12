<?php

namespace App\Livewire;

use App\Models\Refund;
use Livewire\Component;
use App\Models\Transaction;
use Myckhel\Paystack\Facades\Paystack;
use Myckhel\Paystack\Support\Refund as PaystackRefund;


class TransactionList extends Component
{
    public $perPage = 5;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $reversalReason;
    public function reverseTransaction($paystackTransactionID)
    {

        $transaction = Transaction::where('paystackTransactionID', $paystackTransactionID)->first();

        if (!$transaction) {
            app('flasher')->addError('Error', 'Transaction not found');
            return;
        }

        $result = $this->performRefund($transaction);

        if ($result['status'] === true) {
            $refund = new Refund([
                'transaction_id' => $transaction->id,
                'status' => $result['status'],
                'message' => $result['message'],
                'data' => $result['data'],
                'reversalReason' => $this->reversalReason ?? 'No reason provided', // Default value if not set
            ]);

            // Save the refund data to the database
            $refund->save();

            app('flasher')->addSuccess(ucwords("{$transaction->paystackTransactionID}'s transaction has been reversed successfully"), "Refund Successful");
        } else {
            app('flasher')->addError('Error', $result['message']);
        }
    }

    protected function performRefund(Transaction $transaction)
    {
        $params = [
            'transaction' => $transaction->paystackTransactionID,
            'amount' => $transaction->amount,
            'currency' => 'GHS',
        ];

        return PaystackRefund::create($params);
    }

    public function render()
    {
        $transactions = Transaction::where('paystackTransactionID', 'like', '%' . $this->search . '%')
            ->orWhere('amount', 'like', '%' . $this->search . '%')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->with('refund')
            ->paginate($this->perPage);
            return view('livewire.transaction-list', ['transactions' => $transactions]);
    }
}
