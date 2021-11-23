<?php

namespace App\Http\Services\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductServices
{
    public function create($request,$file){
        try{
            Product::create([
                'name_pro'=>(string) $request->input('name_pro'),
                'des_pro'=>(string) $request->input('des_pro'),
                'img_pro'=>$file,
                'price_pro'=>(int) $request->input('price'),
                'active_pro'=>(int) $request->input('pro_active'),
                'menu_id'=>(int) $request->input('menu_id')
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
        return DB::table('products')
        ->join('menus', 'menu_id', '=', 'menus.id')
        ->select('products.*', 'menus.name')
        ->get();
    }

    public function destroy($id){
        try{
            Product::where('id',$id)->delete();
            Session::flash('success','Xóa thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
        
    }

    public function updateproduct($product,$file,$request){
        try{
            $product->name_pro = (string) $request->input('name_pro');
            $product->des_pro = (string) $request->input('des_pro');
            $product->price_pro = (int) $request->input('price');
            $product->active_pro = (int) $request->input('pro_active');
            $product->menu_id=(int)$request->input('menu_id');
            if ($file!=""){
                $product->img_pro=$file;
            }
            $product->save();
            Session::flash('success','Sửa thành công');
        }
        catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
        
    }


   

    
}