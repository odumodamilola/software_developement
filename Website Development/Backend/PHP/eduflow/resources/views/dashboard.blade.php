<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('images/eduflow.png')}}" type="image/x-icon">
</head>

<body class="font-sans bg-gray-100">

<x-app-layout>
    <div class="flex">
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
    
        <!-- Main Dashboard Content -->
        <main class="flex-1 p-6">
            <!-- Clearance Progress -->
            <div class="p-4 bg-white border border-gray-200 rounded shadow-sm">
                <h2 class="mb-2 text-xl font-semibold text-gray-700">Clearance Progress</h2>
                <div class="flex items-center mb-4">
                    <div class="w-full h-4 bg-gray-200 rounded-full">
                        <div class="h-4 bg-green-600 rounded-full" style="width: 50%;"></div>
                    </div>
                    <span class="ml-4 text-sm text-green-600">50% Complete</span>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    <!-- Clearance Items -->
                    <div class="flex items-center justify-between p-4 border border-green-200 rounded bg-green-50">
                        <span>Library</span>
                        <span class="text-green-600"><i class="fas fa-check-circle"></i> Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-red-200 rounded bg-red-50">
                        <span>Department</span>
                        <span class="text-red-600"><i class="fas fa-exclamation-circle"></i> Not Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-green-200 rounded bg-green-50">
                        <span>Laboratory</span>
                        <span class="text-green-600"><i class="fas fa-check-circle"></i> Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-red-200 rounded bg-red-50">
                        <span>College</span>
                        <span class="text-red-600"><i class="fas fa-exclamation-circle"></i> Not Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-green-200 rounded bg-green-50">
                        <span>Bursary</span>
                        <span class="text-green-600"><i class="fas fa-check-circle"></i> Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-red-200 rounded bg-red-50">
                        <span>Student Affairs</span>
                        <span class="text-red-600"><i class="fas fa-exclamation-circle"></i> Not Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-green-200 rounded bg-green-50">
                        <span>Sport</span>
                        <span class="text-green-600"><i class="fas fa-check-circle"></i> Cleared</span>
                    </div>
                    <div class="flex items-center justify-between p-4 border border-red-200 rounded bg-red-50">
                        <span>Internal Audit</span>
                        <span class="text-red-600"><i class="fas fa-exclamation-circle"></i> Not Cleared</span>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
</x-app-layout>









   
</body>

</html>
