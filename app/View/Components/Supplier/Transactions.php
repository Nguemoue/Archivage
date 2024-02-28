<?php

namespace App\View\Components\Supplier;

use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Transactions extends Component
{
    Public Supplier $supplier;
    public mixed $transactions;
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->transactions = $supplier->loadMissing("supplierTransactions")->supplierTransactions->take(3);
    }

    public function render(): View
    {
        return view('components.supplier.transactions');
    }
}
