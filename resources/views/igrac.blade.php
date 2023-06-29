<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('playnow.index') }}">
                @csrf
                <button class="bg-red-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" type="submit">Play now</button>
            </form>

            <form method="GET" action="{{ route('highscores.index') }}">
                @csrf
                <button class="bg-red-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" type="submit">High Scores</button>
            </form>
                                
                         
                        
                
            
              
            
        </div>
    </div>
</x-app-layout>