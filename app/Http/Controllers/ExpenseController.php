<?php

namespace App\Http\Controllers;

use Auth;
use App\Type;
use App\Expense;
use App\Http\Requests\StoreExpense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses =Auth::user()->expenses->sortByDesc('created_at')->take(10);
        foreach ($expenses as $expense) {
            if( count ($expense->types) > 0)
            {
            $expense->type=$expense->types->first()->description;
            }
        }
        return $expenses->toArray();
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
    public function store(StoreExpense $request)
    {
        $expense = new Expense;

        $expense->fill($request->all());

        Auth::user()->expenses()->save($expense);

        $expense->types()->attach($request->type_id);

        return ['message' => 'The expence was registered successfully !',
                  'expense' => $expense->toArray()];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
