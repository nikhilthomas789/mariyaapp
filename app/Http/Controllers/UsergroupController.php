<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Usergroup;
use App\Models\Admin;
use App\Models\Userrights;
use App\Models\Menu;
use Inertia\Inertia;
use Yajra\DataTables\DataTables;

class UsergroupController extends BaseController
{


  public function create(Request $request, $id = "")
  {   
    if ($id != "") {
      $usergroup = Usergroup::find($id);
      $message = "usergroup updated successfully";
    } else {
      $usergroup = new Usergroup;
      $message = "usergroup created successfully";
    }

    if ($request->isMethod('post')) {

      $data = $request->validate(['name' => "required|unique:usergroups,name".$usergroup->id]);
      $usergroup->name = $data['name'];
      $usergroup->save();
    }
    return Inertia::render('Usergroup',['data'=>$usergroup,'message'=>$message]);
  }


  public function list()
  {
    $data=$this->load();

   // return Inertia::render('List',json_decode($data));

    
    return Inertia::render('List');
  }
  public function load(){
    return datatables()->of(Usergroup::query())->make(true);
    //return DataTables::of(Usergroup::select('id','name'))->make(true);
  }

  public function permission(Request $request, $id)
  {


    $data = Menu::where('parent_id', '=', 0)->get();



    $request->session()->forget('success');

    $menu_permissions = json_encode($request->menu_id);

    if ($request->isMethod('post')) {
      $userrights = Userrights::where('user_id', $id)->first();
      if ($userrights == null) {
        $userrights = new Userrights;
      }

      $userrights->menu_id = $menu_permissions;
      $userrights->user_id = $id;
      $userrights->save();
    }

    $userrights = Userrights::where('user_id', $id)->first();

    $permissions = [];
    if ($userrights != null) {
      if ($userrights->count() > 0) {
        $permissions = json_decode($userrights->menu_id);
        $userrights->menu_id = $permissions;
      }
    }
    return view('admin.usergroup.permission', ['data' => $data, 'val' => $permissions]);
  }

  public function status(Request $request, $id)
  {
    $usergroup = Usergroup::find($id);
    if ($usergroup['status'] == "0") {
      $usergroup->status = "1";
      $usergroup->save();
      $message = "usergroup activated successfully";
      $request->session()->flash('success', $message);
    } else {
      $usergroup->status = "0";
      $usergroup->save();
      $message = "usergroup deactivated";
      $request->session()->flash('danger', $message);
    }



    return redirect()->intended('admin/usergroup/list');
  }

  public function delete(Request $request, $id)
  {

   // $exists = User::find()->where( [ 'user_group_id' => $id ] )->exists();



    $count = Admin::where('usergroup_id', $id)->count();

    if($count==0)
    {
      $usergroup = Usergroup::find($id)->delete();
      $message = "usergroup deleted successfully";
      $request->session()->flash('success', $message);
    }
    else
    {
      $message = "Can't Delete ! User Exists Under This Group";
      $request->session()->flash('danger', $message);
    }

    return redirect()->intended('admin/usergroup/list');
  }


}
