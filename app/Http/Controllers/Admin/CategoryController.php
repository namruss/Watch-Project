<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index page
    public function index(){
        $cateList = Category::orderBy('name','ASC')->search()->paginate(1);
        return view('admin.categories.index', ['catelist' => $cateList]);
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
        return view('admin.categories.create');
    }

    //store
    public function store(Request $req){
        
        Category::create([
            'name'=>$req->name,
            'status'=>$req->status
        
        ]);
        return redirect()->route('categories.index');
    }

    //update
    public function update(Request $req, $id){
        $cate = Category::find($id);

        $cate->name = $req->name;
        
        $cate->save();
        return redirect()->route('categories.index');
    }

    //edit
    public function edit(Request $req, $id){
       $cate=Category::find($id);
       return view('admin.categories.edit',['cateObj'=>$cate]);
    }

    //delete
    public function delete($id){
        $cate=Category::find($id);
        $cate->delete();
        return redirect()->route('categories.index');
    }


}
