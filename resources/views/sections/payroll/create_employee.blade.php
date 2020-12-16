<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
    <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-screen-sm sm:w-full lg:max-w-screen-lg" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                @if($warningMessage !=='') <div class="flex justify-center w-f text-red-500 mb-4 text-xl font-bold"> {{ $warningMessage }} </div> @endif
                <div class="">

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="first_name" class="label-input-box-1">First Name:</label>
                      </div>
                      <div class="col-span-3">
                        <input type="text" class="input-box-grid-1" id="first_name" placeholder="Enter First Name" wire:model="first_name">
                        @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                      </div>
                      <div>
                        <label for="last_name" class="label-input-box-1">Last Name:</label>
                      </div>
                      <div class="col-span-3">
                        <input type="text" class="input-box-grid-1" id="last_name" wire:model="last_name" placeholder="Enter Last Name">
                        @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                      </div>
                    </div>

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="email" class="label-input-box-1">Email:</label>
                      </div>
                      <div class="col-span-3">
                        <input type="text" class="input-box-grid-1" id="email" wire:model="email" placeholder="Enter Email">
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                      </div>
                      <div>
                        <label for="date_of_birth" class="label-input-box-1">Date of Birth:</label>
                      </div>
                      <div class="col-span-3">
                        <x-date-picker-2 class="input-box-grid-1" id="date_of_birth" wire:model="date_of_birth" autocomplete="off"/>
                        @error('date_of_birth') <span class="text-red-500">{{ $message }}</span>@enderror
                      </div>
                    </div>

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="hire_date" class="label-input-box-1">Date of Hire:</label>
                      </div>
                      <div class="col-span-3">
                        <x-date-picker-2 class="input-box-grid-1" id="hire_date" wire:model="hire_date" autocomplete="off"/>
                        @error('hire_date') <span class="text-red-500">{{ $message }}</span>@enderror
                      </div>
                      <div>
                        <label for="gender" class="label-input-box-1">Gender:</label>
                      </div>
                      <div class="col-span-3">
                        <select class="input-box-grid-1" id="gender" wire:model="gender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="id_number" class="label-input-box-1">ID Number:</label>
                      </div>
                      <div class="col-span-3">
                        <input type="text" class="input-box-grid-1" id="id_number" wire:model="id_number" placeholder="Enter ID Number">
                      </div>
                      <div>
                          <label for="tax_id_number" class="label-input-box-1">Tax ID Number:</label>
                      </div>
                      <div class="col-span-3">
                          <input type="text" class="input-box-grid-1" id="tax_id_number" wire:model="tax_id_number" placeholder="Enter Tax ID Number">
                      </div>
                    </div>

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="married" class="label-input-box-1">Married:</label>
                      </div>
                      <div class="col-span-3">
                        <select class="input-box-grid-1" id="married" wire:model="married">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>
                      <div>
                        <label for="country_of_birth" class="label-input-box-1">Country of Birth:</label>
                      </div>
                      <div class="col-span-3">
                        <select class="input-box-grid-1" id="country_of_birth" wire:model="country_of_birth">
                          <option></option>
                          @foreach($countries as $country)
                          <option>{{ $country->country_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="employee-new-edit-grid">
                      <div>
                        <label for="mobile_pre" class="label-input-box-grid-1">Mobile Number:</label>
                      </div>
                      <div>
                          <select class="input-box-grid-1 w-f" id="mobile_pre_country_id" wire:model="mobile_pre_country_id">
                            <option></option>
                            @foreach($countries as $country)
                            <option value={{ $country->id }}>{{ '+'.$country->phonecode.' ('.$country->country_name.')' }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-span-2">
                        <input type="text" class="input-box-grid-1" id="mobile_number" wire:model="mobile_number" placeholder="Enter Mobile Number">
                      </div>
                      <div>
                          <label for="phone_pre" class="label-input-box-grid-1">Phone Number:</label>
                      </div>
                      <div>
                          <select class="input-box-grid-1 w-f" id="phone_pre_country_id" wire:model="phone_pre_country_id">
                            <option></option>
                            @foreach($countries as $country)
                            <option value={{ $country->id }}>{{ '+'.$country->phonecode.' ('.$country->country_name.')' }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-span-2">
                          <input type="text" class="input-box-grid-1" id="phone_number" wire:model="phone_number" placeholder="Enter Phone Number">
                      </div>
                    </div>


                    @if($isTerminate OR $termination_date !== NULL)
                      <div class="employee-new-edit-grid">
                        <div>
                          <label for="termination_date" class="label-input-box-1">Termination Date:</label>
                        </div>
                        <div class="col-span-3">
                          <x-date-picker-2 class="input-box-grid-1" id="termination_date" wire:model="termination_date" autocomplete="off"/>
                        </div>
                        <div>
                          <label for="termination_reason" class="label-input-box-1">Termination Reason:</label>
                        </div>
                        <div class="col-span-3">
                          <select class="input-box-grid-1" id="termination_reason" wire:model="termination_reason">
                            <option>Reason 1</option>
                            <option>Reason 2</option>
                          </select>
                        </div>
                      </div>
                    @endif

                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                  @if(!$isTerminate AND $termination_date === NULL AND $employee_id>0)
                  <button wire:click.prevent="terminateEmployee()" type="button" class="btn-delete">
                  Terminate
                  </button>
                  @endif
              </span>
                <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                    <button wire:click.prevent="store()" type="button" class="btn-add-edit">
                    Save
                    </button>
                </span>
                <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                    <button wire:click="closeModal()" type="button" class="btn-cancel">
                        Cancel
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
</div>
