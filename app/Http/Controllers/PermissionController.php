<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        // $datas = Permission::all();
        // return view('permission.index',compact('datas'));

        return view('views.permission');
    }

    public function get()
    {
        $data = Permission::orderBy('id', 'DESC')->get();
        return DataTables::of($data)->make(true);
    }


    public function store(Request $request)
    {
        $model = new Permission;
        if ($request->id != 0 && Permission::find($request->id) != null) {
            $model = Permission::find($request->id);
        }

        $model->name = $request->name;
        $model->save();

        return response()->json(['success' => 'Data berhasil ditambah']);
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function getById($id)
    {
        $permis = Permission::where('id', $id)->first();
        return response()->json(['data' => $permis]);
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required'
        // ]);

        $input = $request->all();

        $update = [
            'name' => $request->name
        ];

        Permission::where('id', $id)->update($update);
        return response()->json(['success' => 'Data berhasil diedit']);
    }
}
