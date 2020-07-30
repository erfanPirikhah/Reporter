<?php

namespace App\Http\Controllers\Admin;

use App\Commodity;
use App\Http\Controllers\Controller;
use App\Http\Requests\commodityRequest;
use App\Supplier;
use Illuminate\Http\Request;

class commodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter=1;
        $commoditis = Commodity::latest()->paginate(15);
        return view('Admin.Commodity.index',compact('commoditis','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers =Supplier::latest()->get();
        return view('Admin.commodity.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(commodityRequest $request)
    {

         $codeCommodity=$this->generateKye();

        Commodity::create([

            'nameCommodity'=>$request->nameCommodity,
            'codeCommodity'=>$codeCommodity,
            'Supplier_id'=>$request->supplier,
            'imageUrl'=>$request->filepath,
            'priceCommodity'=>$request->priceCommodity,
            'status'=>$request->status
        ]);

        alert()->success('با موفقیت افزوده شد');
        return redirect('commodity');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();
        alert()->error('باموفقیت حذف شد!!!');
        return back();
    }

    public function generateKye()
    {

        $code_id= rand(10,100000);
        $commodityCode = Commodity::where('codeCommodity',"$code_id")->first();
        if ( $commodityCode > 1)
        {
            return rand(10,100000);
        }else{
            return  $code_id;
        }
    }
}
