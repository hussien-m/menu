<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDealRequest;
use App\Http\Requests\CreateMealRequest;
use App\Models\ImageMeal;
use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class MealsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $data['page_name']   = __('dashboard.meals');
        $data['createRoute'] = route('meals.create');
        $data['sections']    = Section::get();

        $data['meals']       = Meal::when($request->has('section_id'),function($query)use($request){
                return $query->where('section_id',$request->section_id);
        })->latest()->get();

        return view('admin.meals.index', $data);
    }


    public function create()
    {
        $data['page_name']   = __('dashboard.add_new_meals');
        $data['createRoute'] = route('meals.create');
        $data['sections']   = Section::get();
        return view('admin.meals.create',$data);
    }

    public function createSame(Request $request)
    {
       // return $request->meal_id;

        $data['meal'] = Meal::findOrFail($request->meal_id);
        $data['page_name']   = __('dashboard.add_new_meals');
        $data['createRoute'] = route('meals.create');
        $data['sections']   = Section::get();
        return view('admin.meals.same',$data);
    }




    public function store(CreateMealRequest $request)
    {
        //dd($request->all());

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images".DIRECTORY_SEPARATOR."meals"), $imageName);
            $request->image = $imageName;
            $meal= Meal::create([
                'name_ar' => $request->name_ar,
                'name_he' => $request->name_he,
                'slug' => $request->slug,
                'section_id' => $request->section_id,
                'price' => $request->price,
                'price_two' => $request->price_two,
                'image' => $imageName,
                'extra' => $request->extra,
                'extra_he' => $request->extra_he,
                'description_ar' => $request->description_ar,
                'description_he' => $request->description_he
            ]);
        }

        toast('تمت الاضافة بنجاح','success');
        return redirect()->route('meals.index');
    }


    public function show($id)
    {
        $data['page_name'] = __('dashboard.edit_meals');
        $data['createRoute'] = route('meals.create');
        $data['meal'] = Meal::findOrFail($id);
        $data['meal']->load('images');
       return view('admin.meals.show',$data);
    }


    public function edit($id)
    {
        $data['page_name'] = __('dashboard.edit_meals');
        $data['createRoute'] = route('meals.create');
        $data['meal'] = Meal::findOrFail($id);
        $data['sections'] =Section::get();
        return view('admin.meals.edit',$data);
    }


    public function update(Request $request, $id)
    {

        $meal= Meal::findOrFail($id);
        $image = public_path('images'.DIRECTORY_SEPARATOR.'meals'.DIRECTORY_SEPARATOR.$meal->image);
        if ($request->hasFile('image')) {

            if(File::exists($image)){
                File::delete($image);
             }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/meals"), $imageName);
            $request->image = $imageName;
            $meal->image=$imageName;

        }

        $meal->name_ar = $request->name_ar;
        $meal->name_he = $request->name_he;
        $meal->description_he = $request->description_he;
        $meal->description_ar = $request->description_ar;
        $meal->slug = $request->slug;
        $meal->price = $request->price;
        $meal->price_two = $request->price_two;
        $meal->extra = $request->extra;
        $meal->save();

        toast('تمت التعديل بنجاح','success');
        return redirect()->route('meals.index');
    }



    public function destroy($id)
    {
        $meal  = Meal::findOrFail($id);

            if(File::exists($img=public_path('images'.DIRECTORY_SEPARATOR.'meals'.DIRECTORY_SEPARATOR.$meal->image))){
               File::delete($img);
            }

        $meal->delete();
    }
}
