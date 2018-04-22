@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Sản Phẩm
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
          <th>Tiêu Đề</th>
          <th>Hình</th>
          <th>Nội Dung</th>
          <th>Id Danh Mục</th>
          <th>Delete</th>
          <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $sd)
        <tr class="odd gradeX" align="center">
          <td>{{$sd->id}}</td>
          <td>{{$sd->tieu_de}}</td>
          <td>
            <img width="400px" src="upload/products/{{$sd->Hinh}}">
          </td>
          <td>{{$sd->noi_dung}}</td>
          <td>{{$sd->id_category}}</td>
          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/products/delete/{{$sd->id}}"> Xoá</a></td>
          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/products/edit/{{$sd->id}}">Sữa</a></td>
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