<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.create');
    }

    public function manage(){
        $catagories = Category::all();
        return view('admin.category.manage',compact('catagories'));
    }

}
