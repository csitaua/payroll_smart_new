<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;

class UpdateBusinessInfo extends Component
{
    public $bid, $business_name, $address,$city, $country;

    protected $rules = [
      'address' => 'required',
    ];

    public function mount(){
      $business = Business::findOrFail($this->bid);
      $this->fill(['business_name' => $business->business_name, 'address' => $business->address, 'city' => $business->city, 'country' => $business->country]);
    }

    public function render()
    {
        return view('sections.business.update-business-info');
    }

    public function store(){
      $this->validate();
      $business = Business::findOrFail($this->bid);
      $business->update(['address' => $this->address,]);
      session()->flash('message', 'Information Saved');
    }
}
