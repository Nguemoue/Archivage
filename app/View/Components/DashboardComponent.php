<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardComponent extends Component
{

    public $titre;
    public $description;
    public $chemin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titre,$description,$chemin)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->chemin = $chemin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-component');
    }
}
