<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"1500000"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>"360000"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>"800000"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>"1"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View|\Illuminate\Http\RedirectResponse
    {
        if (!isset(self::$products[$id - 1])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

        public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

        public function save(Request $request): View
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        $title = "Confirmation - Online Store";

        return view('product.success')->with("title",$title);
        //here will be the code to call the model and save it to the database
    }
}
