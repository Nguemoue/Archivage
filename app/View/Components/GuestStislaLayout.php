<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestStislaLayout extends Component
{
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Support\Htmlable|string|\Closure|\Illuminate\Contracts\Foundation\Application
	 {
			return  view("layouts.guest_stistla");
    }
}
