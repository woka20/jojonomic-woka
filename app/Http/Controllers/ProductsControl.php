<?php
namespace App\Http\Controllers;

use App\Produk;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductsControl extends Controller{
    public function postProduct(Request $request){
        $product= new Produk;
        $product->title= $request->input('title');
        $product->rate= $request -> input('rate');
        $product->category=$request -> input('category');
        $product->price=$request -> input('price');
        $product->quantity=$request -> input('quantity');
        $product->save();

        return response('BERHASIL');
    }

    public function updateProduct(Request $request, $id){
        $product= Produk::find($id);
        $product->title= $request->input('title');
        $product->rate= $request -> input('rate');
        $product->category=$request -> input('category');
        $product->price=$request -> input('price');
        $product->quantity=$request -> input('quantity');
        $product->save();

        return response('BERHASIL UPDATE');
    }

    public function tai(){
        $product= Produk::all();
        

        return response($product);
    }
}

?>



