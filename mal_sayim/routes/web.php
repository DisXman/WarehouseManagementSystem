<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Urun_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Depo_Controller;
use App\Http\Controllers\Istif_Controller;
use App\Models\Istif;

Route::get('/', function () {
    return view('login_register');
});
/*    profile düzenleme      */ 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// dashboard du eskiden user yaptım ve  burası kullancının anasayfasını yönlendirir.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// seçmek veya eklemek için butonlara yönlendirir
Route::get('/depo-urun/depo_urun_ekle', [Depo_Controller::class, 'index'])->middleware(['auth','verified'])->name('depo_urun_ekle');
Route::get('/depo-urun/sec', [Urun_Controller::class, 'index'])->middleware(['auth','verified'])->name('sec');


// ürünleri listelemek için
Route::get('/depo-urun/sec', [Depo_Controller::class, 'sec'])->name('depo-urun.sec');

// ürün aramak için
Route::get('/depo-urun/ara', [Urun_Controller::class, 'ara'])->name('depo-urun.ara');




Route::middleware(['auth'])->group(function(){
    Route::get('/depolar', [Depo_Controller::class, 'index'])->name('depolar.index');

    Route::post('/depolar', [Depo_Controller::class, 'store'])->name('depolar.store');

    Route::delete('/depolar/{depo}', [Depo_Controller::class, 'destroy'])->name('depolar.destroy');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/urunler', [Urun_Controller::class, 'index'])->name('urunler.index');

    Route::post('/urunler', [Urun_Controller::class, 'store'])->name('urunler.store');

    Route::delete('/urunler/{urun}', [Urun_Controller::class, 'destroy'])->name('urunler.destroy');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/istif', [Istif_Controller::class, 'index'])->name('istif.index');

    Route::post('istif', [Istif_Controller::class, 'store'])->name('istif.store');

    Route::delete('/istif/{istif}', [Istif_Controller::class, 'destroy'])->name('istif.destroy');

});


require __DIR__.'/auth.php';
