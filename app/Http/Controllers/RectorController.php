<?php

namespace App\Http\Controllers;

use App\Models\Rector;
use Illuminate\Http\Request;

class RectorController extends Controller
{
    public function index (Request $request){
        return view('livewire.rector.edit', [
            'rector' => Rector::all()->firstOrFail(),
        ]);
    }
}
