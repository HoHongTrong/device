@extends('admin.layout.index')
@section('content')

  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Category
            <small>List</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
        @endif
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
          <tr align="center">
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Tên Công Ty</th>
            <th>Địa Chỉ</th>
            <th>Trạng Thái</th>
            <th>Ngày Thêm</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
          </thead>
          <tbody>
          @foreach($bills as $lt)
            <tr class="odd gradeX" align="center">
              <td>{{$lt->id}}</td>
              <td>{{$lt->ho_ten}}</td>
              <td>{{$lt->so_dt}}</td>
              <td>{{$lt->ten_cty}}</td>
              <td>{{$lt->dia_chi}}</td>
              <td>{{$lt->trang_thai}}</td>
              <td>{{$lt->created_at->diffForHumans() }}</td>
              <td>1221</td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bills/delete/{{$lt->id}}">
                  Xoá</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                  href="admin/bills/edit/{{$lt->id}}">Sữa</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

@endsection