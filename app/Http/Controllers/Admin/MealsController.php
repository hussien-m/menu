<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageMeal;
use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class MealsController extends Controller
{
    public function index()
    {
        $data['page_name'] = __('dashboard.sec-name');
        $data['createRoute'] = route('meals.create');
        $data['meals']  = Meal::get();

        return view('admin.meals.index', $data);
    }


    public function create()
    {
        $data['page_name']   = __('dashboard.add_new_meals');
        $data['createRoute'] = route('meals.create');
        $data['sections']   = Section::get();
        return view('admin.meals.create',$data);
    }


    public function store(Request $request)
    {
        $request->except('_token','_method');



        if ($request->hasfile('files')) {

            $meal= Meal::create([
                'name_ar' => $request->name_ar,
                'name_he' => $request->name_he,
                'slug' => $request->slug,
                'section_id' => $request->section_id,
                'price' => $request->price,
                'description_ar' => $request->description_ar,
                'description_he' => $request->description_he
            ]);

            foreach ($request->file('files') as $image) {

                $meal_image = new ImageMeal();

                $name = $image->getClientOriginalName();

                $name = Str::random(3). time() . '.' . $name;

                $image->move('images/meals', $name);

                $meal_image->image = $name;

                $meal_image->meal_id = $meal->id;

                $meal_image->save();
            }
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
        $meal  = Meal::findOrFail($id);
        $images = ImageMeal::where('meal_id',$meal->id)->get();


        $meal->name_ar = $request->name_ar;
        $meal->name_he = $request->name_he;
        $meal->description_he = $request->description_he;
        $meal->description_ar = $request->description_ar;
        $meal->slug = $request->slug;
        $meal->price = $request->price;
        $meal->save();

        if ($request->hasfile('files')) {
            foreach($images as $image){

                if(File::exists($img=public_path('images'.DIRECTORY_SEPARATOR.'meals'.DIRECTORY_SEPARATOR.$image->image))){

                   File::delete($img);

                }

            }

            foreach ($request->file('files') as $image) {

                $meal_image = new ImageMeal();

                $name = $image->getClientOriginalName();

                $name = Str::random(3). time() . '.' . $name;

                $image->move('images/meals', $name);

                $meal_image->image = $name;

                $meal_image->meal_id = $meal->id;

                $meal_image->save();
            }
        }
        toast('تمت التعديل بنجاح','success');
        return redirect()->route('meals.index');
    }



    public function destroy($id)
    {
        $meal  = Meal::findOrFail($id);
        $images = ImageMeal::where('meal_id',$meal->id)->get();
        foreach($images as $image){

            if(File::exists($img=public_path('images'.DIRECTORY_SEPARATOR.'meals'.DIRECTORY_SEPARATOR.$image->image))){

               File::delete($img);

            }

        }

         $meal->delete();
    }
}
