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
    		'email' => 'required|min:10|max:100',
    		'so_dt' => 'required|min:10|max:15',
    		'ten_cty' => 'required|min:3|max:100',
    		'dia_chi' => 'required|min:3|max:200',
    		'trang_thai' => 'required'
		],
      [
        'ho_ten.required' => 'Bạn chưa nhập họ tên',
        'ho_ten.min' => 'Độ dài ít nhất 3 ký tự',
        'ho_ten.max' => 'Độ dài lớn nhất 100 ký tự',
        'email.required' => 'Bạn chưa nhập email',
        'email.min' => 'Độ dài ít nhất 10 ký tự',
        'email.max' => 'Độ dài lớn nhất 100 ký tự',
        'so_dt.required' => 'Bạn chưa nhập số điện thoại',
        'so_dt.min' => 'Độ dài ít nhất 10 ký tự',
        'so_dt.max' => 'Độ dài lớn nhất 15 ký tự',
        'ten_cty.required' => 'Bạn chưa nhập tên công ty',
        'ten_cty.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_cty.max' => 'Độ dài lớn nhất 100 ký tự',
        'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
        'dia_chi.min' => 'Độ dài ít nhất 3 ký tự',
        'dia_chi.max' => 'Độ dài lớn nhất 200 ký tự',
        'trang_thai.required' => 'Bạn chưa nhập trạng thái'
      ]);
    $bills = new Bills();
    $bills->ho_ten = $request->ho_ten;
    $bills->email = $request->email;
    $bills->so_dt = $request->so_dt;
    $bills->ten_cty = $request->ten_cty;
    $bills->dia_chi = $request->dia_chi;
    $bills->trang_thai = $request->trang_thai;
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
    $this->validate($request,[
    		'ho_ten' => 'required|min:3|max:100',
    		'email' => 'required|min:10|max:100',
    		'so_dt' => 'required|min:10|max:15',
    		'ten_cty' => 'required|min:3|max:100',
    		'dia_chi' => 'required|min:3|max:200',
    		'trang_thai' => 'required'
		],
      [
        'ten_bills.required' => 'Bạn chưa nhập tên bills',
        'ten_bills.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_bills.max' => 'Độ dài lớn nhất 100 ký tự',
        'email.required' => 'Bạn chưa nhập email',
        'email.min' => 'Độ dài ít nhất 10 ký tự',
        'email.max' => 'Độ dài lớn nhất 100 ký tự',
        'so_dt.required' => 'Bạn chưa nhập số điện thoại',
        'so_dt.min' => 'Độ dài ít nhất 10 ký tự',
        'so_dt.max' => 'Độ dài lớn nhất 15 ký tự',
        'ten_cty.required' => 'Bạn chưa nhập tên công ty',
        'ten_cty.min' => 'Độ dài ít nhất 3 ký tự',
        'ten_cty.max' => 'Độ dài lớn nhất 100 ký tự',
        'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
        'dia_chi.min' => 'Độ dài ít nhất 3 ký tự',
        'dia_chi.max' => 'Độ dài lớn nhất 200 ký tự',
        'trang_thai.required' => 'Bạn chưa nhập trạng thái'
      ]);
    // tiến hành sữa
    $bills->ho_ten = $request->ho_ten;
    $bills->email = $request->email;
    $bills->so_dt = $request->so_dt;
    $bills->ten_cty = $request->ten_cty;
    $bills->dia_chi = $request->dia_chi;
    $bills->trang_thai = $request->trang_thai;
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
