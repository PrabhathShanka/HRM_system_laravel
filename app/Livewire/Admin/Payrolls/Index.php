<?php

namespace App\Livewire\Admin\Payrolls;

use App\Models\Employee;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $monthYear;

    public function rules()
    {
        return [
            'monthYear' => 'required',
        ];
    }

    public function generalPayroll()
    {
        $this->validate();
        $date = Carbon::parse($this->monthYear);

        if (Payroll::inCompany()->where('month', $date->format('m'))->where('year', $date->format('Y'))->exists()) {
            throw ValidationException::withMessages(['monthYear' => 'Payroll Already generated for this month.']);
        } else {
            $payroll = new Payroll();
            $payroll->month = $date->format('m');
            $payroll->year = $date->format('Y');
            $payroll->company_id = session('company_id');
            $payroll->save();


            foreach (Employee::inCompany()->get() as $employee) {
                $contract = $employee->getActiveContract($date->startOfMonth()->toDateString(), $date->endOfMonth()->toDateString());

                if ($contract) {
                    $payroll->salaries()->create([
                        'employee_id' => $employee->id,
                        'gross_salary' => $contract->getTotalEarnings($date->format('Y-m-d')),
                    ]);
                }
            }
            session()->flash('message', 'Payroll generated successfully');
        }
    }

    public function updatePayroll($id)
    {
        $payroll = Payroll::inCompany()->find($id);
        $payroll->salaries()->delete();
        foreach (Employee::inCompany()->get() as $employee) {
            $contract = $employee->getActiveContract($payroll->year . '-' . $payroll->month . '-01', $payroll->year . '-' . $payroll->month . '-' . Carbon::parse($payroll->monthYear)->daysInMonth . ' 23:59:59');
            if ($contract) {
                $payroll->salaries()->create([
                    'employee_id' => $employee->id,
                    'gross_salary' => $contract->getTotalEarnings($payroll->year . '-' . $payroll->month),
                ]);
            }
        }
        session()->flash('message', 'Payroll updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.payrolls.index', [
            'payrolls' => Payroll::inCompany()->orderBy('year', 'desc')->orderBy('month', 'desc')->paginate(5),
        ]);
    }
}
