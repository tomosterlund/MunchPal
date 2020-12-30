<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{

    /**
     * Eine Controller funktion um alle Menu Items von einem Restaurant zu finden
     * 
     * @param $restaurant_id
     * @return 
     */
    public function get_restaurant_menu($id)
    {
        $menu = DB::table('menu_items')
            ->where('restaurant_id', '=', $id)
            ->get();

        return response()->json([
            'menu' => $menu
        ], 200);
    }


    /**
     * Eine Controller function um das Menü-Item zu speichern.
     * Wird dann per ID aufgerufen und in der Menü für ein Restaurant gezeigt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
            'price' => 'required',
            'restaurant_id' => 'max:255',
            'type' => 'required|min:3|max:255',
        ]);

        $MenuItem = new MenuItem;
        $MenuItem->name = $request->name;
        $MenuItem->description = $request->description;
        $MenuItem->price = $request->price;
        $MenuItem->restaurant_id = $request->restaurant_id;
        $MenuItem->type = $request->type;

        $MenuItem->save();

        return response()->json([
            "success" => true
        ], 201);
        
    }

    /**
     * Menu item bearbeiten.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id => die ID vom Menu Item 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingItem = MenuItem::find($id);

        if ($existingItem) {
            $existingItem->name = $request->name;
            $existingItem->description = $request->description;
            $existingItem->price = $request->price;
            $existingItem->type = $request->type;
            $existingItem->save();

            return response()->json([
                'updated' => true
            ], 200);
        } else {
            return response()->json([
                'noItemFound' => true
            ], 404);
        }

    }

    /**
     * MenuItem löschen.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = MenuItem::find($id);

        if ($existingItem) {
            $existingItem->delete();
            return response()->json([
                'deleted' => true
            ], 200);
        } else {
            return response()->json([
                'deleted' => false
            ], 410);
        }
    }
}
