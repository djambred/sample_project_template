<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="text-center space-y-6 px-4">
        <h1 class="text-3xl font-semibold text-gray-800">Choose a Module</h1>
        <div class="flex flex-col lg:flex-row gap-6 justify-center items-stretch">
            <!-- CMS -->
            <a href="{{ url('/cms') }}" class="w-64 rounded-xl border border-gray-200 bg-white p-6 shadow-md transition hover:bg-gray-50 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-xl font-semibold text-gray-800">CMS</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 7l-10 10M7 7h10v10"></path>
                    </svg>
                </div>
                <p class="mt-2 text-sm text-gray-600">Content Management System</p>
            </a>

            <!-- LMS -->
            <a href="{{ url('/lms') }}" class="w-64 rounded-xl border border-gray-200 bg-white p-6 shadow-md transition hover:bg-gray-50 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-xl font-semibold text-gray-800">LMS</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 7l-10 10M7 7h10v10"></path>
                    </svg>
                </div>
                <p class="mt-2 text-sm text-gray-600">Learning Management System</p>
            </a>

            <!-- HRM -->
            <a href="{{ url('/hrm') }}" class="w-64 rounded-xl border border-gray-200 bg-white p-6 shadow-md transition hover:bg-gray-50 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-xl font-semibold text-gray-800">HRM</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 7l-10 10M7 7h10v10"></path>
                    </svg>
                </div>
                <p class="mt-2 text-sm text-gray-600">Human Resource Management</p>
            </a>
        </div>
    </div>

</body>
</html>
