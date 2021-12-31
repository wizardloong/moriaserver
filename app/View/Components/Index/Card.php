<?php

namespace App\View\Components\Index;

use Illuminate\View\Component;

class Card extends Component
{
    public string $logo;
    public string $url;
    public string $name;
    public string $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $logo, string $url, string $name, string $description)
    {
        $this->logo = $logo;
        $this->url = $url;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.card');
    }
}
