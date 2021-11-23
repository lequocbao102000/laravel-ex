<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;

class MenuServices
{
    public function create($request){
        try{
            Menu::create([
                'name'=>(string) $request->input('name_menu'),
                'description'=>(string) $request->input('des_menu'),
                'active'=>(int) $request->input('menu_active')
            ]);
            Session::flash('success','Thêm thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->get();
    }

    public function destroy($id){
        try{
            Menu::where('id',$id)->delete();
            Session::flash('success','Xóa thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
        
    }

    public function updatemenu($menu,$request){
        try{
            $menu->name = (string) $request->input('name_menu');
            $menu->description = (string) $request->input('des_menu');
            $menu->active = (int) $request->input('menu_active');
            $menu->save();
            Session::flash('success','Sửa thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
        
    }
}