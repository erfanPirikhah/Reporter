@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h2 class="panel-title" style="float: right">لیست هزینه ها  <a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h2>

                <a href="{{route('expense.create')}}" style="float: left" class=" btn btn-xlg bg-teal-400">   افزودن هزینه <i
                            class="fa fa-plus "></i></a>
            </div>

        </div>

        <div class="panel-body">
        </div>

        <div class="table-responsive ">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نوع هزینه</th>
                    <th>شماره سند</th>
                    <th>تاریخ</th>
                    <th>نمایش</th>
                    <th>تنظیمات</th>


                </tr>
                </thead>
                <tbody>

{{--              $expenses resive on from commodityController@index--}}
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$expense->typeExpense->name}}</td>
                        <td>{{$expense->documentNumber}}</td>
                        <td> {{Verta($expense->created_at)->formatDate()}}</td>
                        <td><a href="{{Route('expense.show',["expense"=>$expense->id])}}" class="btn btn-default btn-raised legitRipple">جزئیات </a> </td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                                <form action="{{Route('expense.destroy',["expense"=>$expense->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{Route('expense.edit',["expense"=>$expense->id])}}" class="btn btn-info btn-rounded legitRipple">ویرایش <i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-rounded legitRipple" onclick="archiveFunction()"> حذف  <i class="fa fa-trash"></i></button>
                                    </div>
                                </form>

                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <br><br>
        <div style="text-align: center">
            {{$expenses->render()}}
        </div>
    </div>



@endsection

