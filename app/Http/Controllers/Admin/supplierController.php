<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\supplierRequest;
use App\Supplier;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
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
        $suppliers=Supplier::latest()->paginate(15);
        ///load view supplier index and send data $suppliers
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

        /// insert to Database [suppliers]
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

        ///check date Database == $request->date
        if ($supplier->created_at != $request->date ){
            ///convert number Persin to English
            $date_en = $this->convert_numbers($request->date);
            ///explode date and save to vaiable
            $persian_date = explode("/",   $date_en);
            $year=$persian_date[0];
            $month = $persian_date[1];
            $day = $persian_date[2];

            ///convert Persian date to  miladi
            $miladiDate = CalendarUtils::toGregorian($year,$month, $day);
            ///impload by / sepreator  [2020/2/2]
             $DateConvert = implode('/', $miladiDate);

        }else{
            $DateConvert=$request->date;
        }

        /// update supplier  Database [suppliers]
       $supplier->update([
            'nameSupplier'=>$request->nameSupplier,
            'number_phone'=>$request->numberSupplier,
            'description'=>$request->description,
            'created_at' =>$DateConvert
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


    ///function for convert persionNumber to english number
    public  function convert_numbers($input)
    {
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹',',');
        $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',',');
        $string = str_replace($persian, $english, $input);
        return $string;
    }


}
