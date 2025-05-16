<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Livewire\Industri\Index as IndustriIndex;
use App\Livewire\Industri\Create as IndustriCreate;
use App\Livewire\Pkl\Index as PklIndex;
use App\Livewire\Pkl\Create as PklCreate;
use App\Livewire\Pkl\Edit as PklEdit;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/industri', IndustriIndex::class)->name('industri');
Route::get('/industri.create', IndustriCreate::class)->name('industri.create');
// Route::get('/industri.edit/{id}', IndustriEdit::class)->name('industri.edit');

Route::get('/pkl.index', PklIndex::class)->name('pkl.index');
Route::get('/pkl.create', PklCreate::class)->name('pkl.create');
Route::get('/pkl.edit/{id}', PklEdit::class)->name('pkl.edit');

Route::post('/industri', function (Request $request) {
    // Validasi data
    $request->validate([
        'nama' => 'required|string|max:100',
        'bidang_usaha' => 'required|string|max:100',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:20',
        'email' => 'required|email|max:100',
        'website' => 'nullable|url|max:255',
    ]);

    // Simpan data ke database
    $industri = new App\Models\Industri();
    $industri->nama = $request->nama;
    $industri->bidang_usaha = $request->bidang_usaha;
    $industri->alamat = $request->alamat;
    $industri->kontak = $request->kontak;
    $industri->email = $request->email;
    $industri->website = $request->website;
    $industri->save();

    // Redirect ke halaman index industri
    return redirect()->route('industri')->with('success', 'Data industri berhasil disimpan!');
})->name('industri.store');

Route::post('/pkl.index', function (Request $request) {
    // Validasi data
    $request->validate([
        'siswa_id' => 'required|exists:siswas,id',
        'industri_id' => 'required|exists:industris,id',
        'mulai' => 'required|date',
        'selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    Pkl::create([
        'siswa_id' => $request->siswa_id,
        'industri_id' => $request->industri_id,
        // 'guru_id' => Auth::user()->guru->id,
        'mulai' => $request->mulai,
        'selesai' => $request->selesai,
    ]);

    // Redirect ke halaman index pkl
    return redirect()->route(route: 'pkl.index')->with('success', 'Data industri berhasil disimpan!');
})->name('pkl.store');

Route::delete('/pkl/{pkl}', function (Pkl $pkl) {
    $pkl->delete();
    return redirect()->route('pkl.index')->with('success', 'Data PKL berhasil dihapus!');
})->name('pkl.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
