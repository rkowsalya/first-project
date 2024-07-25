<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    //
    public function main(){
        return view("auth.admin.main");
      }
      public function dashboard(){
        return view("auth.admin.dashboard");

      }
      public function profile($id){

        $a = Admin::findOrFail($id);

        return view("auth.admin.profile", compact("a"));


      }
      public function update(Request $request, $id){
        $data= $request->all();
        $a = Admin::findOrFail($id);
        $a->update($data);
        $a->save();

      }
    
}
