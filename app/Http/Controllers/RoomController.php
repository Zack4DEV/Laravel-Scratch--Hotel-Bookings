<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function _room()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function _store(Request $request)
    {
        $validated = $request->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'room_price' => 'required|numeric',
        ]);

        $room = Room::create($validated);

        return response()->json($room, 201);
    }

    public function _delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:rooms,id',
        ]);

        Room::find($validated['id'])->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }
}
