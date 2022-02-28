<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categoies = Category::all();
        return view('categories.index')->withCategories($categoies);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        Session::flash('success', 'New category has been created.');
        return redirect(route('categories.home'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
