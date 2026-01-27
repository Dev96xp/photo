<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Vendor;
use Livewire\Component;

class CreateVendor extends Component
{
    public $open = false;

    public $code, $name, $status, $phone, $address, $city, $state, $zip, $email;

    protected $rules = [
        'code' => 'required',
        'name' => 'required',
        'status' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:vendors,email',
    ];



    public function render()
    {
        return view('livewire.admin.expense.create-vendor');
    }

    public function save()
    {
        // Validar los datos
        $this->validate();

        //dd($this->slug);


        $vendor = Vendor::create([
            'code' => $this->code,
            'name' => $this->name,
            'status' => $this->status,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'email' => $this->email,
        ]);

        // 5. Una vez usadas la porpiedades, limpia las propiedades (reset)
        //    y cierra el MODAL tambien
        $this->reset([
            'open',
            'name',
            'status',
            'phone',
            'address',
            'city',
            'state',
            'zip',
            'email',
        ]);

        // 6. En este caso para actualizar la lista de productos
        $this->dispatch('render-list');
    }
}
