<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_name'] = __('dashboard.sec-name');
        $data['createRoute'] = route('sections.create');
        $data['sections']  = Section::get();

        return view('admin.sections.index', $data);
    }


    public function create()
    {
        $data['page_name'] = __('dashboard.add_new_section');
        $data['createRoute'] = route('sections.create');
        return view('admin.sections.create',$data);
    }


    public function store(Request $request)
    {
        $request->validate([

            'name_ar' => 'required',
            'name_hr' => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug'             =>'required',

        ]);

       

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images".DIRECTORY_SEPARATOR."sections"), $imageName);
            $request->image = $imageName;
        }

        Section::create([
            'name_ar' => $request->name_ar,
            'name_he' => $request->name_he,
            'slug' => $request->slug,
            'image' => $request->image,

        ]);

        toast('تمت الاضافة بنجاح','success');
        return redirect()->route('sections.index');
    }


    public function show($id)
    {
        $data['page_name'] = __('dashboard.edit_section');
        $data['createRoute'] = route('sections.create');
        $data['section'] = Section::findOrFail($id);
       // return view('admin.sections.edit',$data);
    }


    public function edit($id)
    {

        $data['page_name'] = __('dashboard.edit_section');
        $data['createRoute'] = route('sections.create');
        $data['section'] = Section::findOrFail($id);
        return view('admin.sections.edit',$data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'name_ar' => 'required|max:255',
            'name_hr' => 'required|max:255',
            'slug'             =>'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $section= Section::findOrFail($id);
        $image = public_path('images'.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.$section->image);

        if ($request->hasFile('image')) {

            if(File::exists($image)){
                File::delete($image);
             }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/sections"), $imageName);
            $request->image = $imageName;
            $section->image=$imageName;

        }


        $section->name_ar=$request->name_ar;
        $section->name_he=$request->name_he;
        $section->slug=$request->slug;


        $section->save();

        toast('تمت التعديل بنجاح','success');
        return redirect()->route('sections.index');
    }



    public function destroy($id)
    {
        $type= Section::findOrFail($id);
        $image = public_path('images'.DIRECTORY_SEPARATOR.'sections'.DIRECTORY_SEPARATOR.$type->image);

        if(File::exists($image)) {
         File::delete($image);

         }

         $type->delete();
    }
}
