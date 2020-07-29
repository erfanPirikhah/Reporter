@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Striped rows<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            Example of a table with <code>striped</code> rows. Use <code>.table-striped</code> added to the base <code>.table</code> class to add zebra-striping to any table odd row within the <code>&lt;tbody&gt;</code>. This styling doesn't work in IE8 and lower as <code>:nth-child</code> CSS selector isn't supported in these browser versions. Striped table can be combined with other table styles.
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام تامین کننده </th>
                    <th>شماره ی تامین کننده</th>
                    <th>تاریخ ثبت</th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$supplier->nameSupplier}}</td>
                        <td>{{$supplier->number_phone}}</td>
                        <td> {{jdate($supplier->created_at)->date()}}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection

