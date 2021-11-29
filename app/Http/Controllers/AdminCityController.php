<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Apartmentnumber;
class AdminCityController extends Controller
{
    private $city;
    private $province;
    private $wards;
    private $feeship;
    public function __construct(City $city,Province $province,Wards $wards,Apartmentnumber $apartmentnumber)
    {
          $this->city=$city;
          $this->province=$province;
          $this->wards=$wards;
          $this->apartmentnumber=$apartmentnumber;
    }
    public function index()
    {
        $city=$this->apartmentnumber->all();

        return view('admin.city.index',compact('city'));
    }
    public function add()
    {
        $city=$this->city->all();
        return view('admin.city.add',compact('city'));
    }
    public function select_delivery(Request $request)
    {
          $data=$request->all();
          if ($data['action']) {
          	$output='';
          	     if ($data['action']=="city") {
          	     	$select_province=Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
			          	$output.='<option>----Chọn quận huyện-----</option>';
			          	foreach ($select_province as $key => $province){
			          		$output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
			          	                                                }
                                            }else{
          	$select_wards=Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
          	$output.='<option>----Chọn xa phuong-----</option>';
          	foreach ($select_wards as $key => $ward){
          		$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
          	                                         }
          	                                     }

                               }
          echo $output;
    }
    // public function insert_delivery(Request $request)
    // {
    //   $data=$request->all();
    //   $fee_ship=new Feeship();
    //   $fee_ship->fee_matp=$data['city'];
    //   $fee_ship->fee_maqh=$data['province'];
    //   $fee_ship->fee_xaid=$data['wards'];
    //   $fee_ship->fee_feeship=$data['fee_ship'];
    //   $fee_ship->save();
    // }
    public function store(Request $request)
    {
        $this->apartmentnumber->create([
           'matp'=>$request->city,
           'maqh'=>$request->province,
           'xaid'=>$request->wards,
           'apartmentnumber'=>$request->sonha
        ]);
        return redirect()->route('admin.city.index');
    }
    public function edit($id)
    {
        $apartmentnumber=$this->apartmentnumber->find($id);
        $city=$this->city->all();
        return view('admin.city.edit',compact('city.update','city'));
    }
    public function update($id,Request $request)
    {
        $this->apartmentnumber->find($id)->update([
            'matp'=>$request->city,
            'maqh'=>$request->province,
            'xaid'=>$request->wards,
            'apartmentnumber'=>$request->sonha
        ]);
        return redirect()->route('admin.city.index');
    }
    public function delete($id)
    {
        try {
           $this->apartmentnumber->find($id)->delete();
           return response()->json([
            'code'=>200,
            'message'=>'fail'

        ],status:200);
        } catch (\Exception $exception) {
            
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'

            ],status:500);
        } 
    }
}
