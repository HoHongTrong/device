@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"> Sữa Danh Mục
            <small>{{$category->ten_category}}</small>
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
          <form action="admin/category/edit/{{$category->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="form-group">
              <label>Tên Danh Mục</label>
              <input class="form-control" name="ten_category" placeholder="Điền tên Danh Mục" value="{{$category->ten_category}}"/>
            </div>

            <button type="submit" class="btn btn-default">Sữa</button>
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