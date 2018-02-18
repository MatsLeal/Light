<?php

namespace App\Http\Controllers;

use Auth;
use App\Incoming;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomings =Auth::user()->incomings->sortByDesc('created_at')->take(10);
        foreach ($incomings as $incoming) {
            if( count ($incoming->types) > 0)
            {
            $incoming->type=$incoming->types->first()->description;
            }
        }
        $incomingarray=array();
        foreach ($incomings as $income) {
            array_push($incomingarray,$income);
        }
        return $incomingarray;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $income = new Incoming;

      $income->fill($request->all());

      Auth::user()->incomings()->save($income);

      $income->types()->attach($request->type_id);

      return ['message' => 'The income was registered successfully !',
                'expense' => $income->toArray()];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function show(Incoming $incoming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function edit(Incoming $incoming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incoming $incoming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incoming $incoming)
    {
        $incoming->delete();
        return ['message' => 'The income was deleted !'];
    }
}
