<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anket;

class AnketController extends Controller
{
    public function index()
    {
        $anketler = Anket::all();
        return view('anket.index', compact('anketler'));
    }

    public function create()
    {
        return view('anket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'soru' => 'required'
        ]);

        Anket::create($request->all());

        return redirect()->route('anket.index')
                         ->with('success', 'Anket oluşturuldu!');
    }

    public function edit(Anket $anket)
    {
        return view('anket.edit', compact('anket'));
    }

    public function update(Request $request, Anket $anket)
    {
        $request->validate([
            'soru' => 'required'
        ]);

        $anket->update($request->all());

        return redirect()->route('anket.index')
                         ->with('success', 'Anket güncellendi!');
    }

    public function destroy(Anket $anket)
    {
        $anket->delete();

        return redirect()->route('anket.index')
                         ->with('success', 'Anket silindi!');
    }
}
