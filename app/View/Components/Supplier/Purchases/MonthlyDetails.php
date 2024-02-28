<?php

namespace App\View\Components\Supplier\Purchases;

use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MonthlyDetails extends Component
{

    public Supplier $supplier;
    public float $currentAmount = 0;
    public string $supplierName='-';
    public string $terms = '-';
    public function __construct(string $username,Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->supplierName = $supplier->name;
        $sum = $supplier->invoices()->sum("total_amount");
        $this->currentAmount = $sum;
        $this->terms = $this->supplier->payment_terms_name;
    }

    public function render(): View
    {
        return view('components.supplier.purchases.monthly-details');
    }
}
