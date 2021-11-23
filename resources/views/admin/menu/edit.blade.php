@extends('admin.main')

@section('head')
<script src="<?php echo BASE_URL;?>/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" name="name_menu" required="true" value="{{$menu->name}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea name="des_menu" required="true" id="des" class="form-control">{{$menu->description}}</textarea>
                  </div>
                  <div class="form-group">
                  <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" value="1" id="customRadio2" name="menu_active" {{$menu->active==1?'checked=""':''}}>
                          <label for="customRadio2" class="custom-control-label">Kích hoạt</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="0" type="radio" id="customRadio1" name="menu_active" {{$menu->active==0?'checked=""':''}}>
                          <label for="customRadio1" class="custom-control-label">Không kích hoạt</label>
                        </div>
                        
                      </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
<script> 
  CKEDITOR.replace('des');
</script>
@endsection