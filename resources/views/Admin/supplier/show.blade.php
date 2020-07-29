@extends('Admin.master')
@section('content')



    <div class="panel panel-info panel-bordered">
    <div class="panel-heading">
        <h6 class="panel-title">Info panel<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
        <div class="heading-elements">

        </div>
    </div>

    <div class="panel-body">
        <div class="content-group-sm">
            <h1 class="no-margin">نام و نام خانوادگی :</h1>
            <h1 class="no-margin">{{$supplier->nameSupplier}}</h1>
        </div>

        <div class="content-group-sm">
            <h1 class="no-margin">نام و نام خانوادگی :</h1>
            <h2 class="no-margin text-light">{{$supplier->number_phone}}</h2>
        </div>
        <small> توضیحات :</small>
        <div class="well">

            {{$supplier->description}}
        </div>
    </div>
</div>

@endsection