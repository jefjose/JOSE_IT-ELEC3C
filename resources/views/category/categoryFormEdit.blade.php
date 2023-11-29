<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('category.update', ['category' => $category]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-label for="category_name" value="{{ __('Category Name') }}" />
                <x-input id="category_name" class="block mt-1 w-full" type="text" name="category_name"
                    value="{{ $category->category_name }}" required autofocus autocomplete="category_name" />
            </div>

            <div>
                <x-label for="image" value="{{ __('Current Image') }}" />
                <img class="img-thumbnail" src="{{ asset('storage/' . $category->image) }}" alt="Current Image">
            </div>

            <div>
                <x-label for="image" value="{{ __('Image') }}" />
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*"
                    required autofocus autocomplete="image" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Add Category') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
