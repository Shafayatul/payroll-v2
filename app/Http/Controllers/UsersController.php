<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('confirm_password', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        User::create($requestData);

        return redirect('users')->with('success', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('users')->with('success', 'User updated!');
    }

    public function userInactive($id)
    {
        $user           = User::findOrFail($id);
        $user->status   = 0;
        $user->save();
        return redirect('users')->with('success', 'User Deactivated!');
    }

    public function userActive($id)
    {
        $user           = User::findOrFail($id);
        $user->status   = 1;
        $user->save();
        return redirect('users')->with('success', 'User Activated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('users')->with('success', 'User deleted!');
    }

    public function passwordWordChange()
    {
        return view('users.password-change');
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
