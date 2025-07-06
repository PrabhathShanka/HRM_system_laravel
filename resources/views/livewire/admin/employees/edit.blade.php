<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Employees</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit Employee</flux:subheading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <flux:input label="Employee Name" wire:model.live="employee.name" :invalid="$errors->has('employee.name')" type="text" />
        <flux:input label="Employee Email" wire:model.live="employee.email" :invalid="$errors->has('employee.email')" type="email" />
            <flux:select label="Department" wire:model.live="department_id" :invalid="$errors->has('department_id')">
            <option selected>Select a department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </flux:select>
        <flux:select label="Designations" wire:model.live="employee.designation_id" :invalid="$errors->has('employee.designation_id')">
            <option selected>Select designation</option>
            @foreach($designations as $designation)
                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
            @endforeach
        </flux:select>
        </div>
        <flux:input label="Phone Number" wire:model.live="employee.phone" :invalid="$errors->has('employee.phone')" type="text" />
        <flux:input label="Address" wire:model.live="employee.address" :invalid="$errors->has('employee.address')" type="text" />
        <flux:button varian="primary" type="submit">Save</flux:button>
    </form>
</div>
