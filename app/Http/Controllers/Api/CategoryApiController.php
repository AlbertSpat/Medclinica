<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
class CategoryApiController extends Controller
{
    public function index(){
       // return Category::all();
        return CategoryResource::collection(Category::all());
    }

}
