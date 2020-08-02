@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h6 class="panel-title">جزئیات<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
            </div>

        </div>

        <div class="panel-body">
            <div class="content">
                <table style="width:100%">
                    <tr>
                        {{--  $sale resive on from supplierController@show--}}

                        <th>نام فروشنده</th>
                        <th>شهر خریدار</th>
                        <th>شماره پیگری فروشنده</th>
                        <th>شماره پیگیری خریدار</th>
                        <th>قیمت کل</th>
                        <th>تاریخ </th>

                    </tr>
                    <br>
                    <tr>
                        <td>{{$sale->buyerName}}</td>
                        <td>{{$sale->buyerCity}}</td>
                        <td>{{$sale->sellerCode}}</td>
                        <td>{{$sale->buyerCode}}</td>
                        <td>{{$sale->price}}</td>
                        <td> {{Verta($sale->created_at)->formatDate()}}</td>
                    </tr>

                </table>
                <br>
                <hr>


                <div class="col-sm-5">
                    <small> توضیحات :</small>
                    <div class="well ">
                        <label for="">
                            تامین کننده :

                            {{\App\Sale::with('commodities','suppliers')->first()}}
                        </label><br>


                    </div>


                </div>
                <div class="col-sm-5">
                    <small> تصویر  :</small>
                </div>

            </div>
        </div>

   
     
    </div>





@endsection