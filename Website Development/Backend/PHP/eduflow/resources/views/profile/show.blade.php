<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="{{asset('images/eduflow.png')}}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="font-sans bg-gray-100">
    <x-app-layout>
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar -->
            <aside class="hidden w-64 p-4 space-y-6 text-white bg-green-600 md:block">
          
                <a href="{{route('documents')}}" class="flex items-center space-x-2 text-green-400">
                    <i class="fas fa-file-alt"></i>
                    <span>Documents</span>
                </a>
                <a href="#" class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Final Year Clearance</span>
                </a>
                <a href="{{ route('profile.edit')}}" class="flex items-center space-x-2">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Profile</span>
                </a>
                <a href="{{ route('profile.settings')}}" class="flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span>Accounts Settings</span>
                </a>
            </aside>

            <!-- Main content -->
            <div class="w-full p-4 md:w-3/4">
                <!-- Profile section -->
                <div class="flex items-center mb-4">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="object-cover w-24 h-24 rounded-full">
                    @else
                        <div class="w-24 h-24 bg-green-300 rounded-full"></div>
                    @endif
                    <div class="ml-4">
                        <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-600">Computer Science</p>
                    </div>
                </div>
                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Profile Information') }}
                                </h2>
                        
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("Update your account's profile information and email address.") }}
                                </p>
                            </header>
                        
                            <div class="mt-6 space-y-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <p id="name" class="block w-full p-2 mt-1 bg-gray-100 rounded">{{ $user->name }}</p>
                                </div>
                        
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <p id="email" class="block w-full p-2 mt-1 bg-gray-100 rounded">{{ $user->email }}</p>
                                </div>
                        
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}
                        
                                            <button form="send-verification" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>
                        
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                                <div class="flex items-center gap-4">
                                    <a href="{{route('profile.edit')}}">
                                    <x-primary-button><i class="fas fa-edit"></i> {{ __('Edit') }}</x-primary-button>
                                </a>
                        
                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            
          
        </div>
    </x-app-layout>
</body>

</html>
