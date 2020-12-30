<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = Restaurant::orderBy('created_at', 'DESC')->get();
        $restaurants = DB::select('SELECT NAME, ID, TAG_ONE, TAG_TWO FROM restaurants');

        return $restaurants;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'tag_one' => 'required|max:20',
            'tag_two' => 'max:20',
            'address' => 'required|max:255',
            'zip' => 'required',
            'city' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        $restaurant= new Restaurant;

        $restaurant->name = $request->input('name');
        $restaurant->tag_one = $request->input('tag_one');
        $restaurant->tag_two = $request->input('tag_two');
        $restaurant->address = $request->input('address');
        $restaurant->zip = $request->input('zip');
        $restaurant->city = $request->input('city');
        $restaurant->email = $request->input('email');
        $restaurant->password = Hash::make($request->input('password'));

        $restaurant->save();

        return response()->json([
            "created" => true
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    public function login_restaurant(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $restaurants = Restaurant::where('email', $email)->get();
        $userRestaurant = $restaurants[0];

        if (Hash::check($password, $userRestaurant->password)) {
            session(['sessionUser' => $userRestaurant]);

            return response()->json([
                "sessionUser" => $userRestaurant
            ], 201);
            
        } else {
            return "Passwords do not match";
        }

        return $email;
    }
}