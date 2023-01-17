<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Field extends Component
{
    public $item;
    public $name = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $name  = null)
    {
        $this->item = $item;
        if($name != null){
            $this->name = $name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.field');
    }
}
