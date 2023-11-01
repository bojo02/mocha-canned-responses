<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(count(Response::get()) > 0){
            $responses = Response::get()->toQuery()->latest()->paginate(10);
        }
        else{
            $responses = [];
        }

        return view("response.index", ['responses' => $responses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('response.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $response = Response::create([
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('response.show', ['response' => $response->id])->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        return view('response.show', ['response' => $response]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        return view('response.edit', ['response'=> $response]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Response $response)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $response->update([
            'name'=> $request->name,
            'content'=> $request->content
        ]);

        return redirect()->back()->with('success', 'The response has been updated!');
    }

    public function search($term){
        $responses = Response::where('name', "LIKE", '%'. $term . '%')->get();

        return $responses;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Response::where('id', $id)->delete();

        return redirect(route('home'))->with('success','The response was deleted!');
    }
}
