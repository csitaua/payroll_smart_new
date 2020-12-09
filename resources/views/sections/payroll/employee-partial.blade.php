@foreach ($business->employees as $employee)
  <tr>
      <td class="border px-4 py-2">{{ $employee->id }}</td>
      <td class="border px-4 py-2">{{ $employee->first_name }}</td>
      <td class="border px-4 py-2">{{ $employee->last_name }}</td>
      <td class="border px-4 py-2">{{ $employee->date_of_birth }}</td>
      <td class="border px-4 py-2">{{ $employee->hire_date }}</td>
      <td class="border px-4 py-2">
      <button wire:click="edit({{ $employee->id }})" class="btn-add-edit">Edit</button>
          <button wire:click="delete({{ $employee->id }})" class="btn-delete">Delete</button>
      </td>
  </tr>
  @endforeach
