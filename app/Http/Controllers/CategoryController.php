<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Products;
use App\Events\NotificationEvent;

class CategoryController extends Controller
{
    use NotificationController;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Pages
     */
    public function create(){
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $products = Products::orderBy('created_at', 'asc')->get();
        event(new NotificationEvent("Hello", "ttest"));
        NotificationController::save("test","test");
        return view('admin.category.create', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }

    public function edit($id){
        $category = Category::where('category_id', $id)->get();
        $products = Products::orderBy('created_at', 'asc')->get();
        return view('admin.category.edit', [
            'categories' => $category,
            'products' => $products,

        ]);
    }

    /**
     * Update, change, delete...
     */

    public function update(Request $request){

    }

    public function delete($id){
        Category::where('category_id', $id)->delete();

        $message = [
            'success' => true,
            'message' => "Successfully deleted category",
        ];

        return redirect('/admin/category/create')
        ->with($message);
    }

    public function add(Request $request){

        $names = array(
            'category-name' => 'category name',
            'category-items' => 'category items',
            'category-picture' => 'category picture',
        );

        $validator = Validator::make($request->all(), [
            'category-name' => 'required|min:2|max:30',
            'category-items' => 'required|array|min:1',
            'category-picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validator->setAttributeNames($names); 

        if($validator->fails()){
            return redirect('/admin/category/create')
            ->withInput()
            ->withErrors($validator);
        }

        $random = mt_rand(00000, 99999);
        $file = $request->file('category-picture');
        $image_file = $file->openFile()->fread($file->getSize());
        $items = implode(',', Input::get('category-items'));
        
        Category::create([
            'category_id' => $random,
            'category_name' => Input::get('category-name'),
            'category_items' => $items,
            'category_picture' => $image_file,
        ]);

        
        $message = [
            'success' => true,
            'message' => 'Successfully added category',
        ];

        return redirect('/admin/category/create')->with($message);
    }
}
