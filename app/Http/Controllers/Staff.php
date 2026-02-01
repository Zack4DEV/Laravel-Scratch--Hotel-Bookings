<?php

namespace App\Http\Controllers;

use App\Models\Staff as StaffModel;
use Illuminate\Http\Request;

class Staff extends Controller
{
    public function _staff()
    {
        $staff = StaffModel::all();
        return response()->json($staff);
    }

    public function _store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:staff,id',
            'name' => 'required|string',
            'work' => 'required|string'
        ]);

        $staff = StaffModel::create($validated);
        return response()->json($staff, 201);
    }

    public function _delete(Request $request)
    {
        $staff = StaffModel::findOrFail($request->staff_id);
        $staff->delete();
        return response()->json(['message' => 'Staff member deleted successfully']);
    }
}
