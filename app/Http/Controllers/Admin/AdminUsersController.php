<?php

namespace App\Http\Controllers\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cities = City::get();
        return view('admin.user.user_edit', compact('user'), ['cities' => $cities]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'user_city' => 'required',
        ]);
        User::where('id',"=",$id)->update($updateData);
        alert()->success('Success','User have been updated.');
        return redirect('/admin/admin');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->success('Success','User have been deleted.');
        return redirect('/admin/admin');
    }
}
