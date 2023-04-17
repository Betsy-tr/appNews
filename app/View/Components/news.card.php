<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class news.card extends Component
{
    /**
     * Create a new component instance.
     */

    public $itemNews ;
    public function __construct($itemNews)
    {
        $this->itemNews=$itemNews ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news.card');
    }
}