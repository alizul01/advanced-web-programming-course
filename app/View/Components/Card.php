<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $title, $slug, $image, $content, $tags, $route;
    public function __construct($title, $slug, $image, $content, $tags, $route)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->image = $image;
        $this->content = $content;
        $this->tags = $tags;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
