@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Sản Phẩm
            <small>{{$products->Ten}}</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

          @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}<br/>
              @endforeach
            </div>
          @endif

          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif

          {{-- enctype="multipart/form-data" dùng để upload hình lên --}}
          <form action="admin/products/edit/{{$products->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
              <label>Tiêu Đề</label>
              <input class="form-control" name="tieu_de" placeholder="Nhập tiêu đề" value="{{$products->tieu_de}}"/>
            </div>
            <div class="form-group">
              <label>Hình Ảnh</label>
              <p><img width="500px" src="upload/products/{{$products->Hinh}}"/></p>
              <input type="file" name="Hinh"/>
            </div>
            <div class="form-group">
              <label>Nội Dung</label>
              <textarea id="demo" name="noi_dung" class="form-control ckeditor" rows="2"
                        value="">{{$products->noi_dung}}</textarea>
            </div>
            <div class="form-group">
              <label>Id Danh Mục</label>
              <input class="form-control" name="id_category" placeholder="Nhập Id danh mục" value="{{$products->id_category}}"/>
            </div>
            

            <button type="submit" class="btn btn-default">Edit</button>
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