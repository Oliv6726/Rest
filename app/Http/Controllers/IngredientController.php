<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Ingredients;

class IngredientController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create(){
        $ingredients = Ingredients::orderBy('created_at', 'asc')->get();
        return view('admin.products.ingredients', [
            'ingredients' => $ingredients,
        ]);
    }

    public function delete($id){
        Ingredients::where('ingredient_id', $id)->delete();

        $message = [
            'success' => true,
            'message' => "Successfully deleted ingredient",
        ];

        return redirect('/admin/product/ingredients')
        ->with($message);
    }

    public function add(Request $request){

        $name = array(
            'ingredients-name' => 'ingredient name',
        );
        $validator = Validator::make($request->all(), [
            'ingredients-name' => 'required|min:2|max:30',
        ]);

        $validator->setAttributeNames($name); 

        if($validator->fails()){
            return redirect('/admin/product/ingredients')
            ->withInput()
            ->withErrors($validator);
        }

        $random = mt_rand(00000, 99999);
        Ingredients::create([   
            'ingredient_id' => $random,
            'ingredient_name' => Input::get('ingredients-name'),
        ]);

        $message = [
            'success' => true,
            'message' => 'Successfully added ingredient',
        ];

        return redirect('/admin/product/ingredients')->with($message);

    }
    

}
