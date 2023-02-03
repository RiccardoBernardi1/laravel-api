<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with('projects')->get();
        return $types;
    }
    public function show($slug)
    {   
        try{
            $type = Type::where('slug',$slug)->with('projects')->firstOrFail();
            return $type;
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response([
                'error' => '404 Type not found'
            ], 404);
        }
        
        return $type;
    }
}
