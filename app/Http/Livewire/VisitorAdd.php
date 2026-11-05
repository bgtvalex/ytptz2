<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use Illuminate\Support\Str;



class VisitorAdd extends Component
{
    public $searchTerm = '';
    public $excludedIds = [];


    public function render()
    {
        
        $persons = [];

        if (Str::length($this->searchTerm)> 1)
            //$this->persons = Person::where('fio', 'like', $searchTerm)->get()//
            $persons = Person::query()
                ->when($this->searchTerm, fn($q) => $q->where('fio', 'like', "%{$this->searchTerm}%"))
                ->when(!empty($this->excludedIds), fn($q) => $q->whereNotIn('id', $this->excludedIds))
                ->limit(20)
                ->get();

        return view('livewire.visitor-add', ['persons' => $persons]);
    }
}