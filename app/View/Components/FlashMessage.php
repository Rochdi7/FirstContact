<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashMessage extends Component
{
    public $status;
    public $message;

    /**
     * Crée une nouvelle instance du composant.
     *
     * @return void
     */
    public function __construct()
    {
        $this->status = session('status');
        $this->message = session('message');
    }

    /**
     * Récupère le contenu de la vue / composant.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flash-message');
    }
}
