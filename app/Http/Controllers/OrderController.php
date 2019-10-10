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
use App\Orders;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*
        $orders = Orders::orderby('created_at', 'asc')->get();
        //dd($categories->category_items);
        foreach($orders as $order){
            if(!strpos($order->products, ',')) {
                $item_name = Products::select('product_name')->where('product_id', $order->products)->first();
                $order->products = $item_name->product_name;
                return;
            }
            $items = explode(',', $order->products);
            $items = $this->parse_items($items);
            $order->products = $items;
        }*/
        $categories = Category::orderby('created_at', 'asc')->get();
        //dd($categories->category_items);
        foreach($categories as $category){ 
            if(!strpos($category->category_items, ',')) {
                $item_name = Products::select('product_name')->where('product_id', $category->category_items)->first();
                $category->category_items = $item_name->product_name;
                return;
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

    public function get(string $name){
        $category = Category::where('category_name', $name)->first();
        if(!strpos($category->category_items, ',')) {
            $item_name = Products::select('product_name')->where('product_id', $category->category_items)->first();
            $category->category_items = $item_name->product_name;
        }
        $product_info = [];
        $items = explode(",", $category->category_items);
        $product_info["items"] = $items;
        return $this->parse_items($items);
        
    }

    /**
     * Custom methods
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