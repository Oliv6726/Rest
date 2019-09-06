<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Products;
use App\ingredients;


class ProductController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Pages
     */
    
    public function create(){
        $ingredients = Ingredients::orderBy('created_at', 'asc')->get();
        $products = Products::orderBy('created_at', 'asc')->get();
        return view('admin.products.create', [
            'ingredients' => $ingredients,
            'products' => $products,
        ]);

    }

    public function edit($id){
        $ingredients = ingredients::where('ingredient_id', $id)->get();
        $products = Products::orderBy('created_at', 'asc')->get();
        return view('admin.products.edit-products', [
            'ingredients' => $ingredients,
            'products' => $products,

        ]);
    }

    public function delete($id){
        Products::where('product_id', $id)->delete();
        $message = [
            'success' => true,
            'message' => "Successfully deleted product",
        ];

        return redirect('/admin/product')
        ->with($message);
    }

     /**
     * Update, change, delete...
     */

    public function add(Request $request){

        $names = array(
            'product-name' => 'name',
            'ingredients-items' => 'ingredients',
            'product-picture' => 'picture',
            'description-name' => 'description'
        );
        $validator = Validator::make($request->all(), [
            'product-name' => 'required|min:2|max:30',
            'ingredients-items' => 'required|array|min:1',
            'product-picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description-name' => 'required',
        ]);

        $validator->setAttributeNames($names); 

        if($validator->fails()){
            return redirect('/admin/product/create')
            ->withInput()
            ->withErrors($validator);
        }

        $random = mt_rand(00000, 99999);
        $file = $request->file('product-picture');
        $image_file = $file->openFile()->fread($file->getSize());
        $items = implode(',', Input::get('ingredients-items'));

        Products::create([
            'product_id' => $random,
            'product_name' => Input::get('product-name'),
            'product_ingredients' => $items,
            'product_picture' => $image_file,
            'product_desc' => Input::get('description-name'),
        ]);
        $message = [
            'success' => true,
            'message' => 'Successfully added product',
        ];

        return redirect('/admin/product/create')->with($message);

    }
}
