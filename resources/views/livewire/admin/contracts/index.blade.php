<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Contracts</flux:heading>
        <flux:subheading size="lg" class="mb-6">List of Contracts for {{ getCompany()->name }}</flux:subheading>
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
                                <th>Employee Details</th>
                                <th>Contract Details</th>
                                <th>Rate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($contracts as $key => $contract)
                                <tr
                                    class="text-center bg-nos-100 hover:bg-nos-50 dark:bg-nos-900 dark:hover:bg-nos-700">
                                    <td>{{ $key + 1 }}</td>
                                    <td class='text-zinc-900 dark:text-white flex  flex-col justify-left items-center'>
                                        <span class="font-semibold text-lg">{{ $contract->employee->name }}</span>
                                        <span>{{ $contract->employee->email }}</span>
                                        <span>{{ $contract->employee->phone }}</span>
                                        <span class="font-bold">{{ $contract->employee->designation->name }}</span>
                                    </td>
                                    <td class="">
                                        <h5> Start: {{ $contract->start_date }}</h5>
                                       <p> End: {{ $contract->end_date }} </p>
                                       <p class="font-semibold text-lg"> Duration: {{ $contract->duration }} </p>
                                    </td>
                                    <td>
                                        Rs {{ number_format(num: $contract->rate) }} {{ $contract->rate_type }}
                                    <td>
                                        <div>
                                            <flux:button variant="filled" icon="pencil"
                                                :href="route('contracts.edit', $contract->id)" />
                                            <flux:button variant="danger" icon="trash"
                                                wire:click="delete({{ $contract->id }})" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-2 bg-nos-200 dark:bg-nos-950">
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
