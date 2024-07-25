<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function add_product(){
        $categories=Category::all();
        $products=Product::with('categoryname')->get();
        return view("auth.admin.products.addproduct",compact("categories","products"));
    }
    public function store_product(Request $request){
        $data=$request->all();
        $request->validate([

            "product_name"=> "required",
            "price"=> "required",
            "category_id"=> "required",
        ]);
        if ($request->has('image')) {
            $image = $data['image'];
            $path = public_path('/assets');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Generate a unique filename
            $image->move($path, $imageName);
            $data['image'] = '/assets/' . $imageName;
        }

        if ($request->has('thumb_img')) {
            $thumbImage = $data['thumb_img'];
            $path = public_path('/assets');
            $thumbImageName = uniqid() . '.' . $thumbImage->getClientOriginalExtension(); // Generate a unique filename
            $thumbImage->move($path, $thumbImageName);
            $data['thumb_img'] = '/assets/' . $thumbImageName;
        }
        Product::create($data);
        return redirect()->route('admins.cust_login');

    }
    public function edit($id){

        $categories=Category::get();
        $b = Product::findOrFail($id);

       return view('auth.admin.products.editproduct',compact('b',('categories')));
   }
   public function update(Request $request, $id){
       $data=$request->all();
       if ($request->has('image')) {
            $image = $data['image'];
            $path = public_path('/assets');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Generate a unique filename
            $image->move($path, $imageName);
            $data['image'] = '/assets/' . $imageName;
        }

        if ($request->has('thumb_img')) {
            $thumbImage = $data['thumb_img'];
            $path = public_path('/assets');
            $thumbImageName = uniqid() . '.' . $thumbImage->getClientOriginalExtension(); // Generate a unique filename
            $thumbImage->move($path, $thumbImageName);
            $data['thumb_img'] = '/assets/' . $thumbImageName;
        }

       $b=Product::findOrFail($id);
        $b->update($data);
        $b->save();

        return redirect()->route('admins.show_add_product');

   }
   public function destroy($id){
       $b = Product::findOrFail($id);
       $b->delete();
       return redirect()->route('admins.show_add_product');
   }
   }


