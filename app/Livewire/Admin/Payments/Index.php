<?php

namespace App\Livewire\Admin\Payments;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithoutUrlPagination;

    public function delete($id)
    {
        Payment::find($id)->delete();
        session()->flash('message', 'Payment deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.payments.index',[
            'payments' => Payment::latest()->paginate(10),
        ]);
    }
}
