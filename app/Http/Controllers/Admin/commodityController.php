<?php

namespace App\Http\Controllers\Admin;

use App\Commodity;
use App\Http\Controllers\Controller;
use App\Http\Requests\commodityRequest;
use App\Supplier;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

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
        return view('Admin.Commodity.show',compact('commodity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        $suppliers =Supplier::latest()->get();
        return view('Admin.commodity.edit',compact('commodity','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(commodityRequest $request, Commodity $commodity)
    {

        ///check date Database == $request->date
        if ($commodity->created_at != $request->date ){
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


        $commodity->update([

            'nameCommodity'=>$request->nameCommodity,
            'Supplier_id'=>$request->supplier,
            'imageUrl'=>$request->filepath,
            'priceCommodity'=>$request->priceCommodity,
            'status'=>$request->status,
            'created_at' =>$DateConvert
        ]);

        alert()->success('با موفقیت بروزرسانی شد');
        return redirect('commodity');
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

    /*
     * generate commodityCode automatic
     */
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


    /*
     *  function for convert persionNumber to english number
     */
    public  function convert_numbers($input)
    {
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹',',');
        $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',',');
        $string = str_replace($persian, $english, $input);
        return $string;
    }
}
