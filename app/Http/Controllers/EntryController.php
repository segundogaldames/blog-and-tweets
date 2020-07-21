<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('entries.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:5|max:255|unique:entries',
            'contenido' => 'required|min:25|max:1000',
        ]);

        $entry = new Entry;
        $entry->title = $request->title;
        $entry->contenido = $request->contenido;
        $entry->user_id = auth()->user()->id;
        $entry->save();

        return redirect('/home')->with('success','La entrada se creó correctamente');
    }

    /**
    * Display the specified resource.
    *
    * @param \App\Entry $entry
    * @return \Illuminate\Http\Response
    */
    public function show(Entry $entry)
    {
        return view('entries.show', compact('entry'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Entry $entry
    * @return \Illuminate\Http\Response
    */
    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Entry $entry
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Entry $entry)
    {
        $this->validate($request, [
        'title' => 'required|min:5|max:255',
        'contenido' => 'required|min:25|max:1000',
        ]);

        $entry->title = $request->title;
        $entry->contenido = $request->contenido;
        $entry->save();

        return redirect('/entries/' . $entry->id)->with('success','La entrada se editó correctamente');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Entry $entry
    * @return \Illuminate\Http\Response
    */
    public function destroy(Entry $entry)
    {
    //
    }
}
