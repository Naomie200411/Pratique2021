
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-700 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-700 px-3 py-10 text-gray-900">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>
