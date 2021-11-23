<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuServices;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuServices $menuService){
        $this->menuService = $menuService;

    }
    public function create(){
        return view('admin.menu.add',[
            'title'=>'Thêm danh mục mới'
        ]);    
    }

    public function store(Request $request){
         $result = $this->menuService->create($request);
         return redirect()->back();
    }

    public function index(){
        // $result = $this->menuService->getAll();
        // dd($result);
        return view('admin.menu.list',[
            'title'=>'Danh sách danh mục',
            'menus'=>$this->menuService->getAll()
        ]);    
    }

    public function destroy(Menu $menu){
         $id = (int) $menu->id;
         $result = $this->menuService->destroy($id);
         return redirect()->back();
   }

   public function edit(Menu $menu){
        return view('admin.menu.edit',[
            'title'=>'Chỉnh sửa danh mục  '.$menu->name,
            'menu'=>$menu
        ]);   
    }

    public function update(Menu $menu,Request $request){
        $this->menuService->updatemenu($menu,$request); 
        return redirect()->back();
    }   
}
