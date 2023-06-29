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
                    Kategorije:
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <input type="text" name="title" placeholder="Category Title">
                        <button type="submit">Create Category</button>
                    </form>

                    <br>
                    <label for="kategorija">Sve Kategorije</label>
                    <br>

                    
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                            </tr>   
                        </thead>
                        <tbody>
                        @foreach ($data as $kategorija)
                            <tr>
                                <td class="border px-4 py-2">{{ $kategorija->title }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('categories.destroy', $kategorija->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                                    </form>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('categories.edit', $kategorija->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
<hr>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                    Pitanja:
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf
                        <input type="textarea" name="text" placeholder="Tekst pitanja">
                        <input type="text" name="answer1" placeholder="Odgovor 1">
                        <input type="text" name="answer2" placeholder="Odgovor 2">
                        <input type="number" name="correct_answer" placeholder="1-2">
                        <select name="category_id">
                            @foreach ($data as $kategorija)
                                <option value="{{ $kategorija->id }}">{{ $kategorija->title }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Create question</button>
                    </form>

                    
            
            
           


                    <br>
                    <label for="kategorija">Sva Pitanja</label>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th >Text</th>
                                <th>Answer 1</th>
                                <th>Answer 2</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>   
                        </thead>
                        <tbody>
                        @foreach ($allQuestions as $question)
                        
                            
                            <tr>
                                <td class="border px-4 py-2">{{ $question->text }}</td>
                                <td class="border px-4 py-2">{{ $question->answer1 }}</td>
                                <td class="border px-4 py-2">{{ $question->answer2 }}</td>
                                <td class="border px-4 py-2">{{ $question->category->title }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    DELETE
                                    </button>
                                </form>
                                </td>
                                <td class="border px-4 py-2">
                                <a href="{{ route('questions.edit', $question->id) }}">Edit</a>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
      
    

        </div>
    </div>      
</div>







    
</x-app-layout>

