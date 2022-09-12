<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['first_section'] =  Section::first();
        $data['sections'] =  Section::where('id' ,'!=', 6)->take(8)->get();
        return view('welcome',$data);
    }

    public function showSection($slug)
    {
        $section = Section::where('slug',$slug)->firstOrFail();

        $meals   =  Meal::with('section')->where('section_id',$section->id)->latest()->paginate(2);
        $section_name = Section::where('slug',$slug)->select('name_ar','name_he')->get();


        return view('meals',compact('meals','section_name'));

    }

    public function showMeal($slug)
    {
        $meal = Meal::where('slug',$slug)->firstOrFail();
        return view('meal-show',compact('meal'));

    }
}
