<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\SubCategory;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $category       = Category::all();
        $courseCategory = CourseCategory::all();

        return view('users.home', compact('category', 'courseCategory'));
    }
}
