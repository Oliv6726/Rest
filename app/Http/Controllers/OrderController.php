<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Products;
use App\Category;
use App\Ingredients;
use App\Menu;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $categories = Category::orderby('created_at', 'asc')->get();
        $menus = Menu::orderby('created_at', 'asc')->get();
        //dd($categories->category_items);
        foreach($categories as $category){
            if(!strpos($category->category_items, ',')) {
                $item_name = Products::select('product_name')->where('product_id', $category->category_items)->first();
                $category->category_items = $item_name->product_name;
                continue;
            }
            $items = explode(',', $category->category_items);
            $items = $this->parse_items($items);
            $category->category_items = $items;
        }

        
        return view("admin.order.order", [
            'categories' => $categories,
            'menus' => $menus,
        ]);
    }

    /**
     * Modal 
     */
    public function parse_items(Array $items){
        $parsed_items = [];
        foreach ($items as $item ){
            if(!is_numeric($item)){ continue; }
            $item_name = Products::select('product_name')->where('product_id', $item)->first();
            $parsed_items[] = $item_name->product_name;

        }
        return $parsed_items;
    }

}