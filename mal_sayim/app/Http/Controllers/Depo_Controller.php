<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Depo;
use App\Models\Istif;
use App\Models\Urun;

class Depo_Controller extends Controller
{

    // public function sec()
    // {
    //     // $depolar = Depo::all();
    //     $depolar = Depo::with('istifler.urunler')->get();

    //     return view('depo-urun.sec', compact('depolar'));
    // }


 public function sec(Request $request)
    {
        // Tüm depoları al
        $depolar = Depo::with('istifler.urunler')->get();

        $seciliDepo = null;
        $seciliIstif = null;
        $urunler = collect();

        // Depo seçilmişse
        if ($request->filled('depo_id')) {
            $seciliDepo = Depo::with('istifler.urunler')->find($request->depo_id);
        }

        // İstif seçilmişse
        if ($request->filled('istif_id')) {
            $seciliIstif = Istif::with('urunler')->find($request->istif_id);
            $urunler = $seciliIstif ? $seciliIstif->urunler : collect(); // eğer istif seçildiyse yani seciliistif dolduysa urunler'e atılır. Eğer dolmadıysa collect fonk çalışır, boş koleksiyon olarak kalır
        }

        return view('depo-urun.sec', compact('depolar', 'seciliDepo', 'seciliIstif', 'urunler'));
    }





    public function index()
    {
        // $depo_ = Depo::with('urunler')->get();
        $depolar = Depo::all();
        $istif = Istif::all();

        return view('depo-urun.depo_urun_ekle', compact('depolar', 'istif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'depo_adi' => 'required|string|max:255',
        ]);

        Depo::create([
            'depo_adi' => $request->depo_adi,
        ]);
        // return redirect()->route('depolar.index')->with('success', 'Depo eklen');
        return redirect()->route('dashboard')->with('success', 'Depo eklen');
    }
    public function destroy(Depo $depo)
    {
        $depo->delete();
        return redirect()->route('depolar.index')->with('success', 'depo silindi');
        // return view('depo-urun.sec');
    }
}
