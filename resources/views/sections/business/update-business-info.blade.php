

<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Business Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The Business\' name and information.') }}
    </x-slot>



    <x-slot name="form">

        <!-- Business Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Business Name') }}" />



            <x-jet-input id="business_name"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="business_name"
                         />
            <x-jet-input-error for="business_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Business Address') }}" />

            <x-jet-input id="address"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="address"
                        placeholder="Enter Address"
                         />
            <x-jet-input-error for="address" class="mt-2" />
            <x-jet-input id="city"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="city"
                        placeholder="Enter City"
                         />
            <x-jet-input-error for="country" class="mt-2" />
            <x-selection-jet id="country"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="country"
                         />
                         {{ $countries = \App\Models\Country::all() }}
                         @foreach($countries as $country)
                         <option>{{ $country->country_name}}</option>
                         @endforeach
            </select>
            <x-jet-input-error for="country" class="mt-2" />
        </div>
    </x-slot>


        <x-slot name="actions">


            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
</x-jet-form-section>
