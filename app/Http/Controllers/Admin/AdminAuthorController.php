<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthorController extends Controller
{
    public function create()
    {
        return view('admin.author.author_create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'author_name' => 'required|max:255',
            'author_image' => 'required|max:255',
            'author_description' => 'required|max:2000',
        ]);
        $author = Author::create($storeData);
        alert()->success('Success','Author have been created.');
        return redirect('/admin/author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $author_id
     * @return \Illuminate\Http\Response
     */
    public function edit($author_id)
    {
        $author = Author::findOrFail($author_id);
        return view('admin.author.author_edit', compact('author'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $author_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $author_id)
    {
        $updateData = $request->validate([
            'author_name' => 'required|max:255',
            'author_image' => 'required|max:255',
            'author_description' => 'required|max:2000',
        ]);
        Author::where('author_id',"=",$author_id)->update($updateData);
        alert()->success('Success','Author have been updated.');
        return redirect('/admin/author');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $author_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($author_id)
    {
        $author = Author::findOrFail($author_id);
        $author->delete();
        alert()->success('Success','Author have been deleted.');
        return redirect('/admin/author')->with('completed', 'Author has been deleted');
    }
}
