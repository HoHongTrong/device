<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bills;
use PhpParser\Node\Stmt\Return_;

class BillsController extends Controller
{

  public function getList()
  {
    $bills = Bills::all();
    return view('admin.bills.list', ['bills' => $bills]);
  }

//-------------------Add-------------------------
  public function getAdd()
  {
    return view('admin.bills.add');
  }

  public function postAdd(Request $request)
  {
    $this->validate($request,[
    		'ho_ten' => 'required|min:3|max:100',
		],
      [
        'ten_bills.required' => 'Bạn chưa nhập tên thể loại',
        'ten_bills.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_bills.max' => 'Độ dài lớn nhất 100 ký tự'
      ]);
    $bills = new Bills();
    $bills->ten_bills = $request->ten_bills;
    $bills->remember_token = $request->_token;
    $bills->save();
    return redirect('admin/bills/add')->with('thongbao', 'thêm thành công');
  }
  //------------------End Add-------------

  //-------------Edit-------------------------------------
  public function getEdit($id)
  {
    $bills = Bills::find($id);
    Return view('admin.bills.edit',['bills' => $bills]);
  }
  public function postEdit(Request $request,$id)
  {
    $bills = Bills::find($id);
    $this->validate($request,
      [
        'ho_ten'=>'required|unique:Bills,ten_bills|min:3|max:100'],
      [
        'ten_bills.required' => 'Bạn chưa nhập tên thể loại',
        'ten_bills.unique'=>'Tên đã tồn tại',
        'ten_bills.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_bills.max' => 'Độ dài lớn nhất 100 ký tự'
      ]);
    // tiến hành sữa
    $bills->ten_bills = $request->ten_bills;
    $bills->remember_token = $request->_token;
    $bills->save();
    return redirect('admin/bills/edit/'.$id)->with('thongbao','sữa thành công');
  }
  //------------------End Edit----------------

//------------Delete-------------------
  public function getDelete($id){
    $bills = Bills::find($id);
    $bills->delete();
    return redirect('admin/bills/list')->with('thongbao','xóa thành công');
  }
}
