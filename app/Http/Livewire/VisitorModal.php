<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use Illuminate\Support\Str;



class VisitorModal extends Component
{
    public function render()
    {
        return view('livewire.visitor-modal', [
            'all_persons' => Person::all()
        ]);
    }
}
