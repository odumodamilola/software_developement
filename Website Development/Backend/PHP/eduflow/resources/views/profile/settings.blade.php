<!-- resources/views/account-settings.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="change-password-form" method="POST" action="{{ route('account.settings.updatePassword') }}">
                        @csrf

                        <!-- Current Password -->
                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" class="block w-full mt-1" type="password" name="current_password" required />
                            @error('current_password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mt-4">
                            <x-input-label for="new_password" :value="__('New Password')" />
                            <x-text-input id="new_password" class="block w-full mt-1" type="password" name="new_password" required />
                            @error('new_password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mt-4">
                            <x-input-label for="new_password_confirmation" :value="__('Confirm New Password')" />
                            <x-text-input id="new_password_confirmation" class="block w-full mt-1" type="password" name="new_password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Change Password') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Delete Account Button -->
                    <form id="delete-account-form" method="POST" action="{{ route('account.settings.deleteAccount') }}" class="mt-6">
                        @csrf
                        @method('DELETE')

                        <div class="flex items-center justify-end">
                            <x-danger-button class="ml-4">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately
            swal({
                title: "Are you sure?",
                text: "Do you really want to change your password?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willChange) => {
                if (willChange) {
                    this.submit(); // Submit the form if the user confirms
                }
            });
        });

        document.getElementById('delete-account-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete your account? This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit(); // Submit the form if the user confirms
                }
            });
        });
    </script>
</x-app-layout>
