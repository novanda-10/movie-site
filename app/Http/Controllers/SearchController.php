<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        
        $movies=Movie::where('title', 'Like','%'.request('q').'%')->get();

        return view('movies',['movies'=>$movies]);
    }
}
