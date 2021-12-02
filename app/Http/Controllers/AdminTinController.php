<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Apartmentnumber;
use App\Tin;
use App\Models\Tinimage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\storageImageTrait;
use Log;
class AdminTinController extends Controller
{
    use storageImageTrait;
    private $city;
    private $province;
    private $wards;
    private $feeship;
    private $tin;
    private $tinimage;
    public function __construct(City $city,Province $province,Wards $wards,Apartmentnumber $apartmentnumber,Tin $tin,Tinimage $tinimage)
    {
          $this->city=$city;
          $this->province=$province;
          $this->wards=$wards;
          $this->apartmentnumber=$apartmentnumber;
          $this->tin=$tin;
          $this->tinimage=$tinimage;
    }
    public function index()
    {
         $tin=$this->tin->paginate(3);
        return view('admin.tin.index',compact('tin'));
    }
    public function create()
    {
        $city=$this->city->all();
        return view('admin.tin.add',compact('city'));
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
                                            }else if($data['action']=="province"){
          	$select_wards=Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
          	$output.='<option>----Chọn xa phuong-----</option>';
          	foreach ($select_wards as $key => $ward){
          		$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
          	                                         }
          	                                                                   }else
                                                                               {
                                                                                $select_sonha=Apartmentnumber::Where('xaid',$data['ma_id'])->orderby('id','ASC')->get();
                                                                          
                                                                                foreach ($select_sonha as $key => $sonha){
                                                                                  $output.='<input class="sonha" id="sonha" name="sonha" value="'.$sonha->apartmentnumber.'">';
                                                                               }
                                                                             }

                               }
          echo $output;
    }


    public function store(Request $request)
    { 
        try {
            DB::beginTransaction();
            $dataTinCreate=[
                'user_id'=>auth()->id(),
                'numberhouse'=>$request->sonha,
                'area'=>$request->area,
                'nhucau'=>$request->nhucau,
                'quantityfloor'=>$request->quantityfloor,
                'quantitybed'=>$request->quantitybed,
                'quantitybath'=>$request->quantitybath,
                'description'=>$request->description,
                'price'=>$request->price,
                'matp'=>$request->city,
                'maqh'=>$request->province,
                'xaid'=>$request->wards,
                'dientich'=>$request->dientich
                
    
                       ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'feature_image',foderName:'tin');
            if (!empty($dataUploadFeatureImage)) {
                $dataTinCreate['image']=$dataUploadFeatureImage['file_name'];
                $dataTinCreate['image_path']=$dataUploadFeatureImage['file_path'];
    
            }
            
            $tin=$this->tin->create($dataTinCreate);
            
            
            // Insert data của tin image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail=$this->storageTraitUploadMutiple( $fileItem,foderName:'tin');
                    $tin->images()->create([
                        
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                    
                }
            }
    
            DB::commit();
            return redirect()->route('tin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function edit($id)
    {
        $city=$this->city->all();
        $tin=$this->tin->find($id);
        return view('admin.tin.edit',compact('tin','city'));

    }
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $dataTinUpdate=[
                'user_id'=>auth()->id(),
                'numberhouse'=>$request->sonha,
                'area'=>$request->area,
                'nhucau'=>$request->nhucau,
                'quantityfloor'=>$request->quantityfloor,
                'quantitybed'=>$request->quantitybed,
                'quantitybath'=>$request->quantitybath,
                'description'=>$request->description,
                'price'=>$request->price,
                'matp'=>$request->city,
                'maqh'=>$request->province,
                'xaid'=>$request->wards,
                'dientich'=>$request->dientich
    
                       ];
                       $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'feature_image',foderName:'tin');
                       if (!empty($dataUploadFeatureImage)) {
                           $dataTinUpdate['image']=$dataUploadFeatureImage['file_name'];
                           $dataTinUpdate['image_path']=$dataUploadFeatureImage['file_path'];
               
                       }
            $this->tin->find($id)->update($dataTinUpdate);
            $tin=$this->tin->find($id);
            // dd($products); 
            
            // Insert data của product image
            if ($request->hasFile('image_path')) {
                $this->tinimage->where('tin_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataTinImageDetail=$this->storageTraitUploadMutiple( $fileItem,foderName:'tin');
                    $tin->images()->create([
                        
                        'image_path'=>$dataTinImageDetail['file_path'],
                        'image_name'=>$dataTinImageDetail['file_name']
                    ]);
                    
                }
            }
    
            
            DB::commit();
            return redirect()->route('tin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
        
        try {
            $this->tin->find($id)->delete();
            return response()->json([
                'code'=>200,
                'messsage'=>'Delete success'
            ],status:200);
        } catch (\Exception $exception) {
            
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'messsage'=>'Delete fail'
            ],status:500);
        } 
    }

}
