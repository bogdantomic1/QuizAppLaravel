<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;

class NewCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         // Validate the form data
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            // Add validation rules for other fields if necessary
        ]);

        

        // Create a new category instance
        $category = new Category();
        $category->title = $validatedData['title'];
        // Set other fields if necessary

        // Save the category to the database
        $category->save();

        // Optionally, you can flash a success message to the session
        session()->flash('success', 'Category created successfully.');

        // Redirect to a different page or return a response as needed
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('editCategory', compact('category', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $cat = Category::find($id);
    $cat->delete();
    return redirect()->back();

    
}


   
}
