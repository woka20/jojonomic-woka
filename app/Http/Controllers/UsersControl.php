<?php
namespace App\Http\Controllers;

use App\User;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UsersControl extends Controller{
    public function register(Request $request){

        $hasher = app()->make('hash');
        $register= new User;
        $register->fullname= $request->input('fullname');
        $register->email= $request -> input('email');
        $register->password=$hasher-> make($request -> input('password'));
        $email=$request->input('email');
        $find_same_user=User::where('email', $email)->first();
        if ($find_same_user == null){
            $register->save();
        }else{
            return response('email sudah dipakai');
        }
        
        if($register){
            return response('Registrasi Berhasil');
        }else{
            return response('Registrasi Gagal');
        };
        
    }

    // public function updateUser(Request $request, $id){
    //     $user= User::find($id);
       
    //     $user->fullname= $request->input('fullname');
    //     $user->email= $request -> input('email');
    //     $user->password=$request -> input('password');
    
    //     $user->save();

    //     return response('BERHASIL UPDATE USER');
    // }
    

    public function deleteUser(Request $request, $id){
        $user= User::find($id);
        $user->delete();
        

        return response('BERHASIL DIHAPUS');
    }

    public function login(Request $request){
        
        $hasher = app()->make('hash');
     
        $email= $request -> input('email');
        $password=$request -> input('password');
        $login = User::where('email', $email)->first();
        if ($login){
            if($hasher->check($password,$login['password'])){
                $api= sha1(time());
                
                $new_login=User::where('id_user',$login['id_user'])->update(['api_token'=>$api]);
                $token=User::where('id_user', $login['id_user'])->first();
                return response($token['api_token']);              
            }else{
                return response("COBA LAGI");
            }
            
        }else{
            return response($login);
        }
        
    }
}

?>
