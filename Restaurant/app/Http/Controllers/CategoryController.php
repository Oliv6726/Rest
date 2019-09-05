<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Pages
     */
    public function create(){
        return view('admin.category.create');
    }

    public function edit($id){
        $category = Category::whereid($id)->get();
        return view('admin.category.edit', [
            'categories' => $category,
        ]);
    }

    public function list(){
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.list', [
            'categories' => $categories,
        ]);
    }

    /**
     * Update, change, delete...
     */

    public function update(Request $request){

    }
    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'category-name' => 'required|min:2|max:30',
            'category-items' => 'required',
            'category-picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()){
            return redirect('/admin/category/create')
            ->withInput()
            ->withErrors($validator);
        }

        $random = mt_rand(00000, 99999);
        $file = $request->file('category-picture');
        $image_file = $file->openFile()->fread($file->getSize());

        Category::create([
            'category_id' => $random,
            'category_name' => Input::get('category-name'),
            'category_items' => Input::get('category-items'),
            'category_picture' => $image_file,
        ]);

        $message = [
            'success' => true,
            'message' => 'Successfully added category',
        ];

        return redirect('/admin/category/create')->with($message);
    }
}
