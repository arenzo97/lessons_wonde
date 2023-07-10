<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Timetable</title>
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
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
                        <!-- Title and Author column headers sorts the view depending on which on is selected -->
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell"><a href="{{ url('/books/sort/title') }}">First Name</a></th>
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell"><a href="{{ url('/books/sort/author') }}">Surname</a></th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <!-- Header when in mobile/small screen view -->
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                                
                                <!-- Link to edit specific book, launches Edit view -->
                                {{ $student->forename  }}
                            </td>
                            
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                                
                                <!-- Link to edit specific book, launches Edit view -->
                                {{ $student->surname }}
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>