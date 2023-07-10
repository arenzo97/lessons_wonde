<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wonde Lessons</title>

        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body >
        <div class="w-full h-screen">
            <div class="w-full h-screen bg-gradient-to-r from-green-400 to-blue-500 flex justify-center items-center">
                
                <div class="mx-4 text-center text-white">
                    
                    <!-- Title & description -->
                    <h1 class="font-bold text-6xl mb-4">Wonde Lessons</h1>
                    <h2 class="font-bold text-3xl mb-12">by Luis Lorenzo Arenas</h2>
                    <div>

                        <!-- Create a book page button -->
                        <a href="{{ config('app.url')}}/dashboard" class="font-bold rounded-md text-gray-600 text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-200 mr-2">
                            View Employee Dashboard
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

