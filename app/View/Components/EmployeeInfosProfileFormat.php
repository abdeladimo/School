<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmployeeInfosProfileFormat extends Component
{
    public $salaire;
    public $date_embauche;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($salaire, $dateEmbauche)
    {
        $this->salaire = $salaire;
        $this->date_embauche = $dateEmbauche;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee-infos-profile-format');
    }
}
