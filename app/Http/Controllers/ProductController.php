<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::all();  
        return view('products.index',compact('products'));

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
        $products -> save();
        // dd($request->all());
        return redirect('/')->withSuccess('Employee Created Success Fully');
    }

    public function edit($id)
    {

        // dd($request->all());
        $product = Product::where('id',$id)->first();
        return view('products.edit',compact('product'));

    }

    public function update(Request $request,$id)
    {

        $request -> validate([

            'name' => 'required',
            'description' => 'required', 
            'role' => 'required',
            'image' => 'required',
        ]);
        $product = Product::where('id',$id)->first();
        
        //upload image  
        if(isset($request->image))
        {
            $imageName = time() . '.' .$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
    
        }
                
        $product->name = $request->name;
        $product->role = $request->role;
        $product->description = $request->description;
        $product -> save();
        // dd($request->all());
        return redirect('/')->withSuccess('Employee Updated Success Fully');

    }


    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
         
    }
}
