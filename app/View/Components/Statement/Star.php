<?php

namespace App\View\Components\Statement;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Self_;

class Star extends Component
{
    public static int $count = 0;
    public static array $items = [];
    public int $number;
    public string $notice = '';
    public function __construct($notice= 'notice')
    {
        $this->number = self::$count+=1;
        self::$items[] = $this;
        $this->notice = $notice;

    }

    public function render(): View
    {
        $html = $this->getHtml();
        return view('components.statement.star',[
            'html' => $html
        ]);
    }

    public function getHtml(): string
    {
        return <<<HTML
<sup>
    <span class="text-danger">($this->number)</span>
</sup>

HTML;

    }
}
