<div>
  @if (session()->has('message'))
      <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" id='alert' >
        <div class="flex">
          <div>
            <p class="text-sm">{{ session('message') }}</p>
          </div>
        </div>
      </div>
  @endif
  @if($isOpen)
      @include('sections.payroll.create_employee')
  @endif
    <div class="flex justify-between">
      <button wire:click="create()" class="btn-add-edit">Add Employee</button>
      <div><input wire:model="search" type="text" placeholder="Search..."> <button wire:click="clear" class="btn-cancel">Clear</button></div>
    </div>
    <div class="flex justify-between">
      <div>
        Per Page: &nbsp;
        <select wire:model="per_page" class="drop-down-select">
          <option>5</option>
          <option>10</option>
          <option>25</option>
        </select>
      </div>
      <div>
        Active Employees Only: &nbsp;
        <input wire:model="active_only" value="1" type="checkbox" class="form-checkbox"/>
      </div>
    </div>
  <table class="table-fixed w-full">
      <thead>
          <tr class="bg-gray-100">
              <th class="px-4 py-2 w-20"><a wire:click.prevent="sortBy('id')" role="button" href="#">
                Id
                  @include('includes._sort_icon', ['field' => 'id'])
              </a></th>
              <th class="px-4 py-2"><a wire:click.prevent="sortBy('first_name')" href="#">
                First Name
                @include('includes._sort_icon', ['field' => 'first_name'])
              </a></th>
              <th class="px-4 py-2"><a wire:click.prevent="sortBy('last_name')" href="#">
                Last Name
                @include('includes._sort_icon', ['field' => 'last_name'])
              </a></th>
              <th class="px-4 py-2 w-36"><a wire:click.prevent="sortBy('date_of_birth')" href="#">
                DOB
                @include('includes._sort_icon', ['field' => 'date_of_birth'])
              </a></th>
              <th class="px-4 py-2 w-36"><a wire:click.prevent="sortBy('hire_date')" href="#">
                Hire Date
                @include('includes._sort_icon', ['field' => 'hire_date'])
              </a></th>
              <th class="px-4 py-2 w-24">Actions</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
              <td class="border px-4 py-1">{{ $employee->id }}</td>
              <td class="border px-4 py-1">{{ $employee->first_name }}
              @if($employee->termination_date !== NULL)
                <span class="text-red-500"> (Terminated)</span>
              @endif
              </td>
              <td class="border px-4 py-1">{{ $employee->last_name }}</td>
              <td class="border px-4 py-1">{{ $employee->date_of_birth }}</td>
              <td class="border px-4 py-1">{{ $employee->hire_date }}</td>
              <td class="border px-4 py-1">
              <button wire:click="edit({{ $employee->id }})" class="btn-add-edit">Edit</button>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  {{ $employees->links() }}
</div>
