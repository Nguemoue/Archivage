<?php

namespace App\View\Components\Model;

use Illuminate\Contracts\View\View;
use Illuminate\Queue\SerializesModels;
use Illuminate\View\Component;

class PurchaseOrdersTab extends Component
{
    use SerializesModels;
    public  $purchases;
    public function __construct($purchases,$name)
    {
        dd($this->purchases,$name);
    }

    public function render(): View
    {

        return view('components.model.purchase-orders-tab');
    }
}
