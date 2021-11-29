<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\storageImageTrait;

use Illuminate\Support\Facades\DB;
use Log;
class AdminSliderController extends Controller
{
    use storageImageTrait;
    public function index()
    {
        $slider=Slider::all();
        return view('admin.slider.index',compact('slider'));
    }
    public function add()
    {
        return view('admin.slider.add');
    }
    public function store(Request $request)
    {
        
        try {
            $dataInsert=[
                'name'=>$request->name,
                'discription'=>$request->description,
      
              ];
              $dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
              if (!empty($dataImageSlider)) {
                 $dataInsert['image_name']=$dataImageSlider['file_name'];
                 $dataInsert['image_path']=$dataImageSlider['file_path'];
              }
              Slider::create($dataInsert);
              return redirect()->route('admin.slider.index');
              
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
        
    }

    public function edit($id)
    {
        $slider=Slider::find($id);

        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request, $id)
    {
        try {
            $dataUpdate=[
                'name'=>$request->name,
                'discription'=>$request->description,
      
              ];
              $dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
              if (!empty($dataImageSlider)) {
                 $dataUpdate['image_name']=$dataImageSlider['file_name'];
                 $dataUpdate['image_path']=$dataImageSlider['file_path'];
              }
              Slider::find($id)->update($dataUpdate);
              return redirect()->route('admin.slider.index');
              
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
        
        try {
            Slider::find($id)->delete();
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
