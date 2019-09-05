<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Products;
use App\ingredients;
use App\Menu;


class MenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create(){
        $menus = Menu::orderBy('created_at', 'asc')->get();
        $products = Products::orderBy('created_at', 'asc')->get();
        return view('admin.menu.menu', [
            'menus' => $menus,
            'products' => $products,

        ]);
    }

    public function add(Request $request){

        $names = array(
            'menu-name' => 'name',
            'product-items' => 'product',
            'menu-picture' => 'picture',
            'description-name' => 'description'
        );
        $validator = Validator::make($request->all(), [
            'menu-name' => 'required|min:2|max:30',
            'product-items' => 'required|array|min:1',
            'menu-picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description-name' => 'required',
        ]);

        $validator->setAttributeNames($names); 

        if($validator->fails()){
            return redirect('/admin/menu')
            ->withInput()
            ->withErrors($validator);
        }

        $random = mt_rand(00000, 99999);
        $file = $request->file('menu-picture');
        $image_file = $file->openFile()->fread($file->getSize());
        $items = implode(',', Input::get('product-items'));

        Menu::create([
            'menu_id' => $random,
            'menu_name' => Input::get('menu-name'),
            'menu_items' => $items,
            'menu_picture' => $image_file,
            'menu_desc' => Input::get('description-name'),
        ]);
        $message = [
            'success' => true,
            'message' => 'Successfully added menu',
        ];

        return redirect('/admin/menu')->with($message);

    }
}
