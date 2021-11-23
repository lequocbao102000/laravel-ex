@extends('admin.main')



@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Active</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0;$i<count($menus);$i++){
      echo'<tr>
      <th >'.$menus[$i]->id.'</th>
      <th >'.$menus[$i]->name.'</th>
      <th >'.$menus[$i]->active.'</th>
      <th ><a href="'.BASE_URL.'/admin/menu/destroy/'.$menus[$i]->id.'" onclick="removeRow('.$menus[$i]->id.',\'/admin/menu/destroy\')">
      <i class="fas fa-trash"></i>
      </a>
      <a href="'.BASE_URL.'/admin/menu/edit/'.$menus[$i]->id.'"><i class="fas fa-edit"></i></a></th>
      </tr>';
    
    }
    ?>
    
  </tbody>
</table>
@endsection

