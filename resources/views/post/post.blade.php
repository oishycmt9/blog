<x-guest-layout>
    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        {{auth()->user()->role_name}}

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Category -->
        <div class="mt-4">
            <x-input-label for="category" :value="__('Category')" />

            <select class="block mt-1 w-full" name="category" id="category" required>
                <option value="">--Select Category--</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Computer">Computer</option>
            </select>

           {{--  <x-text-input id="category" class="block mt-1 w-full"
                            type="text"
                            name="category"
                            required autocomplete="category" /> --}}

            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('CREATE') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
