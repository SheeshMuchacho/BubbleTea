<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

use App\Models\Product;;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
    {
        $data=new Product;

    if ($request->hasFile('file')) {

        $image = $request->file('file');

        if ($image->isValid()) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('productimage', $imagename);
            $data->image = $imagename;
        } else {
            return redirect()->back()->with('error', 'The uploaded file is not valid.');
        }
    } else {
        return redirect()->back()->with('error', 'No file was uploaded.');
    }


        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->quantity=$request->quantity;

        $data->save();
        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct', compact('data'));
    }

    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function updateview($id)
    {
        $data=product::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updateproduct(Request $request, $id)
    {
        $data=product::find($id);

        $image=$request->file;

        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image=$imagename;
        }

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->quantity=$request->quantity;

        $data->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function admindash() {
        return view('admin.admindash');
    }

}
