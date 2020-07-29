<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\supplierRequest;
use App\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $counter=1;
        $suppliers=Supplier::latest()->paginate(20);
        return view("Admin.supplier.index",compact('suppliers','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(supplierRequest $request)
    {

        Supplier::create([
            'nameSupplier'=>$request->nameSupplier,
            'number_phone'=>$request->numberSupplier,
            'description'=>$request->description,
        ]);

        alert()->success('با موفقیت افزوده شد');

        return redirect('supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view("Admin.supplier.show",compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view("Admin.supplier.edit",compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(supplierRequest $request, Supplier $supplier)
    {
       $supplier->update([
            'nameSupplier'=>$request->nameSupplier,
            'number_phone'=>$request->numberSupplier,
            'description'=>$request->description,
        ]);

        alert()->success('با موفقیت بروزرسانی شد');

        return redirect('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        alert()->error('باموفقیت حذف شد!!!');
        return back();

    }


}
