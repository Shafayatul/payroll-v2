<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Session;

class UsersController extends Controller
{
    public function passwordWordChange()
    {
    	return view('user.password-change');
    }

    public function passwordUpdate(Request $request)
    {
    	$this->validate($request,[
            'old_password'      => ['required', 'string', 'min:8'],
            'new_password'      => ['required', 'string', 'min:8'],
            'confirm_password'  => ['required', 'string', 'min:8'],
        ]);

        $old_password       = $request->old_password;
        $new_password       = $request->new_password;
        $confirm_password   = $request->confirm_password;
        
        if(Auth::check()){
            if($new_password == $confirm_password){
                $current_password = Auth::user()->password;
                if(Hash::check($old_password, $current_password))
                {
                    $id             = Auth::user()->id;
                    $user           = User::findOrFail($id);
                    $user->password = Hash::make($new_password);
                    $user->save(); 
                    return redirect()->route('password-change')->with('success', 'Passowrd Updated!');
                }else{
                    return redirect()->route('password-change')->with('error','Old Password and Current password not matching!');
                }
            }else{
                return redirect()->route('password-change')->with('error','New Password and Confirm password not matching!');
            }
        }else{
            return redirect('/');
        }
    }
}
