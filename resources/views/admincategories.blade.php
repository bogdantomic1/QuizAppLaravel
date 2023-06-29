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
                                <td>{{ $kategorija->title }}</td>
                                <td>
                                    <form action="{{ route('categories.destroy', $kategorija->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $kategorija->id) }}">Edit</a>
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

