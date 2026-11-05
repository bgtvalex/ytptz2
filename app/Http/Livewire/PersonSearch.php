<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use Illuminate\Support\Str;

class PersonSearch extends Component
{
    public $searchTerm;
    public $persons;
    public $excludedIds = [];

    
    public function render()
    {
        $persons = Person::query()
            ->when($this->searchTerm, fn($q) => $q->where('fio', 'like', "%{$this->searchTerm}%"))
            ->when(!empty($this->excludedIds), fn($q) => $q->whereNotIn('id', $this->excludedIds))
            ->limit(10)
            ->get();

        return view('livewire.visitor-add', compact('persons'));
    }
}
