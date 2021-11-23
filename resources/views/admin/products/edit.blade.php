@extends('admin.main')

@section('head')
<script src="<?php echo BASE_URL;?>/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="name_pro" value="{{$product->name_pro}}" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="number" value="{{$product->price_pro}}" name="price" min="0" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control" name="menu_id">
                            <?php
                            for ($i=0;$i<count($menus);$i++){
                                if ($menus[$i]->id==$product->menu_id){
                                    echo '<option value="'.$menus[$i]->id.'" selected>'.$menus[$i]->name.'</option>';
                                }
                                else{
                                    echo '<option value="'.$menus[$i]->id.'">'.$menus[$i]->name.'</option>';
                                }
                             
                            }
                          ?>
                        </select>
                        
                    </div>
                  <div class="form-group">
                        <label>Hình ảnh</label>
                        <br>
                        <img src="<?php echo BASE_URL;?>/upload/<?php echo $product->img_pro;?>" style="width:300px">
                        <input  type="file" class="form-control"  name="img_product">
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                    <textarea id="des" name="des_pro">{{$product->des_pro}}</textarea> 
                  </div>
                  <div class="form-group">
                  <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" value="1" id="customRadio2" name="pro_active" {{$product->active_pro==1?'checked=""':''}}>
                          <label for="customRadio2" class="custom-control-label">Kích hoạt</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="0" type="radio" id="customRadio1" name="pro_active" {{$product->active_pro==0?'checked=""':''}}>
                          <label for="customRadio1" class="custom-control-label">Không kích hoạt</label>
                        </div>
                        
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