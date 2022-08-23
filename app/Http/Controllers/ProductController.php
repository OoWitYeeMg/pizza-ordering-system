<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // product list
    public function list()
    {

        $pizza = Product::select('products.*','categories.name as category_name')->when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
        ->leftJoin('categories','products.category_id','categories.id')
        ->orderby('products.created_at', 'desc')->paginate(3);
         return view('admin.product.pizzalist', compact('pizza'));
    }
    // direct pizza create page
    public function createPage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.create', compact('categories'));
    }
    // create product
    public function create(Request $request)
    {
        $this->productValidationCheck($request, "create");
        $data = $this->requeatProductInfo($request);
        if ($request->hasFile('pizzaImage')) {
            $fileName = uniqid() . $request->file('pizzaImage')->getClientOriginalName();
            $request->file('pizzaImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        Product::create($data);
        return redirect()->route('product#list');
    }
    // update pizza
    public function updatePage($id)
    {
        $pizza = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.update', compact('pizza', 'category'));
    }
    // delete product
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess' => 'Product Deleted..']);
    }
    // update pizza
    public function update(Request $request)
    {
        $this->productValidationCheck($request,"update");
        $data = $this->requeatProductInfo($request);
        if ($request->hasFile('pizzaImage')) {
            $dbImage = Product::where('id', $request->pizzaId)->first();
            $dbImage = $dbImage->image;
            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }
            $fileName = uniqid() . $request->file('pizzaImage')->getClientOriginalName();
            $request->file('pizzaImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        Product::where('id', $request->pizzaId)->update($data);
        return redirect()->route('product#list')->with(['updateSuccess' => 'Pizza Updated...']);
    }
    // edit product page
    public function edit($id)
    {
        $pizza = Product::select('products.*','categories.name as category_name')
        ->leftJoin('categories','products.category_id','categories.id')
        ->where('products.id', $id)->first();
        return view('admin.product.edit', compact('pizza'));
    }
    // request product info
    private function requeatProductInfo($request)
    {
        return [
            'category_id' => $request->category,
            'name' => $request->pizzaName,
            'description' => $request->pizzaDescription,
            'price' => $request->pizzaPrice,
            'waiting_time' => $request->waitingtime
            // 'image' => $request->pizzaImage
        ];
    }
    //
    // product validation check
    private function productValidationCheck($request, $action)
    {
        $validtionRules = [
            'pizzaName' => 'required|min:5|unique:products,name,' . $request->pizzaId,
            'category' => 'required',
            'pizzaPrice' => 'required',
            'pizzaDescription' => 'required',
            'waitingtime' => 'required'
        ];
        $validtionRules['pizzaImage'] = $action == "create" ? 'required|mimes:jpg,jpeg,png|file' : "mimes:jpg,jpeg,png|file";
        Validator::make($request->all(), $validtionRules)->validate();
    }
}
