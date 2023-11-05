<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Todolist;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view('welcome', ['todolist'=> Todolist::all()]);
    }

    public function add(Request $req)
    {
        Todolist::create([
            'name' => $req['name'],
            'description' => $req['description'],
        ]);
        return redirect()->route('welcome');
    }

    public function edit(Request $req)
    {
        $t = Todolist::find($req['id']);
        $t->name = $req['name'];
        $t->description = $req['description'];
        $t->save();
        return redirect()->route('welcome');
    }

    public function delete(Request $req)
    {
        Todolist::find($req['id'])->delete();
        return redirect()->route('welcome');
    }
}
