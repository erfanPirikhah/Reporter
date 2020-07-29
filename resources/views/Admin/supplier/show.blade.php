@extends('Admin.master')
@section('content')



    <div class="panel panel-info panel-bordered">
    <div class="panel-heading">
        <h6 class="panel-title">Info panel<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
        <div class="heading-elements">

        </div>
    </div>

        <div class="container mt-20">
            <table style="width:100%">
                <tr>
                    <td><h5 class="no-margin">نام و نام خانوادگی :</h5></td>
                    <td> <h5 class="no-margin">تلفن همراه  :</h5></td>
                    <td> <h5 class="no-margin">آخرین بروزرسانی:</h5></td>
                </tr>
                <tr>
                    <td> <h6 class="no-margin">{{$supplier->nameSupplier}}</h6></td>
                    <td> <h6 class="no-margin text-light">{{$supplier->number_phone}}</h6></td>
                    <td>  <h6 class="no-margin text-light">{{jdate($supplier->created_at)->format('Y-m-d')}}</h6></td>
                </tr>
            </table>

            <br>
            <small> توضیحات :</small>
            <div class="well mb-10">

                {{$supplier->description}}
            </div>
        </div>




    </div>
</div>

@endsection