<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingLayout extends Component
{
    public $title;
    public $description;
    public $keywords;
    public $pageUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $description = null, $keywords = null, $pageUrl = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->pageUrl = $pageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.landing');
    }
}
