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

    public function edit($id){
        $menus = Menu::where('menu_id', $id)->get();
        $products = Products::orderBy('created_at', 'asc')->get();
        return view('admin.menu.edit', [
            'menu' => $menus,
            'products' => $products,

        ]);
    }
    public function update($id, Request $request){
        $names = array(
            'menu-name' => 'name',
            'product-items' => 'product',
            'menu-picture' => 'picture',
            'description-input' => 'description'
        );
        $validator = Validator::make($request->all(), [
            'menu-name' => 'min:2|max:30',
            'product-items' => 'array|min:1',
            'menu-picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description-input' => 'max:255',
        ]);

        $validator->setAttributeNames($names); 

        if($validator->fails()){
            return redirect('/admin/menu/edit/'.$id)
            ->withInput()
            ->withErrors($validator);
        }
        $menu = Menu::where('menu_id', $id)->first();
        if(Input::has('menu-picture')) {
            $random = mt_rand(00000, 99999);
            $file = $request->file('menu-picture');
            $image_files = $file->openFile()->fread($file->getSize());
        }
        if(Input::has('product-items')) {
            $item_ids = implode(',', Input::get('product-items'));
        }
        
        $items = isset($item_ids) ? $item_ids : $menu->menu_items;
        $image_file = isset($image_files) ? $image_files : $menu->menu_picture;

        $menu_name = empty(Input::get('menu-name')) ? Input::get('menu-name') : $menu->menu_name;
        $menu_desc = empty(Input::get('description-name')) ? Input::get('description-name') : $menu->menu_desc;
        $menu->update([
            'menu_name' => $menu_name,
            'menu_items' => $items,
            'menu_picture' => $image_file,
            'menu_desc' => $menu_desc,
        ]);

        $message = [
            'success' => true,
            'message' => 'Successfully updated menu',
        ];

        return redirect('/admin/menu/edit/'.$id)->with($message);

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
