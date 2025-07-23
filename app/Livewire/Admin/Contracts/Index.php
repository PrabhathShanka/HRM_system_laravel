<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function delete($id)
    {
        Contract::find($id)->delete();
        session()->flash('success', 'Contract deleted successfully');
    }
    public function render()
    {
        return view('livewire.admin.contracts.index', [
            'contracts' => Contract::inCompany()->searchByEmployee($this->search)->paginate(10),
        ]);
    }
}
