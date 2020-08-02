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

    public function suppliers()
    {
        return Supplier::all();
    }

    public function apiSupplier(Request $request)
    {
            $id = $request->input('id');
            if ($id) {
                $sales =Commodity::where('supplier_id',$id)->with('Sales')->get();
                return response($sales,200);

            } else {
                return response('bad', 400);
            }



    }

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
