<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class detailsDevis extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $question, $reponse;

    public function __construct( $question, $reponse)
    {
        $this->question = $question;
        $this->reponse = $reponse;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.details-devis');
    }
}
