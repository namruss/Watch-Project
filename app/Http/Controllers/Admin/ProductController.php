<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $productList = Product::orderBy('id', 'ASC')->search()->paginate(10);
        return view('admin.products.index', ['productlist' => $productList]);
    }

    //live search ajax
    // public function search(Request $req){
    //     if ($req->ajax()) {
    //         $output = '';
    //         $categories = Category::orderBy('name','ASC')->where('name', 'LIKE', '%' . $req->search . '%')->get();
    //         if ($categories) {
    //             foreach ($categories as $key => $categories) {
    //                 $output .= '<tr>
    //                 <td>' . $categories->name . '</td>
    //                 <td>' . $categories->product()->count() . '</td>
    //                 <td>'. $categories->status. '
    //                     <span class="btn btn-sm btn-danger">Private</span>
    //                 </td>
    //                 <td>' . $categories->created_at->format('m-d-Y') . '</td>
    //                 <td class="text-right">
    //                                 <a href=" " class="btn btn-sm btn-success">
    //                                     <i class="fas fa-edit"></i>
    //                                 </a>
    //                                 <a href=" " class="btn btn-sm btn-danger">
    //                                     <i class="fas fa-trash"></i>
    //                                 </a>
    //                             </td>
    //                 </tr>';
    //             }
    //         }
    //     }   
    //         return Response($output);
    // }

    //create
    public function create()
    {
        $cates = Category::Where('status', 1)->orderBy('name', 'ASC')->select('name', 'id')->get();
        $brands = Brand::Where('status', 1)->orderBy('name', 'ASC')->select('name', 'id')->get();
        return view('admin.products.create', [
            'cates' => $cates,
            'brands' => $brands
        ]);
    }

    //store
    public function store(ProductRequest $req)
    {
        if ($req->has('image_upload')) {
            $file = $req->image_upload;
            $ext = $file->extension();

            $file_name = time() . '-' . 'product' . '.' . $ext;

            $file->move(public_path('uploads'), $file_name);
            $req->merge(['image' => $file_name]);
        }
        else $req->image=null;
        if($req->sale_price==null){
            $req->sale_price=$req->price;
        }

        if (Product::create($req->all())) {
            return redirect()->route('products.index')->with('success', 'A new product has been inserted to list');
        }
        return redirect()->route('products.index') - with('error', 'Failed');
    }

    //update
    public function update(ProductRequest $req, $id)
    {
        //  dd($req);   
        $product = Product::find($id);
        if ($req->name == null && $req->status == null) {
            return redirect()->route('products.index')->with('warning', 'Nothing has been changed');
        }
        if ($req->name == null) {
            $req->name = $product->name;
        }
        if($req->has('image_upload')){
            $file = $req->image_upload;
        $ext = $file->extension();

        $file_name = time() . '-' . 'product' . '.' . $ext;

        $file->move(public_path('uploads'), $file_name);
        $req->merge(['image' => $file_name]);
        }
        else $req->image=$product->image;
        if(($product->category->status==0||$product->brand->status==0)&&$req->status==1)
        {
            return redirect()->route('products.edit',$id)->with('status-error','Can not change status this product because the status of category or brand is private');
        }
        $product->name =  $req->name;
        $product->brands_id =  $req->brands_id;
        $product->categories_id =  $req->categories_id;
        $product->price =  $req->price;
        $product->stock =  $req->stock;
        $product->description =$req->description;
        $product->sale_price =  $req->sale_price;
        $product->status = $req->status;
        $product->image = $req->image;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Update successfully');
    }

    //edit
    public function edit(Request $req, $id)
    {
        $cates = Category::all();
        $brands = Brand::Where('status', 1)->orderBy('name', 'ASC')->select('name', 'id')->get();
        $product = Product::find($id);
        return view('admin.products.edit', [
            'productObj' => $product,
            'cates' => $cates,
            'brands' => $brands

        ]);
    }

    //delete
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'This product has been deleted');
    }
}
