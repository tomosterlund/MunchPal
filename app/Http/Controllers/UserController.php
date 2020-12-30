<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string mit info dass ein neue Bneutzer erstellt wurde, und mit welcher Name.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'address' => 'required|max:255',
            'zip' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $address = $request->input('address');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $_id = uniqid();

        Redis::command('HMSET', [
            "users:$email",
            "_id", "$_id",
            "name", "$name",
            "email", "$email",
            "password", "$password",
            "address", "$address",
            "zip", "$zip",
            "city", "$city"
            ]);

        return response()->json(["created" => true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function flush()
    {
        Redis::command('flushall');
        return "Flushed all data in DB";
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return JSON
     *      WENN succcess => mit Benutzerdaten & success: true
     *      WENN fail => mit success: fail
     */
    public function login_user(Request $request)
    {
        $email = $request->input('email');
        $password = $request->password;

        $userPassword = Redis::command('HGET', ["users:$email", "password"]);

        if (Hash::check($password, $userPassword)) {

            $user = Redis::command('HGETALL', ["users:$email"]);
            session(["sessionUser" => $user]);
            
            return response()->json([
                "success" => true,
                "sessionUser" => $user
            ], 200);

        } else {
            return "Passwords do not match";
        }
    }
}
