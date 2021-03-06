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
            <th>Tên</th>
            <th>Ngày Thêm</th>
            <th>Ngày sữa</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Edit1</th>
            <th>Edit2</th>
            <th>Edit3</th>
            <th>Edit4</th>            
            <th>Edit5</th>
          </tr>
          </thead>
          <tbody>
          @foreach($category as $lt)
            <tr class="odd gradeX" align="center">
              <td>{{$lt->id}}</td>
              <td>{{$lt->ten_category}}</td>
              <td>{{$lt->created_at}}</td>
              <td>{{$lt->updated_at}}</td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$lt->id}}">
                  Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                  href="admin/category/edit/{{$lt->id}}">Edit</a></td>
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