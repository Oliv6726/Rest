<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;

class StaffController extends Controller
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
        $user = User::where('id', $id)->get();
        return view('admin.staff.edit', [
            'user' => $user,
        ]);
    }

    public function list(){
        $employers = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.staff.list', [
            'employers' => $employers,
        ]);
    }

    /**
     * Update, change, delete...
     */

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
        $menu = User::where('id', $id)->first();


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
            'category-name' => 'category name',
            'category-items' => 'category items',
            'category-picture' => 'category picture',
        );

        $validator = Validator::make($request->all(), [
            'category-name' => 'required|min:2|max:30',
            'category-items' => 'required',
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
