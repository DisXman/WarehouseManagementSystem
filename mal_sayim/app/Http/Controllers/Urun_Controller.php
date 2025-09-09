<?php

namespace App\Http\Controllers;

use App\Models\Depo;
use App\Models\Urun;
use App\Models\Istif;
use Illuminate\Http\Request;

class Urun_Controller extends Controller
{

    public function ara(Request $request)
    {
        $aranan_urun = $request->name;

        $urunler = collect();
        if($aranan_urun){
            $urunler = Urun::where('name', 'like', "%{$aranan_urun}%")->get();
        }

        return view('dashboard',compact('urunler','aranan_urun'));
    }

    public function index()
    {
        $depolar = Depo::all();
        $urunler = Urun::all();
        $istif = Istif::all();

        return view('depo-urun.sec', compact('urunler','depolar','istif'));
    }



    public function store(Request $request) 
    {

        $request->validate([
            'name'    => 'required|string|max:255',
            'count'   => 'required|integer|min:1',
            'istif_id' => 'required|exists:istifs,id',
        ]);

        Urun::create([
            'name'    => $request->name,
            'count'   => $request->count,
            'istif_id' => $request->istif_id,
        ]);

        // return redirect()->route('urunler.index')->with('success', 'Ürün başarıyla eklendi!');
        return redirect()->route('dashboard')->with('success', 'Ürün başarıyla eklendi!');

        
    }

    public function destroy(Urun $urun)
    {
        $urun->delete();
        return redirect()->route('urunler.index')->with('success', 'urun silinid');
    }
}
