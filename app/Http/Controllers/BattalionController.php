<?php

namespace App\Http\Controllers;

use App\Battalion;
use Illuminate\Http\Request;

class BattalionController extends Controller
{
    public function store(Request $request){

        if($request->has('number'))
        {
            $battalion = new Battalion;
            $battalion->number = $request->number;
            $battalion->save();
        }
        return redirect()->route('studentConfigure');
    }

    public function delete($battalion_id){

        $battalion = Battalion::find($battalion_id);
        $battalion->delete();
        return redirect()->route('studentConfigure');
    }


    public function getBattalionsApi(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 =>  'number',
        );

        $totalData = Battalion::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value')))  {

            $battalions = Battalion::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Battalion::count();
        }else

        {
            $search= $request->input('search.value');
            $battalions = Battalion:: where('name','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Teacher::count();
        }
        $data = array();
        if ($battalions) {
            foreach ($battalions as $battalion) {
                $nestedData['id'] = $battalion->id;
                $nestedData['number'] = $battalion->number;
                $nestedData['operations'] =  '<a onclick="return confirm(\'Are you sure?\')" class="btn btn-danger" href="'.route('battalion.delete',['battalion_id'=>$battalion->id]).'"> <i class="fa fa-trash"></i>  
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
