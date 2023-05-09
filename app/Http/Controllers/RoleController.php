<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    // public function index()
    // {
    //     $role = Role::all();
    //     $permission = Permission::all();
    //     $dataku = Role::with('permissions')->orderBy('id', 'DESC')->get();

    //     return view('views.hakAkses', ['dataku' => $dataku, 'permissionku' => $permission]);
    // }

    public function get()
    {
        $roles = Role::with('permissions')->orderBy('id', 'DESC')->get();
        return DataTables::of($roles)->make(true);
        // return response()->json($roles);
    }

    public function getById($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();
        if ($role) {

            return response()->json(['success' => 'Data tersedia', $role]);
        } else {
            return response()->json(['error' => 'Data Tidak tersedia']);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->permission);

        return response()->json(['success' => 'Data Berhasil Disimpan']);
    }

    public function delete($id)
    {
        $role = Role::find($id)->delete();
        // $role->delete();
        return response()->json(['suksess' => 'Data Berhasil Dihapus']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));
        return redirect()->route('hakakses.index');
    }
}
