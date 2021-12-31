<?php

namespace App\View\Components\Index;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Cards extends Component
{
    public Collection $cards;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cards =  collect([
            [
                'name' => 'Группа ВК',
                'logo' => url('images/socials/VK32x32.png'),
                'description' => 'dklsjfd;ljfdslkjfdslkjfdlskfj;asdf',
                'url' => 'https://vk.com/qarafun'
            ],
            [
                'name' => 'Дискорд',
                'logo' => url('images/socials/Discord32.png'),
                'description' => 'Дижкорд канал чтобы говорить и писать',
                'url' => 'https://discord.com/invite/XmU8cUAm'
            ]
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.cards');
    }
}
