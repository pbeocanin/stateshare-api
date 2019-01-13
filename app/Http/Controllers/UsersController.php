<?php /** @noinspection ALL */

/**
 * Created by PhpStorm.
 * User: fisher
 * Date: 2019-01-13
 * Time: 01:59
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UsersController
{
    public function getInfo($id){
        $user = User::find($id);
        return response($user, 200);
    }

    public function register(Request $request){
        $check = User::where('email', $request['email'])->first();
        if($check === null){
            $this->validate($this->request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $new = new User;
            $new->name = $request['firstname'] . ' ' . $request['lastname'];
            $new->email = $request['email'];
            $new->password = app('hash')->make($request['password'], $options = []);
            $new->save();
            return response('okay', 200);
        }
        return response('User exists', 400);

    }
}