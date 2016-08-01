<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class HotspotController extends Controller
{
    public function index()
    {
        return view('hotspot-image-oo');
    }

    public function save(Request $request)
    {
        $data = $request->all();
        unset($data['data']);
        $data['hotspot'] = $request->input('data');
        Storage::put('360.json', json_encode($data));
        return response(['success' => 'created'], 200);
    }

    public function getJson()
    {
//        echo file_get_contents(storage_path("app/360.json"));
        $data = json_decode(Storage::get('360.json'));//file_get_contents(storage_path("app/360.json"));
        return response(['data' => $data], 200);
    }
}
