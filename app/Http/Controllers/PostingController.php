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
    public function index($id)
    {
        $post=Tin::find($id);
        // dd($post->images);
        return view('UserHome.pages.postingdetail', compact('post'));
    }
}
