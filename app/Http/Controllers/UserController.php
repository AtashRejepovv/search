<?php

namespace App\Http\Controllers;

use App\Position;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:users');
    }

    public function index(){
        $positions = Position::all();
        return view('user.users')->with([
            'positions' => $positions,
        ]);
    }

    public function create(){
        $roles = Role::all();
        return view('user.create')->with([
            'roles' => $roles
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'last_name'=>'required',
            'first_name'=>'required',
            'login'=>'required|unique:users',
            'password'=>'required',
        ]);

        $user = new User;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->status = $request->status=='on'?1:0;
        $user->save();


        return redirect()->route('users')->with([
            'success'=>'Ulanyjy '.$user->last_name.' '.$user->first_name.' goşuldy',
        ]);
    }

    public function delete($user_id){
        $user = User::find($user_id);
        $user->delete();
        return redirect()->route('users')->with([
            'success'=>'Ulanyjy '.$user->last_name.' '.$user->first_name.' pozuldy',
        ]);
    }

    public function block($user_id){

        $user = User::find($user_id);
        $user->status = 0;
        $user->save();

        return redirect()->route('users')->with([
            'success'=>'Ulanyjy '.$user->last_name.' '.$user->first_name.' ýapyldy',
        ]);
    }

    public function open($user_id){

        $user = User::findOrFail($user_id);
        $user->status = 1;
        $user->save();

        return redirect()->route('users')->with([
            'success'=>'Ulanyjy '.$user->last_name.' '.$user->first_name.' açyldy',
        ]);
    }

    public function edit($user_id){

        $roles = Role::all();
        $user = User::findOrFail($user_id);

        return view('user.edit')->with([
            'user'=>$user,
            'roles'=>$roles,
        ]);
    }

    public function update($user_id,Request $request){
        $request->validate([
            'last_name'=>'required',
            'first_name'=>'required',
            'login'=>'required',
        ]);
        $user = User::findOrFail($user_id);
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->status = $request->status=='on'?1:0;
        $user->save();


        return redirect()->route('users')->with([
            'success'=>'Ulanyjy üýtgedildi',
        ]);
    }

    public function user_profile($user_id){
        $user=User::findOrFail($user_id);
        return view('user.user_profile')->with([
            'user'=>$user,
        ]);
    }

    public function getUsersApi(Request $request)
    {
        $columns = array(
            "users.last_name",
            "users.first_name",
            "users.status",
            "users.status",
        );

        $totalData = User::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        if(empty($request->input('search.value')))  {
            $users = User::where(function($query)use($request){
                if($first_name = $request->input('first_name')){
                    $query->where('first_name','like',"%{$first_name}%");
                };
                if($last_name = $request->input('last_name')){
                    $query->where('last_name','like',"%{$last_name}%");
                };
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = User::count();
        }else{
            $users = User::where(function($query)use($request){
                if($first_name = $request->input('first_name')){
                    $query->where('name',$first_name);
                }
            })->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = User::count();
        }
        $data = array();
        if ($users) {
            foreach ($users as $user) {
                $nestedData['full_name'] = $user->last_name.' '.$user->first_name;
                $nestedData['role'] = $user->role->name;
                $nestedData['status'] = $user->status==1?"<p class='text-success'>Açyk</p>":"<p class='text-danger'>Ýapyk</p>";
                if($user->status==1) {
                    $lock ='<a class="btn btn-info" href="'.route('user.block', ['user_id' => $user->id]).'"> <i class="fa fa-unlock"></i>  
                        </a>&nbsp;';
                }
                else {
                    $lock = '<a class="btn btn-info" href="'.route('user.open', ['user_id' => $user->id]).'"> <i class="fa fa-lock"></i>  
                        </a>&nbsp;';
                }

                $nestedData['operations'] = $lock . '<a onclick="return confirm(\'Вы уверены?\')" class="btn btn-danger" href="' . route('user.delete', ['user_id' => $user->id]) . '"> <i class="fa fa-trash"></i>  
                                               </a> 
                                               <a class="btn btn-primary btn-md" href="' . route('user.edit', ['user_id' => $user->id]) . '"><i class="fa fa-edit"></i>
                                               </a> &nbsp;';

                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

}
