<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;

class ProductsController extends Controller {
  public function getList() {
    $products = Products::all();
    return view('admin.products.list', ['products' => $products]);
  }

//-------------------Add-------------------------
  public function getAdd() {

    return view('admin.products.add');
  }

  public function postAdd(Request $request) {
    $this->validate($request, [
      'tieu_de' => 'required',
      'noi_dung' => 'required',
      'id_category' => 'required',
    ],
      [
        'tieu_de.required' => 'Nhập tên products',
        'noi_dung.required' => 'Nhập nội dung',
        'id_category.required' => 'Nhập Id danh mục',
      ]);
    $products = new Products();
    $products->tieu_de = $request->tieu_de;
    $products->noi_dung = $request->noi_dung;
    $products->id_category = $request->id_category;
    $products->remember_token = $request->_token;
    if ($request->hasFile('Hinh')) {
      $file = $request->file('Hinh');
      $duoi = $file->getClientOriginalExtension();
      if ($duoi != 'jpg' && $duoi != 'png') {
        return redirect('admin/products/add')->with('thongbao', 'ban chỉ được nhập jpg,png');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4) . "_" . $name;
      while (file_exists("upload/products/" . $Hinh)) {
        $Hinh = str_random(4) . "_" . $name;
      }
      $file->move("upload/products", $Hinh);
      $products->Hinh = $Hinh;
    }
    else {
      $products->Hinh = "";
    }
    $products->save();
    return redirect('admin/products/add')->with('thongbao', 'Thêm products thành công');

  }
  //------------------End Add-------------

  //-------------  Edit --------------------------
  public function getEdit($id) {
    $products = Products::find($id);
    return view('admin.products.edit', ['products' => $products]);

  }

  public function postEdit(Request $request, $id) {
    $this->validate($request, [
      'tieu_de' => 'required',
      'noi_dung' => 'required'
    ],
      [
        'tieu_de.required' => 'Nhập tiêu đề ',
        'noi_dung.required' => 'Nhập nội dung',
      ]);
    $products = Products::find($id);
    $products->tieu_de = $request->tieu_de;
    $products->noi_dung = $request->noi_dung;
    $products->id_category = $request->id_category;
    $products->remember_token = $request->_token;
    if ($request->hasFile('Hinh')) {
      $file = $request->file('Hinh');
      $duoi = $file->getClientOriginalExtension();
      if ($duoi != 'jpg' && $duoi != 'png') {
        return redirect('admin/products/add')->with('thongbao', 'ban chỉ được nhập jpg,png');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4) . "_" . $name;
      while (file_exists("upload/products/" . $Hinh)) {
        $Hinh = str_random(4) . "_" . $name;
      }
      $file->move("upload/products", $Hinh);
      unlink('upload/products/'.$products->Hinh);
      $products->Hinh = $Hinh;
    }
    $products->save();
    return redirect('admin/products/edit/'.$id)->with('thongbao', 'Sữa sản phẩm thành công');

  }
  //------------------End Edit----------------

//------------Delete-------------------
  public function getDelete($id) {
    $products = Products::find($id);
    $products->delete();
    return redirect('admin/products/list')->with('thongbao', 'xóa sản phẩm thành công');
  }
}
