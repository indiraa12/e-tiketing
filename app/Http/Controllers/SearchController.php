<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $data = Rute::table('people')->paginate(10);
        return view('search', compact('data'));
    }
}
