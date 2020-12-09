<x-payroll>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payroll Smart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                Payroll Dashboard </br>
                {{ $user->name }} </br>
                {{ $user->business_user->role }} </br>
                {{ $business->registration_number }} </br>
                @foreach ($business->employees as $employee)
                  {{ $employee->first_name }}
                  @foreach ($employee->addresses as $address)
                    {{ $address->address_1 }}
                  @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-payroll>
