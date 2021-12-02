<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Http\Requests\AddSettingRequest;
use App\Setting;
use App\Traits\DeleteModelTrait;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
     $this->setting=$setting;   
    }
    public function index()
    {
        $setting=$this->setting->Paginate(3);
        return view('admin.setting.index',compact('setting'));
    }
    public function create(Request $request)
    {

        return view('admin.setting.add',compact('request'));
    }
    public function store(Request $request )
    {
       $this->setting->create([
           'config_key'=>$request->config_key,
           'config_value'=>$request->config_value,
           'type'=>$request->type,
       ]);
       return redirect()->route('settings.index');
    }
    public function edit(Request $request,$id)
    {
        $setting=$this->setting->find($id);
        return view('admin.setting.edit',compact('setting','request'));
    }
    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
           'config_key'=>$request->config_key,
           'config_value'=>$request->config_value,
    
        ]);
        return redirect()->route('settings.index');
       
    }
    public function delete($id)
    {
      
       return $this->deleteModelTraits($id,$this->setting);
    }

}
