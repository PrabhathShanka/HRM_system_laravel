<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public $employees;
    public $department_id;

    public function rules()
    {
        return [
            'employees.name' => 'required|string|max:255',
            'employees.email' => 'required|email|max:255',
            'employees.phone' => 'required|string|max:255',
            'employees.address' => 'required|string|max:255',
            "employees.department_id" => "required|exists:departments,id",
        ];
    }

    public function mount()
    {
        $this->employees = new Employee();
    }

    public function save()
    {
        $this->validate();
        $this->employees->save();
        session()->flash('success', 'Employee created successfully');
        return $this->redirectIntended('employees.index');
    }
    public function render()
    {
        $designations = Designation::inCompany()->where('department_id', $this->department_id)->get();
        return view('livewire.admin.employees.create',[
            'designations' => $designations,
            'departments' => Department::inCompany()->get(),
        ]);
    }
}
