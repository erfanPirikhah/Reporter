<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\typeExpense;
use Illuminate\Http\Request;

class typeExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter= 1;
        $typeExpenses= typeExpense::latest()->paginate(5);
        return view('Admin.typeExpense.index',compact('typeExpenses','counter'));
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

        $request->validate([
            'nameTypeExpense'=>'required'
        ]);
        /// insert to Database [suppliers]
        typeExpense::create([
            'name'=>$request->nameTypeExpense,
        ]);

        alert()->success('با موفقیت افزوده شد');
        return redirect('typeExpense');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\typeExpense  $typeExpense
     * @return \Illuminate\Http\Response
     */
    public function show(typeExpense $typeExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\typeExpense  $typeExpense
     * @return \Illuminate\Http\Response
     */
    public function edit(typeExpense $typeExpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\typeExpense  $typeExpense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, typeExpense $typeExpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\typeExpense  $typeExpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(typeExpense $typeExpense)
    {
        $typeExpense->delete();
        alert()->error('باموفقیت حذف شد!!!');
        return back();
    }
}
