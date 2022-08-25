<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Section;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['page_name'] = null;
        $data['createRoute'] = "#";

        $data['sections'] = Section::get();
        $data['meals'] = Meal::latest()->paginate(5);
        $data['users'] = User::get();

       return view('admin.dashboard',$data);
    }

    public function changePassword()
    {
        $data['page_name'] = "تغيير كلمة المرور";
        $data['createRoute'] = "#";
        return view("admin.admin.password",$data);
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate( [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;

            $user = User::findOrFail($c_id);

            if (Hash::check($request->current_password, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                toast('تم تحديث كلمة المرور','success');
                return redirect()->back();
            } else {
                toast('كلمة المرور غير متطابقة','warning');
                return redirect()->back();
            }
        } catch (Exception $e) {
            toast($e->getMessage(),'warning');
            return redirect()->back();
        }
    }
}
