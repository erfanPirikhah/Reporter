<?php

namespace App\Http\Controllers\Admin;

use App\Commodity;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        $week = $this->reportWeek();
        $month = $this->reportMonth();
        $day = $this->reportDay();
        $suppliers = $this->suppliers();
        return view('Admin.report.index', compact('day', 'week', 'month', 'suppliers'));
    }

    /*
     * return all Supplier
     */
    public function suppliers()
    {
        return Supplier::all();
    }

    /*
     * The function send Commodity and Sales by filter supplier_id
     * route API [ /api/supplier ]
     */
    public function apiSupplier(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $sales = Commodity::where('supplier_id', $id)->with('Sales')->get();
            return response($sales, 200);

        } else {
            return response('bad', 400);
        }


    }

    /*
   * report total price in one Month
   */
    public function reportMonth()
    {
        $now = Carbon::now()->subDays(30);
        $sales = Sale::whereMonth('created_at', $now)->get();

        $sum = 0;
        foreach ($sales as $sale) {
            $sum += $sale->price;
        }
        return $sum;


    }

    /*
     * report total price in one Week
     */
    public function reportWeek()
    {
        $now = Carbon::now()->subDays(7);
        $sales = Sale::where('created_at', '>=', $now)->get();
        $sum = 0;
        foreach ($sales as $sale) {
            $sum += $sale->price;
        }
        return $sum;

    }


    /*
     * report total price in one Day
     */
    public function reportDay()
    {
        $now = Carbon::now()->subDays(1);
        $sales = Sale::where('created_at', '>=', $now)->get();
        $sum = 0;
        foreach ($sales as $sale) {
            $sum += $sale->price;
        }
        return $sum;

    }
}
