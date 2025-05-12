<?php

namespace App\Livewire\Rector;

use App\Models\Rector;
use Livewire\Component;

class Edit extends Component
{

    public $rector_id;
    public $nombre;
    public $tipo_documento;
    public $documento;
    public $celular;

     public function mount()
    {  

        $rector = Rector::firstOrFail();

        $this->rector_id = $rector->id;
        $this->nombre = $rector->nombre;
        $this->tipo_documento = $rector->tipo_documento;
        $this->documento = $rector->documento;
        $this->celular = $rector->celular;
    }

    public function guardar(){
        $rector = Rector::firstOrFail();

        $rector->update([
            'nombre' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'celular' => $this->celular,
        ]);

        session()->flash('success', 'Datos actualizados correctamente.');
    }

    public function render()
    {
        return view('livewire.rector.edit')->layout('layouts.app');
    }
}
