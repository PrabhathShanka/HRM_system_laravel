<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Payrolls</flux:heading>
        <flux:subheading size="lg" class="mb-6">Payrolls for {{ getCompany()->name }}</flux:subheading>
        <flux:separator />
    </div>

    <div class="flex justify-between items-center">
        <div class="w-full pr-4">
            <flux:input type="month" name="month" wire:model="monthYear" placeHolder="Choose a month"
                :invalid="$errors->has('monthYear')" />
        </div>
        <div>
            <flux:button varian="primary" wire:click="generatePayroll">Generate Payroll</flux:button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-4 mt-4">
        @foreach ($payrolls as $payroll)
            <div class="p6 bg-nos-100 dark:bg-nos-900 text-nos-900 dark:text-white rounded-lg shadow-md hover:shadow-lg hover:bg-nos-300 transition duration-300 ease-in-out" wire:click="viewPayroll({{ $payroll->id }})">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">
                         {{ \Carbon\Carbon::createFromDate($payroll->year, $payroll->month, 1)->format('F Y') }}
                    </h2>
                    <p class="text-lg font-zinc-500 dark:text-sized-400">
                        {{ getCompany()->name }}
                    </p>
                </div>
                <div class="text-right flex flex-col justify-end text-green-700">
                    <sup>RS</sup><span class ="font-bold text-xl"></span>{{ number_format(num: $payroll->salaries?->sum('gross_salary')) }} </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
