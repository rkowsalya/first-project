<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function show_category(){
        $category = Category::all();
        return view("auth.admin.category",compact("category"));
    }
    public function store(Request $request){
        $this->validate($request,['category_name'=>'required']) ;
        $data= $request->all();
        Category::create([
            'category_name'=> $data['category_name'],


        ]);
        return redirect()->route('admins.cust_register');
    }
    public function status ($id)
{
    $b = Category::findOrFail($id);
    $b->status = $b->status == 0 ? 1 : 0;
    $b->save();
    return redirect()->route('admins.cust_register');


}
// public function index(){
//     $data=Category::all();
//     return view('auth.admin.category',compact('data'));
// }
public function edit($id){

     $b = Category::findOrFail($id);
    return view('auth.admin.categoryedit',compact('b'));
}
public function update(Request $request, $id){
    $data=$request->all();
    $b=Category::findOrFail($id);
     $b->update($data);
     $b->save();

     return redirect()->route('admins.show_category');

}
public function destroy($id){
    $b = Category::findOrFail($id);
    $b->delete();
    return redirect()->route('admins.show_category');
}
}
