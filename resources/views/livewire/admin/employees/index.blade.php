<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Employees</flux:heading>
        <flux:subheading size="lg" class="mb-6">List of Employees for {{ getCompany()->name }}</flux:subheading>
        <flux:separator />
    </div>

 <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full table">
                        <thead class="bg-nos-200 dark:bg-nos-950">
                            <tr>
                                <th># </th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $key => $employee)
                                <tr
                                    class="text-center bg-nos-100 hover:bg-nos-50 dark:bg-nos-900 dark:hover:bg-nos-700">
                                    <td>{{ $key + 1 }}</td>
                                    <td class='text-zinc-900 dark:text-white flex flex-col justify-left items-center'>
                                        <span class="font-bold text-lg
                                        ">{{ $employee->name }}</span>
                                        <span>{{ $employee->email }}</span>
                                    </td>
                                    <td>
                                        <div class="text-lg">
                                            {{ $employee->designation->name }}
                                        </div>
                                        <p>{{ $employee->designation->department->name }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <flux:button variant="filled" icon="pencil"
                                                :href="route('employees.edit', $employee->id)" />
                                            <flux:button variant="danger" icon="trash"
                                                wire:click="delete({{ $employee->id }})" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-2 bg-nos-200 dark:bg-nos-950">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
