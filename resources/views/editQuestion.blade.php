<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                Pitanja:
                    <form method="POST" action="{{ route('questions.update', $id) }}">
                        @csrf
                        @method('PUT')
                        <input type="textarea" name="text" value="{{ $question->text }}" placeholder="Tekst pitanja">
                        <input type="text" name="answer1" value="{{ $question->answer1 }}" placeholder="Odgovor 1">
                        <input type="text" name="answer2" value="{{ $question->answer2 }}" placeholder="Odgovor 2">
                        <input type="number" name="correct_answer" value="{{ $question->correct_answer }}" placeholder="1-2">
                        <select name="category_id">
                            @foreach ($data as $kategorija)
                                <option value="{{ $kategorija->id }}">{{ $kategorija->title }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Update question</button>
                    </form>

                   
            </div>
         

            
        </div>


        
    </div>
    
</x-app-layout>