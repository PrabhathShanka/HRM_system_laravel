<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithoutUrlPagination;

    public function delete($id)
    {
        $company = Company::find($id);
        if($company->logo){
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();
        session()->flash('message', 'Company deleted successfully');

    }

    public function render()
    {
        return view('livewire.admin.companies.index',[
            'companies' => Company::latest()->paginate(10),
        ]);
    }
}
