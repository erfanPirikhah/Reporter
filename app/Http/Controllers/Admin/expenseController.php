<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\expenseRequest;
use App\typeExpense;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter=1;
        $expenses=Expense::latest()->paginate(15);
        return view('Admin.expense.index',compact('expenses','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeExpenses=typeExpense::all();
        return view('Admin.expense.create',compact('typeExpenses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(expenseRequest $request)
    {



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


            Expense::create([
                'documentNumber'=>$request->documentNumber,
                'type_id'=>$request->type,
                'description'=>$request->description,
                'created_at'=>$DateConvert
            ]);

        alert()->success('با موفقیت افزوده شد');
        return redirect('expense');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('Admin.expense.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $typeExpenses=typeExpense::all();
        return view('Admin.expense.edit',compact('expense','typeExpenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(expenseRequest $request, Expense $expense)
    {
        ///check date Database == $request->date
        if ($expense->created_at != $request->date ){
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

        Expense::create([
            'documentNumber'=>$request->documentNumber,
            'type_id'=>$request->type,
            'description'=>$request->description,
            'created_at'=>$DateConvert
        ]);

        alert()->success('با موفقیت بروزرسانی شد');
        return redirect('expense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
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
