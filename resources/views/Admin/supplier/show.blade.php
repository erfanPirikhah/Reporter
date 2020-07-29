@extends('Admin.master')
@section('content')



    <div class="panel panel-info panel-bordered">
    <div class="panel-heading">
        <h6 class="panel-title">جزئیات<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
        <div class="heading-elements">

        </div>
    </div>

        <div class="container mt-20">
            <table style="width:100%">
                <tr>
                    {{--  $supplier resive on from supplierController@show--}}
                    <td><h5 class="no-margin">نام و نام خانوادگی : {{$supplier->nameSupplier}}</h5></td>
                    <td> <h5 class="no-margin">تلفن همراه  : {{$supplier->number_phone}}</h5></td>
                    <td> <h5 class="no-margin">آخرین بروزرسانی:{{jdate($supplier->created_at)->format('Y-m-d')}}</h5></td>
                </tr>

            </table>
            <hr>
            <br>
            <small> توضیحات :</small>
            <div class="well mb-10">

                {{$supplier->description}}
            </div>
        </div>




    </div>
</div>

@endsection