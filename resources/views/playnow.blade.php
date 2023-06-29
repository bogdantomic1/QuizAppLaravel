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
                <div class="game-container">
            <h2>Quizz</h2>
            @foreach ($questions as $question)
            <table>
                <thead>
                    <tr>
                        <td>Question</td>
                        <td>Answer1</td>
                        <td>Answer2</td>
                        <td>Choose corect</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td  class="border px-4 py-2">{{$question->text}}</td>
                        <td class="border px-4 py-2">{{$question->answer1}}</td>
                        <td class="border px-4 py-2">{{$question->answer2}}</td>
                        <td class="border px-4 py-2">
                        <input  class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" id="ans1" name="ans1" value="Answer1">
                        <input class="bg-red-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" type="button" id="ans2" name="ans2" value="Answer2">
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach       
                         
                        
</div>
            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
