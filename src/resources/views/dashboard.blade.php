<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee Dashboard</title>
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <div class="w-full h-screen">

            <!-- Description -->
            <div class="mx-20 py-10 text-center">
                <p class="text-lg">
                    Welcome!
                </p>
            </div>

            <!-- Libray Table -->
            <div class="items-center justify-center mx-20">
                <table class="border-collapse w-full"> 
                    <thead>
                  
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Employee</th>
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell"></th>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <!-- Header when in mobile/small screen view -->
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                                {{ $teacher['forename']  }} {{ $teacher['surname'] }}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <!-- Header when in mobile/small screen view -->
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                                <a href="/classes/{{ $teacher['id'] }}">Check timetable</a>
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>