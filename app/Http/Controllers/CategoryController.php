<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use PhpParser\Node\Stmt\Return_;

class CategoryController extends Controller
{

  public function getList()
  {
    $category = Category::all();
    return view('admin.category.list', ['category' => $category]);
  }

//-------------------Add-------------------------
  public function getAdd()
  {
    return view('admin.category.add');
  }

  public function postAdd(Request $request)
  {
    $this->validate($request,['ten_category' => 'required|min:3|max:100',],
      [
        'ten_category.required' => 'Bạn chưa nhập tên thể loại',
        'ten_category.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_category.max' => 'Độ dài lớn nhất 100 ký tự'
      ]);
    $category = new Category();
    $category->ten_category = $request->ten_category;
    $category->remember_token = $request->_token;
    $category->save();
    return redirect('admin/category/add')->with('thongbao', 'thêm thành công');
  }
  //------------------End Add-------------

  //-------------Edit-------------------------------------
  public function getEdit($id)
  {
    $category = Category::find($id);
    Return view('admin.category.edit',['category' => $category]);
  }
  public function postEdit(Request $request,$id)
  {
    $category = Category::find($id);
    $this->validate($request,
      [
        'ten_category'=>'required|unique:Category,ten_category|min:3|max:100'],
      [
        'ten_category.required' => 'Bạn chưa nhập tên thể loại',
        'ten_category.unique'=>'Tên đã tồn tại',
        'ten_category.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_category.max' => 'Độ dài lớn nhất 100 ký tự'
      ]);
    // tiến hành sữa
    $category->ten_category = $request->ten_category;
    $category->remember_token = $request->_token;
    $category->save();
    return redirect('admin/category/edit/'.$id)->with('thongbao','sữa thành công');
  }
  //------------------End Edit----------------

//------------Delete-------------------
  public function getDelete($id){
    $category = Category::find($id);
    $category->delete();
    return redirect('admin/category/list')->with('thongbao','xóa thành công');
  }
}
