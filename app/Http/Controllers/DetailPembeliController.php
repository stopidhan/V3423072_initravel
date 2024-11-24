<?php

namespace App\Http\Controllers;

use App\Models\detailpembeli;
use Illuminate\Http\Request;

class DetailPembeliController extends Controller
{
    public function index()
    {
        $data['detailpembeli'] = detailpembeli::all();
        return view('detailpembelis.index', $data);
    }
}
