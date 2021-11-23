<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuServices;
use App\Models\Menu;
use App\Http\Services\Product\ProductServices;
use App\Models\Product;

class ProductController extends Controller
{
    protected $menuService;
    protected $productService;

    public function __construct(MenuServices $menuService,ProductServices $productService){
        $this->menuService = $menuService;
        $this->productService = $productService;

    }

    public function create(){
        $getmenu = $this->menuService->getAll();
        return view('admin.products.add',[
            'title'=>'Thêm sản phẩm mới',
            'menus'=>$getmenu
        ]);
    }

    public function store(Request $request){
        $file = $_FILES['img_product']['name'];
        $result = $this->productService->create($request,$file);
        move_uploaded_file($_FILES['img_product']['tmp_name'],"../public/upload/".$file."");
        return redirect()->back();
   }

   public function index(){
       $sp = $this->productService->getAll();
    return view('admin.products.list',[
        'title'=>'Danh sách sản phẩm',
        'products'=>$sp
    ]);
   }

   public function destroy(Product $product){
        $id = (int) $product->id;
        $result = $this->productService->destroy($id);
        return redirect()->back();
    }

    public function edit(Product $product){
        $getmenu = $this->menuService->getAll();
        return view('admin.products.edit',[
            'title'=>'Chỉnh sửa sản phẩm  '.$product->name_pro,
            'product'=>$product,
            'menus'=>$getmenu
        ]);   
    }

    public function update(Product $product,Request $request){
        $file=$_FILES['img_product']['name'];
        $this->productService->updateproduct($product,$file,$request); 
        if ($file!=""){
            move_uploaded_file($_FILES['img_product']['tmp_name'],"../public/upload/".$file."");
        }
        
        return redirect()->back();
    }   
}
