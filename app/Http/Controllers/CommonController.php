<?php

namespace App\Http\Controllers;


use App\Models\Admin\Settings\Union;
use App\Models\Admin\Settings\Upazila;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getUpazila(Request $request)
    {
        $data = Upazila::where("district_id", $request->district_id)
            ->get(["id", "name"]);
        return response()->json($data);
    }
    public function getUnion(Request $request)
    {
        $data = Union::where("upazila_id", $request->upazila_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
