<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brandList = Brand::orderBy('name','ASC')->search()->paginate(1);
        return view('admin.brands.index', ['brandlist' => $brandList]);
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
        return view('admin.brands.create');
    }

    //store
    public function store(Request $req){
        Brand::create([
            'name'=>$req->name,
            'status'=>$req->status
        
        ]);
        return redirect()->route('brands.index');
    }

    //update
    public function update(Request $req, $id){
        $brand = Brand::find($id);
        if($req->name==null&&$req->status==null){
            return redirect()->route('brands.index')->with('warning','Nothing has been changed');
        }
        if($req->name==null){
            $req->name=$brand->name;
        }
        $brand->name = $req->name;
        $brand->status=$req->status;
        $brand->save();
        return redirect()->route('brands.index')->with('success','Update successfully');
    }

    //edit
    public function edit(Request $req, $id){
       $brand=Brand::find($id);
       return view('admin.brands.edit',['brandObj'=>$brand]);
    }

    //delete
    public function delete($id){
        $brand=Brand::find($id);
        if($brand->product()->count()>0){
            return redirect()->route('brands.index')->with('error','You only can delete category have no product');

        }
        else $brand->delete();
        return redirect()->route('brands.index')->with('success','This category has been deleted');
    }

}
