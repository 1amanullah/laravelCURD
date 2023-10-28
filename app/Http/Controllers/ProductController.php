<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
    
    public function create(Request $request)
    {

        
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request -> validate([

            'name' => 'required',
            'description' => 'required', 
            'role' => 'required',
            'image' => 'required',
        ]);
        
        //upload image  
        $imageName = time() . '.' .$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $products = new Product();
        
        $products->image = $imageName;
        $products->name = $request->name;
        $products->role = $request->role;
        $products->description = $request->description;
        // $products -> save();
        // dd($products->all());
        return redirect('/')->withSuccess('Employee Created Success Fully');
    }
}
