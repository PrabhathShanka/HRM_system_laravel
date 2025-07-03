<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Designations</flux:heading>
        <flux:subheading size="lg" class="mb-6">Create a new designation</flux:subheading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:select lable="Department" wire:model.live="designation.department_id" :invalid="$errors->has('designation.department_id')">
            <option selected>Select a department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </flux:select>
        <flux:input label="Designation Name" wire:model.live="designation.name" :invalid="$errors->has('designation.name')" type="text" />
        <flux:button varian="primary" type="submit">Save</flux:button>
    </form>
</div>
