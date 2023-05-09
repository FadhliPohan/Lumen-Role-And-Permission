<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        // if(auth()->user()->hasRole('superadmin')){
        $datas = Users::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate();
        return view('views.userrole' ,compact('datas', 'keyword'));
    }

    public function store(Request $request)
    {
        $user= Users::where('id',$request->id);
        $user->assignRole($request->input('roles'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        // dd($roles);
       
        return view('views.userrole-edit',compact('user','roles','userRole'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Users::find($id);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('userrole.index');
        // return $this->index($request);

        // return view('views.userrole');
    }
}
