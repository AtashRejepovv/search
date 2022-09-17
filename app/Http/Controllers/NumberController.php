<?php

namespace App\Http\Controllers;

use App\Batalion;
use App\Battalion;
use App\Kathedra;
use App\Number;
use App\PhoneType;
use App\Platoon;
use App\Position;
use App\Rank;
use App\Rota;
use App\Service;
use DemeterChain\B;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:users');
    }

    public function index(){

        $phone_types = PhoneType::all();
        $kathedras = Kathedra::all();
        $batalions = Battalion::all();
        return view('number.index')->with([
            'phone_types' => $phone_types,
            'kathedras' => $kathedras,
            'batalions' => $batalions,
        ]);
    }

    public function create(){

        $phone_types = PhoneType::all();
        $kathedras = Kathedra::all();
        $batalions = Battalion::all();
        $rotas = Rota::all();
        $platoons = Platoon::all();
        $services = Service::all();
        $positions = Position::all();
        $ranks = Rank::all();

        return view('number.create')->with([
            'phone_types' => $phone_types,
            'kathedras' => $kathedras,
            'batalions' => $batalions,
            'rotas' => $rotas,
            'platoons' => $platoons,
            'services' => $services,
            'positions' => $positions,
            'ranks' => $ranks,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'last_name'=>'required',
            'first_name'=>'required',
        ]);

        $number = new Number();
        $number->slug = str_random('9');
        $number->last_name = $request->last_name;
        $number->first_name = $request->first_name;
        $number->father_name = $request->father_name;
        $number->phone_type_id = $request->phone_type;
        $number->phone = $request->phone;
        $number->kathedra_id = $request->kathedra;
        $number->battalion_id = $request->batalion;
        $number->rota_id = $request->rota;
        $number->platoon_id = $request->platoon_id;
        $number->service_id = $request->service;
        $number->position_id = $request->position;
        $number->rank_id = $request->rank;
        $number->save();

        return redirect()->route('numbers')->with([

        ]);
    }

    public function delete($number_id){
        $number = Number::find($number_id);
        $number->delete();
        return redirect()->route('numbers')->with([
            'success'=>'Ulanyjy '.$number->last_name.' '.$number->first_name.' pozuldy',
        ]);
    }

    public function edit($number_id){

        $number = Number::findOrFail($number_id);

        $phone_types = PhoneType::all();
        $kathedras = Kathedra::all();
        $batalions = Battalion::all();
        $rotas = Rota::all();
        $platoons = Platoon::all();
        $services = Service::all();
        $positions = Position::all();
        $ranks = Rank::all();

        return view('number.edit')->with([
            'number'=>$number,
            'phone_types' => $phone_types,
            'kathedras' => $kathedras,
            'batalions' => $batalions,
            'rotas' => $rotas,
            'platoons' => $platoons,
            'services' => $services,
            'positions' => $positions,
            'ranks' => $ranks,
        ]);
    }

    public function update($number_id,Request $request){

        $request->validate([
            'last_name'=>'required',
            'first_name'=>'required',
        ]);

        $number = Number::findOrFail($number_id);
        $number->slug = str_random('9');
        $number->last_name = $request->last_name;
        $number->first_name = $request->first_name;
        $number->father_name = $request->father_name;
        $number->phone_type_id = $request->phone_type;
        $number->phone = $request->phone;
        $number->kathedra_id = $request->kathedra;
        $number->battalion_id = $request->batalion;
        $number->rota_id = $request->rota;
        $number->service_id = $request->service;
        $number->position_id = $request->position;
        $number->rank_id = $request->rank;
        $number->save();

        return redirect()->route('numbers')->with([
            'success'=>'Ulanyjy üýtgedildi',
        ]);
    }

    public function getNumbersApi(Request $request)
    {
        $columns = array(
            "numbers.id",
            "numbers.last_name",
            "numbers.phone_type_id",
            "numbers.phone",
            "numbers.position_id",
            "numbers.rank_id",
            "numbers.kathedra_id",
            "numbers.battalion_id",
            "numbers.rota_id",
            "numbers.service_id",
        );

        $totalData = 500254 + Number::all()->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        if(empty($request->input('search.value')))  {
            $numbers = Number::where(function($query)use($request){
                if($search = $request->input('search')){
                    $query->where('first_name','like',"%{$search}%")
                        ->orWhere('last_name','like',"%{$search}%")
                        ->orWhere('phone','like',"%{$search}%")
                        ->orWherehas('kathedra',function ($query1) use ($search){
                        $query1->where('name','like', "%{$search}%");})
                        ->orWherehas('phone_type',function ($query1) use ($search){
                        $query1->where('name','like', "%{$search}%");})
                        ->orWherehas('batalion',function ($query1) use ($search) {
                            $query1->where('number', 'like', "%{$search}%");})
                        ->orWherehas('service',function ($query1) use ($search) {
                        $query1->where('name', 'like', "%{$search}%");
                    });
                };
                if($first_name = $request->input('first_name')){
                    $query->where('first_name','like',"%{$first_name}%");
                };
                if($last_name = $request->input('last_name')){
                    $query->where('last_name','like',"%{$last_name}%");
                };
                if($phone = $request->input('phone')){
                    $query->where('phone','like',"%{$phone}%");
                };
                if($phone_type = $request->input('phone_type')){
                    $query->wherehas('phone_type',function ($query1) use ($phone_type){
                        $query1->where('name','like', "%{$phone_type}%");
                    });
                };
                if($kathedra = $request->input('kathedra')){
                    $query->wherehas('kathedra',function ($query1) use ($kathedra){
                        $query1->where('name','like', "%{$kathedra}%");
                    });
                };
                if($batalion = $request->input('batalion')){
                    $query->wherehas('batalion',function ($query1) use ($batalion){
                        $query1->where('number','like', "%{$batalion}%");
                    });
                };
                if($rota = $request->input('rota')){
                    $query->wherehas('rota',function ($query1) use ($rota){
                        $query1->where('number','like', "%{$rota}%");
                    });
                };
                if($service = $request->input('service')){
                    $query->wherehas('service',function ($query1) use ($service){
                        $query1->where('name','like', "%{$service}%");
                    });
                };
                if($position = $request->input('position')){
                    $query->wherehas('position',function ($query1) use ($position){
                        $query1->where('name','like', "%{$position}%");
                    });
                };
                if($rank = $request->input('rank')){
                    $query->wherehas('rank',function ($query1) use ($rank){
                        $query1->where('name','like', "%{$rank}%");
                    });
                };

            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Number::where(function($query)use($request){
                if($search = $request->input('search')){
                    $query->where('first_name','like',"%{$search}%")
                        ->orWhere('last_name','like',"%{$search}%")
                        ->orWhere('phone','like',"%{$search}%")
                        ->orWherehas('kathedra',function ($query1) use ($search){
                            $query1->where('name','like', "%{$search}%");})
                        ->orWherehas('phone_type',function ($query1) use ($search){
                            $query1->where('name','like', "%{$search}%");})
                        ->orWherehas('batalion',function ($query1) use ($search) {
                            $query1->where('number', 'like', "%{$search}%");})
                        ->orWherehas('service',function ($query1) use ($search) {
                            $query1->where('name', 'like', "%{$search}%");
                        });
                };
                if($first_name = $request->input('first_name')){
                    $query->where('first_name','like',"%{$first_name}%");
                };
                if($last_name = $request->input('last_name')){
                    $query->where('last_name','like',"%{$last_name}%");
                };
                if($phone = $request->input('phone')){
                    $query->where('phone','like',"%{$phone}%");
                };
                if($phone_type = $request->input('phone_type')){
                    $query->wherehas('phone_type',function ($query1) use ($phone_type){
                        $query1->where('name','like', "%{$phone_type}%");
                    });
                };
                if($kathedra = $request->input('kathedra')){
                    $query->wherehas('kathedra',function ($query1) use ($kathedra){
                        $query1->where('name','like', "%{$kathedra}%");
                    });
                };
                if($battalion = $request->input('battalion')){
                    $query->wherehas('battalion',function ($query1) use ($battalion){
                        $query1->where('number','like', "%{$battalion}%");
                    });
                };
                if($rota = $request->input('rota')){
                    $query->wherehas('rota',function ($query1) use ($rota){
                        $query1->where('number','like', "%{$rota}%");
                    });
                };
                if($service = $request->input('service')){
                    $query->wherehas('service',function ($query1) use ($service){
                        $query1->where('name','like', "%{$service}%");
                    });
                };
                if($position = $request->input('position')){
                    $query->wherehas('position',function ($query1) use ($position){
                        $query1->where('name','like', "%{$position}%");
                    });
                };
                if($rank = $request->input('rank')){
                    $query->wherehas('rank',function ($query1) use ($rank){
                        $query1->where('name','like', "%{$rank}%");
                    });
                };

            })->count();
        }else{
            $numbers = Number::where(function($query)use($request){
                if($first_name = $request->input('first_name')){
                    $query->where('name',$first_name);
                }
            })->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Number::count();
        }
        $data = array();
        if ($numbers) {
            foreach ($numbers as $number) {
                $nestedData['full_name'] = $number->last_name.' '.$number->first_name;
                $nestedData['phone_type'] = $number->phone_type->name;
                $nestedData['phone'] = $number->phone;
                $nestedData['kathedra'] = $number->kathedra?$number->kathedra->name:"-";
                $nestedData['batalion'] = $number->batalion?$number->batalion->number:"-";
                $nestedData['rota'] = $number->rota?$number->rota->number:"-";
                $nestedData['service'] = $number->service?$number->service->name:"-";
                $nestedData['position'] = $number->position?$number->position->name:"-";
                $nestedData['rank'] = $number->rank?$number->rank->name:"-";

                $nestedData['operations'] = '<a onclick="return confirm(\'Вы уверены?\')" class="btn btn-danger" href="' . route('number.delete', ['number_id' => $number->id]) . '"> <i class="fa fa-trash"></i>  
                                               </a> 
                                               <a class="btn btn-primary btn-md" href="' . route('number.edit', ['number_id' => $number->id]) . '"><i class="fa fa-edit"></i>
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
