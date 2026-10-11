<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Http\Requests\NewVersionRequest;
use App\Models\Tip_vstrechi;
use Illuminate\Support\Facades\DB;

class TypeVisitController extends Controller
{
    public function index() {
        $types = Tip_vstrechi::all();
        return view('type_visits.index', compact('types'));
    }

    public function create() {
        $types = Tip_vstrechi::all();
        return view('type_visits.create', compact('types'));
    }

    public function store() {
        $data = request()->validate([
            'tip' => 'string'
        ]);
        Tip_vstrechi::create($data);
        return redirect()->route('type-visits.index');
    }

    public function show(Tip_vstrechi $type) {
        return view('type_visits.show', compact('type'));
    }

    public function edit(Tip_vstrechi $type) {
        return view('type_visits.edit', compact('type'));
    }

    public function update(Tip_vstrechi $type) {
        $data = request()->validate([
            'tip' => 'string'
        ]);
        $type->update($data);
        return view('type_visits.show', compact('type'));
    }
}
