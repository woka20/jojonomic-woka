<?php
namespace App\Http\Controllers;
use App\Produk;
use App\Rent;
use App\User;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RentsControl extends Controller{
    public function orderRent(Request $request){

        
        $user=new User;
        $rent=new Rent;
        $user->fullname= $request->input('fullname');
        $user->email= $request -> input('email');
        $user->save();
        
        $email=$request->input('email');
         
        $user_get= User::where('email', $email)->first();
        $rent->id_user=$user_get['id_user'];
        $rent->status_rent= "BELUM KEMBALI";
        $rent->id_product= $request->input('id_product');
        $rent->begin_date= date('Y-m-d');
        // $rent->return_date=$request->input('return_date');
        $rent->save();
        
        if($user && $rent){
            return response('Order Berhasil');
        }else{
            return response('Order Gagal');
        };
        
    }

    public function updateRent(Request $request, $id){
        $rent= Rent::find($id);
        
        $product= Produk::find($rent['id_product']);
        

        $rent->status_rent="LUNAS";
        $rent->return_date=date('Y-m-d');
        // return response($product['price']);
        $days=round((strtotime(date('Y-m-d'))-strtotime($rent['begin_date'])))/(60*60*24);
        $rent->price= $days * $product['price'];
        $rent->save();
       
       
        $product->quantity=$product['quantity']-1;
        $product->save();
        // $product->update(['quantity'=>$quantity]);

        return response('BERHASIL UPDATE RENT');
    }
    
    public function getRent(){
        
        $rent=Rent::all();

        return response($rent);
    }
        
    
}

?>
