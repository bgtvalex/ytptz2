<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use Illuminate\Support\Str;



class VisitorAdd extends Component
{
    public $searchTerm;
    public $persons;


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        if ($this->searchTerm == "" or Str::length($this->searchTerm) < 2)
            $this->persons = [];
        else
            $this->persons = Person::where('fio', 'like', $searchTerm)->get();
        return view('livewire.visitor-add');
    }
}
