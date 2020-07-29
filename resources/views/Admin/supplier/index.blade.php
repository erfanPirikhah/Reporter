@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h2 class="panel-title" style="float: right">لیست تامین کننده<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h2>

                <a href="{{route('supplier.create')}}" style="float: left" class=" btn btn-xlg bg-teal-400">  افزودن تامین کننده <i
                            class="fa fa-plus "></i></a>
            </div>

        </div>

        <div class="panel-body">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام تامین کننده</th>
                    <th>شماره ی تامین کننده</th>
                    <th>تاریخ ثبت</th>
                    <th>نمایش</th>
                    <th>تنظیمات</th>


                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$supplier->nameSupplier}}</td>
                        <td>{{$supplier->number_phone}}</td>
                        <td> {{Verta($supplier->created_at)->formatDate()}}</td>
                        <td><a href="{{Route('supplier.show',["supplier"=>$supplier->id])}}" class="btn btn-default btn-raised legitRipple">جزئیات </a> </td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                                <form action="{{Route('supplier.destroy',["supplier"=>$supplier->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{Route('supplier.edit',["supplier"=>$supplier->id])}}" class="btn btn-info btn-rounded legitRipple">ویرایش <i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-rounded legitRipple" onclick="archiveFunction()"> حذف  <i class="fa fa-trash"></i></button>
                                    </div>
                                </form>

                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>



@endsection

