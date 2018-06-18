<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heroes;

class HeroController extends Controller
{

    // Creating Pages and Eloquent
    public function index()
    {
        $heroes = Hero::table('heroes')->get('name')->orderBy('name', 'ASC');

        $view = view('/hero/index');

        $view->$heroes = $heroes;

        return $view;

    }

    // Routing # 2
    public function show($id)
    {
        return view(Hero::findOrFail($id = 5));
    }

    // Forms
    public function create($id)
    {
        $heroes = DB::table('heroes')->where('id', $id)->get();
        $view = view('heroes.create');
        $view->heroes = $heroes;
        $view->id = $id;
        return $view;
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required|string',
            'description' => 'required|string',            
        ]);
        

        $emergency = new Hero();
        $emergency->fill([
            'id' => $id,
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ]);

        $emergency->save();
 
    }

    public function display($id)
    {
        $heroes = Heroes::where('id', $id)->first();
        $view = view('heroes.display');
        $view->heroes = $heroes;
        return $view;
        
    }

}

