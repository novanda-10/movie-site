<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        
        $movies=Movie::with(['genres','artists'])->where('title', 'Like','%'.request('q').'%')->paginate(5);

        return view('movies',['movies'=>$movies]);
    }
}
