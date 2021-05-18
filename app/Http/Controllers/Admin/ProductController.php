<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $productList = Product::orderBy('name','ASC')->search()->paginate(1);
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
    public function create(){
        $cates=Category::Where('status',1)->orderBy('name','ASC')->select('name','id')->get();
        $brands=Brand::Where('status',1)->orderBy('name','ASC')->select('name','id')->get();
        return view('admin.products.create',[
            'cates' => $cates,
            'brands' => $brands
        ]);
    }

    //store
    public function store(Request $req){
        if($req->has('image')){
            $file=$req->image;
            $ext=$file->extension();
            
            $file_name=time().'-'.'product'.'.'.$ext;
           
            $file->move(public_path('uploads'),$file_name);

        }
        $req->merge(['image_upload' => $file_name]);
        
        if(Product::create($req->all())){
            return redirect()->route('products.index')->with('success','A new product has been inserted to list');
        } 
        return redirect()->route('products.index')-with('error','Failed');
    }

    //update
    public function update(Request $req, $id){
        $product = Product::find($id);
        if($req->name==null&&$req->status==null){
            return redirect()->route('products.index')->with('warning','Nothing has been changed');
        }
        if($req->name==null){
            $req->name=$product->name;
        }
        $productName=Trim($product->name," ");
        while(str_contains($productName,"  ")==true){
            $productName=str_replace($productName,"  "," ");
        }
      
        
        $product->name =  $productName;
        $product->status=$req->status;
        $product->save();
        return redirect()->route('products.index')->with('success','Update successfully');
    }

    //edit
    public function edit(Request $req, $id){
       $product=Product::find($id);
       return view('admin.products.edit',['productObj'=>$product]);
    }

    //delete
    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success','This product has been deleted');
    }

}
