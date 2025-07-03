<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Departments</flux:heading>
        <flux:subheading size="lg" class="mb-6">Edit this department</flux:subheading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Department Name" wire:model.live="department.name" :invalid="$errors->has('department.name')" type="text" />
        <flux:button varian="primary" type="submit">Save</flux:button>
    </form>
</div>
