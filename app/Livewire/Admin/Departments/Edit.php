<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;

class Edit extends Component
{
    public $departments;

    public function rules()
    {
        return [
            'departments.name' => 'required|string|max:255',
        ];
    }

    public function mount($id)
    {
        $this->departments = Department::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->departments->save();
        session()->flash('message', 'Department edited successfully');
        return $this->redirectIntended('departments.index');
    }
    public function render()
    {
        return view('livewire.admin.departments.edit');
    }
}
