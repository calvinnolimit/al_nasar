<?php

namespace App\Http\Livewire;

use App\models\komentar;
use Livewire\Component;

class Berita extends Component
{
    public $txtkomentar;
    public function simpan()
{
    $simpan = new Komentar();
    $simpan->isi_komentar = $this->txtkomentar;
    $simpan->save();
    $this->reset();
} 
    public function hapus($idhapus)
      {
        $hapus = Komentar::findOrFail($idhapus);
        $hapus->delete();
        $this->reset();
      }
public function render()
{
    return view('livewire.berita', [
        'isi_Komentar' => komentar::orderBy('created_at', 'desc')->get()
    ]);
}
}