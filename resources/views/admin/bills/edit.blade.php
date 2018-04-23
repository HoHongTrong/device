@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"> Sữa Đơn Hàng
            <small>{{$bills->ho_ten}}</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

          @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}
              @endforeach
            </div>
          @endif

          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <form action="admin/bills/edit/{{$bills->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="form-group">
              <label>Họ Tên</label>
              <input class="form-control" name="ho_ten" placeholder="nhập tên danh mục" value="{{$bills->ho_ten}}"/>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="email" name="email" placeholder="nhập email" value="{{$bills->email}}"/>
            </div>
            <div class="form-group">
              <label>Số Điện Thoại</label>
              <input class="form-control" name="so_dt" placeholder="nhập số điện thoại" value="{{$bills->so_dt}}"/>
            </div>
            <div class="form-group">
              <label>Tên Công Ty</label>
              <input class="form-control" name="ten_cty" placeholder="nhập tên công ty" value="{{$bills->ten_cty}}"/>
            </div>
            <div class="form-group">
              <label>Địa Chỉ</label>
              <input class="form-control" name="dia_chi" placeholder="nhập địa chỉ" value="{{$bills->dia_chi}}"/>
            </div>
            <div class="form-group">
              <label>Trạng Thái</label>
              <input class="form-control" name="trang_thai" placeholder="nhập trạng thái" value="{{$bills->trang_thai}}"/>
            </div>

            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

@endsection