<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithoutUrlPagination;

    public function delete($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.employees.index',[
            'employees' => Employee::latest()->paginate(10),
        ]);
    }
}
