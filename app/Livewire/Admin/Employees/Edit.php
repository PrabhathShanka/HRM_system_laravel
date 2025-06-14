<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Livewire\Component;

class Edit extends Component
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

    public function mount($id)
    {
        $this->employees =  Employee::find($id);
        $this->department_id = $this->employees->designation->department_id;
    }

    public function save()
    {
        $this->validate();
        $this->employees->save();
        session()->flash('success', 'Employee edited successfully');
        return $this->redirectIntended('employees.index');
    }
    public function render()
    {
        $designations = Designation::inCompany()->where('department_id', $this->department_id)->get();
        return view('livewire.admin.employees.edit',[
            'designations' => $designations,
            'departments' => Department::inCompany()->get(),
        ]);
    }
}
