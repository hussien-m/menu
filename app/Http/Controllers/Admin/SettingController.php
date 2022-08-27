<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['createRoute']  = route('admin.settings');
        $data['settings'] = DB::table('settings')->first();
        $data['page_name']='عرض الاعدادات';
        $data['requestIs']   = url()->current();
        return view('admin.setting.index',$data);
    }

    public function store(Request $request)
    {
       $settings =  $request->validate([
            'site_name'             =>'required',
            'site_status'           =>'required',
            'message_site_status'   =>'required',
            'meta_tags'             =>'required',
            'meta_description'      =>'required',
            'facebook'              =>'required',
            'tiwtter'               =>'required',
            'instagram'             =>'required',
            'wifi_password'         =>'required',
            'wifi_name'             =>'required',
            'logo_iamge'            =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_image'          =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('banner_image') && $request->hasFile('logo_iamge') ) {


            $imagePath = $request->file('banner_image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("banner_image")->extension();
            $path = $request->file('banner_image')
                ->move(public_path("images".DIRECTORY_SEPARATOR."settings"), $imageName);
            $request->banner_image = $imageName;

            $imagePath = $request->file('logo_iamge');
            $imageName2 = time() . '-' . $request->user_name . '.' . $request->file("logo_iamge")->extension();
            $path = $request->file('logo_iamge')
                ->move(public_path("images".DIRECTORY_SEPARATOR."settings"), $imageName2);
            $request->logo_iamge = $imageName2;

            $settings['banner_image']  = $imageName;
            $settings['logo_iamge']    = $imageName2;
            DB::table('settings')->update($settings);

        }



        toast('تم حفظ الاعدادت','success');
        return redirect()->route('admin.settings');

    }

    public function clearCache()
    {
        Artisan::call('optimize');
        Artisan::call('optimize:clear');
        return response()->json(['response'=>'success'],200);
    }

}
