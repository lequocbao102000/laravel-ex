@extends('admin.main')



@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên</th>
      <th scope="col">Giá</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Loại</th>
      <th scope="col">Active</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0;$i<count($products);$i++){
      echo'<tr>
      <th >'.$products[$i]->id.'</th>
      <th >'.$products[$i]->name_pro.'</th>
      <th >'.$products[$i]->price_pro.'</th>
      <th ><img src="'.BASE_URL.'/upload/'.$products[$i]->img_pro.'" style="width:100px"></th>
      <th >'.$products[$i]->name.'</th>
      <th >'.$products[$i]->active_pro.'</th>
      <th ><a href="'.BASE_URL.'/admin/product/destroy/'.$products[$i]->id.'" onclick="removeRow('.$products[$i]->id.',\'/admin/product/destroy\')">
      <i class="fas fa-trash"></i>
      </a>
      <a href="'.BASE_URL.'/admin/product/edit/'.$products[$i]->id.'"><i class="fas fa-edit"></i></a></th>
      </tr>';
    
    }
    ?>
    
  </tbody>
</table>
@endsection

