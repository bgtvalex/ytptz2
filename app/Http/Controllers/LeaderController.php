<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Pol;
use App\Models\Leader;

class LeaderController extends Controller
{
    public function leaders_all(Request $req)
    {
        $all_leaders = Person::all()
        ->where('is_leader', "=", 1)
        ->sortBy('fio');
        return view('leaders_all', ['data' => $all_leaders]);
    }
}
