@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h2 class="panel-title" style="float: right">لیست فروش <a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h2>

                <a href="{{route('sale.create')}}" style="float: left" class=" btn btn-xlg bg-teal-400">    ثبت فروش <i
                            class="fa fa-plus "></i></a>
            </div>

        </div>

        <div class="panel-body">
        </div>


                <div class="table-responsive ">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <form action="{{route('sale.search')}}" method="get">
                            <input type="text" class="" name="search" placeholder="جستوجو..." aria-controls="DataTables_Table_0">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>


                    </div>
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام خریدار</th>
                            <th>شهر خریدار</th>
                            <th>شماره پیگری فروشنده</th>
                            <th>شماره پیگیری خریدار</th>
                            <th>قیمت کل</th>
                            <th>تاریخ </th>
                            <th>نمایش</th>
                            <th>تنظیمات</th>


                        </tr>
                        </thead>
                        <tbody>

                        {{--              $sales resive on from commodityController@index--}}
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$sale->buyerName}}</td>
                                <td>{{$sale->buyerCity}}</td>
                                <td>{{$sale->sellerCode}}</td>
                                <td>{{$sale->buyerCode}}</td>
                                <td>{{$sale->price}}</td>
                                <td> {{Verta($sale->created_at)->formatDate()}}</td>


                                <td><a href="{{Route('sale.show',["sale"=>$sale->id])}}" class="btn btn-default btn-raised legitRipple">جزئیات </a> </td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                                        <form action="{{Route('sale.destroy',["sale"=>$sale->id])}}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{Route('sale.edit',["sale"=>$sale->id])}}" class="btn btn-info btn-rounded legitRipple">ویرایش <i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-rounded legitRipple" onclick="archiveFunction()"> حذف  <i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>


        </div>

        <br><br>
        <div style="text-align: center">
            {{$sales->render()}}
        </div>
    </div>



@endsection

