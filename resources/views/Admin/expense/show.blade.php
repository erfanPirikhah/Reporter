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
                    {{--  $expense resive on from expenseController@show--}}
                    <td><h5 class="no-margin">نوع هزینه : {{$expense->typeExpense->name}}</h5></td>
                    <td> <h5 class="no-margin">شماره سند  : {{$expense->documentNumber}}</h5></td>
                    <td> <h5 class="no-margin">تاریخ:{{Verta($expense->created_at)->formatDate()}}</h5></td>
                </tr>

            </table>
            <hr>
            <br>
            <small> توضیحات :</small>
            <div class="well mb-10">

                {{$expense->description}}
            </div>
        </div>




    </div>
</div>

@endsection