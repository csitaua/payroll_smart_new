<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
    <div class="inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-screen-sm sm:w-full lg:max-w-screen-md" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <label for="first_name" class="label-input-box-1">First Name:</label>
                        <input type="text" class="input-box-1" id="first_name" placeholder="Enter First Name" wire:model="first_name">
                        @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="label-input-box-1">Last Name:</label>
                        <input type="text" class="input-box-1" id="last_name" wire:model="last_name" placeholder="Enter Last Name">
                        @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="label-input-box-1">Email:</label>
                        <input type="text" class="input-box-1" id="last_name" wire:model="email" placeholder="Enter Email">
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="date_of_birth" class="label-input-box-1">Date of Birth:</label>
                        <x-date-picker class="input-box-1" id="date_of_birth" wire:model="date_of_birth" autocomplete="off"/>
                        @error('date_of_birth') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="hire_date" class="label-input-box-1">Date of Hire:</label>
                        <x-date-picker class="input-box-1" id="hire_date" wire:model="hire_date" autocomplete="off"/>
                        @error('hire_date') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_number" class="label-input-box-1">ID Number:</label>
                        <input type="text" class="input-box-1" id="id_number" wire:model="id_number" placeholder="Enter ID Number">
                        @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click.prevent="store()" type="button" class="btn-add-edit">
                    Save
                    </button>
                </span>
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click="closeModal()" type="button" class="btn-cancel">
                        Cancel
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
</div>
