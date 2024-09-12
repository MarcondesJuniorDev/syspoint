<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ponto;

class RegistrarPonto extends Component
{
    public $image;
    public $now_localization;
    public $last_localization;
    public $ip;
    public $dateHour;

    public function mount()
    {
        $this->now_localization = date('Y-m-d H:i:s');
        $this->last_localization = date('Y-m-d H:i:s');
        $this->ip = request()->ip();
        $this->dateHour = date('Y-m-d H:i:s');
    }

    public function registrarPonto() {
        $ponto = new Ponto();
        $ponto->user_id = auth()->user()->id;
        $ponto->image = $this->image;
        $ponto->now_localization = $this->now_localization;
        $ponto->last_localization = $this->last_localization;
        $ponto->ip = $this->ip;
        $ponto->dateHour = now();

        $ponto->save();

        session()->flash('message', 'Ponto Registrado com Sucesso!');
    }
    public function render()
    {
        return view('livewire.registrar-ponto');
    }
}
