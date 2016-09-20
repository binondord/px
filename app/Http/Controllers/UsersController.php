<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controller = get_class($this);
        return view('admin.users.index',compact('controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showChangePasswd($id)
    {
        $user = User::find($id);
        return view('admin.users.changepasswd', compact('id','user'));
    }

    public function saveChangePasswd($id)
    {
        $response = array('status' => 'error', 'message' => '');
        $user = User::find($id);

        $data = \Request::only(['password','confirm_password']);

        $this->validate($this->request, [
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $status = 'fail';

        if($data['password'] == $data['confirm_password'])
        {
            $status = 'success';
        }

        $user->password = \Hash::make($data['password']);
        $status = $user->save();

        if($status == 'success') {
            $response['status'] = 'success';
            $response['message'] = 'Password Changed Successfully';
        }else{
            $response['message'] = 'Passwords don\'t match';
        }

        return $response;
    }
}
