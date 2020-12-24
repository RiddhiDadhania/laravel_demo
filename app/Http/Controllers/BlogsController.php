<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blogs.index', compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required',
            'mono' => 'required|digits:10',
            'zipcode' => 'required|digits:5',
            'city' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required',
            'mono' => 'required|digits:10',
            'zipcode' => 'required|digits:5',
            'city' => 'required',
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted successfully');
    }
}
