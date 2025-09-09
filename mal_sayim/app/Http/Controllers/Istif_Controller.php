<?php

namespace App\Http\Controllers;

use App\Models\Istif;
use App\Models\Depo;
use Illuminate\Http\Request;

class Istif_Controller extends Controller
{
    public function index(){
        $istif = Istif::all();
        $depolar = Depo::all();


        return view('depo-urun.depo_urun_ekle', compact('istif','depolar'));

    }

    public function store(Request $request){
        $request->validate([
            'depo_id' => 'required|integer|min:1',
            'istif_name' => 'required|string|max:255',
        ]);
        Istif::create([
            'depo_id' => $request->depo_id,
            'istif_name' => $request->istif_name,
        ]);
        // return redirect()->route('istif.index')->with('success', 'istif eklendi');
        return redirect()->route('dashboard')->with('success', 'istif eklendi');

    }

    public function destroy(Istif $istif){
        $istif->delete();
        return redirect()->route('istif.index')->with('success', 'istif silindi');
        
    }
}
