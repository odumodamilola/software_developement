<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{asset('images/eduflow.png')}}" type="image/x-icon">

</head>

<body class="font-sans bg-gray-100">
    <!-- resources/views/dashboard.blade.php -->
<!-- resources/views/documents.blade.php -->
<x-app-layout>
    <div class="flex mt-5">
        <!-- Sidebar -->
        <aside class="hidden w-64 p-4 space-y-6 text-white bg-green-600 md:block">
            <a href="{{route('dashboard')}}" class="flex items-center space-x-2">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('documents')}}" class="flex items-center space-x-2">
                <i class="fas fa-file-alt"></i>
                <span>Documents</span>
            </a>
            <a href="#" class="flex items-center space-x-2">
                <i class="fas fa-graduation-cap"></i>
                <span>Final Year Clearance</span>
            </a>
            <a href="{{route('profile.edit')}}" class="flex items-center space-x-2">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span>
            </a>
            <a href="{{ route('profile.settings')}}" class="flex items-center space-x-2">
                <i class="fas fa-cog"></i>
                <span>Accounts Settings</span>
            </a>
        </aside>

        <!-- Main Documents Content -->
<main class="flex-1 p-6">
    <h2 class="mb-4 text-2xl font-semibold text-gray-700">My Documents</h2>
    
    
    <!-- Display success or error messages -->
    @if (session('success'))
        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
            <strong class="font-bold">Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Flex Container for Documents and Upload Form -->
    <div class="flex flex-col gap-6">
        <!-- Document Upload Form -->
        <div class="flex flex-col items-center p-4 bg-white border border-gray-200 rounded shadow-sm">
            <form action="{{ route('documents.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="upload" class="flex items-center justify-center w-24 h-24 mb-2 bg-gray-100 rounded cursor-pointer hover:bg-gray-200">
                    <i class="text-4xl text-gray-400 fas fa-upload"></i>
                </label>
                <input type="file" id="upload" name="document" class="hidden" onchange="this.form.submit()">
                <p class="text-center text-gray-700">Upload a document</p>
            </form>
        </div>
        <!-- Document Items -->
        <div class="flex-1">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($documents as $document)
                    <div class="flex flex-col items-center p-4 bg-white border border-gray-200 rounded shadow-sm">
                        <div class="flex items-center justify-center w-24 h-24 mb-2 bg-gray-100 rounded">
                            <i class="text-4xl text-gray-400 fas fa-file-alt"></i>
                        </div>
                        <p class="text-center text-gray-700">{{ $document->file_name }}</p>
                        <a href="{{ Storage::url($document->file_path) }}" class="mt-2 text-blue-600 hover:underline">View</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

    </div>
</x-app-layout>









   
</body>

</html>
