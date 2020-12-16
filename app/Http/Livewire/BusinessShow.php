<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Business;

class BusinessShow extends Component
{
    public function render($id)
    {
        $business = business::find($id)->first();
        return view('sections.business.show', ['business' => $business]);
    }
}
