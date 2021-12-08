<?php

namespace App\Http\Controllers;

use App\Models\Apartmentnumber;
use App\Models\City;
use App\Models\HousingType;
use App\Models\InforUserPosting;
use App\Models\Need;
use App\Models\Province;
use App\Models\QuantityDayPost;
use App\Models\Tin;
use App\Models\Tinimage;
use App\Models\Wards;
use App\Traits\storageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostingController extends Controller
{
    use storageImageTrait;
    private $city;
    private $province;
    private $wards;
    private $feeship;
    private $tin;
    private $tinimage;
    public function __construct(City $city, Province $province, Wards $wards, Apartmentnumber $apartmentnumber, Tin $tin, Tinimage $tinimage)
    {
        $this->city = $city;
        $this->province = $province;
        $this->wards = $wards;
        $this->apartmentnumber = $apartmentnumber;
        $this->tin = $tin;
        $this->tinimage = $tinimage;
    }
    public function create()
    {
        $city = $this->city->all();
        $housingtypes= HousingType::all();
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                $needs[]= $data;
            }
        }

        // dd($data);
        $daypost= QuantityDayPost::all();
        return view('UserHome.pages.posting', 
        compact('city', 'housingtypes', 'needs', 'daypost'));
    }
    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>----Chọn quận huyện-----</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else if ($data['action'] == "province") {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>----Chọn xa phuong-----</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name_xaphuong . '</option>';
                }
            } 
            
        }
        echo $output;
    }
    public function select_day(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $quatity=QuantityDayPost::where('id', $request->id)->first();
        $output='';
        $output .= $quatity->price;
        echo $output;
    }
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $infor= InforUserPosting::create([
                'name'=> $request->nameuser,
                'email'=> $request->email,
                'phone'=> $request->phone
            ]);
            $dataTinCreate=[
                'user_id'=>auth()->id(),
                'housingtype_id'=> $request->housingtype,
                'need_id'=> $request->need,
                'title'=> $request->title,
                'numberhouse'=>$request->sonha,
                'quantityfloor'=>$request->quantityfloor,
                'quantitybed'=>$request->quantitybed,
                'quantitybath'=>$request->quantitybath,
                'description'=>$request->description,
                'price'=>$request->price,
                'matp'=>$request->city,
                'maqh'=>$request->province,
                'xaid'=>$request->wards,
                'large'=>$request->dientich,
                'inforuser_id'=> $infor->id,
                'quantity_daypost_id'=> $request->quantity_daypost,
                'daypost'=>$request->daypost
                ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, fieldName: 'feature_image', foderName: 'tin');
            if (!empty($dataUploadFeatureImage)) {
                $dataTinCreate['image'] = $dataUploadFeatureImage['file_name'];
                $dataTinCreate['image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $tin = $this->tin->create($dataTinCreate);


            // Insert data của tin image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, foderName: 'tin');
                    $tin->images()->create([

                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('tin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $city = $this->city->all();
        $housingtypes= HousingType::all();
        $daypost= QuantityDayPost::all();
        $tin = $this->tin->find($id);
        $housingtyped= $tin->housingtype_id;
        $needed= $tin->need_id;
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                $needs[]= $data;
            }
        }
        return view('UserHome.pages.editposting', compact('tin', 'city', 'housingtypes', 'needs', 'daypost', 'needed', 'housingtyped'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $tin= $this->tin->find($id);
            $infor = InforUserPosting::where('id',$tin->inforuser_id)->update([
                'name'=> $request->nameuser,
                'email'=> $request->email,
                'phone'=> $request->phone
            ]);
            $dataTinUpdate=[
                'user_id'=>auth()->id(),
                'housingtype_id'=> $request->housingtype,
                'need_id'=> $request->need,
                'title'=> $request->title,
                'numberhouse'=>$request->sonha,
                'quantityfloor'=>$request->quantityfloor,
                'quantitybed'=>$request->quantitybed,
                'quantitybath'=>$request->quantitybath,
                'description'=>$request->description,
                'price'=>$request->price,
                'matp'=>$request->city,
                'maqh'=>$request->province,
                'xaid'=>$request->wards,
                'large'=>$request->dientich,
                // 'inforuser_id'=> $infor->id,
                'quantity_daypost_id'=> $request->quantity_daypost,
                'daypost'=>$request->daypost
                ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, fieldName: 'feature_image', foderName: 'tin');
            if (!empty($dataUploadFeatureImage)) {
                $dataTinUpdate['image'] = $dataUploadFeatureImage['file_name'];
                $dataTinUpdate['image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->tin->find($id)->update($dataTinUpdate);
            $tin = $this->tin->find($id);
            // dd($products); 

            // Insert data của product image
            if ($request->hasFile('image_path')) {
                $this->tinimage->where('tin_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataTinImageDetail = $this->storageTraitUploadMutiple($fileItem, foderName: 'tin');
                    $tin->images()->create([

                        'image_path' => $dataTinImageDetail['file_path'],
                        'image_name' => $dataTinImageDetail['file_name']
                    ]);
                }
            }


            DB::commit();
            return redirect()->route('tin.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function delete($id)
    {
        try {
            $this->tin->find($id)->delete();
            return response()->json([
                'code' => 200,
                'messsage' => 'Delete success'
            ], status: 200);
        } catch (\Exception $exception) {

            Log::error('Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'messsage' => 'Delete fail'
            ], status: 500);
        }
    }
    public function index($id)
    {
        $post=Tin::find($id);
        // dd($post->images);
        return view('UserHome.pages.postingdetail', compact('post'));
    }
}
