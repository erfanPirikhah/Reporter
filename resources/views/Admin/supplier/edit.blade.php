@extends('Admin.master')
@section('content')
    <div class="col-md-12">

    @include('Admin.layout.errors')
    <!-- Basic legend -->
        <form class="form-horizontal" method="post" action="{{route('supplier.update',['supplier'=>$supplier->id])}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="panel panel-flat">


                <div class="panel-body">
                    <fieldset>
                        <div>
                            <a href="{{route('supplier.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">  بازگشت <i
                                        class="fa fa-arrow-circle-o-left "></i></a>
                            <legend class="text-semibold"><h2>ویرایش تامین کننده </h2></legend>

                        </div>


                        <div class="form-group" id="nameGroup">
                            <label class="col-lg-3 control-label">نام تامین کننده: </label>
                            <div class="col-lg-9">
                                <input type="text" name="nameSupplier" id="nameSupplier" class="form-control" value="{{$supplier->nameSupplier}}" placeholder="نام تامین کننده را وارد کنید">
                            </div>

                        </div>

                        <div class="form-group" id="numberGroup">
                            <label class="col-lg-3 control-label">شماره موبایل:</label>
                            <div class="col-lg-9">
                                <input type="text"  name="numberSupplier" id="numberSupplier" class="form-control" value="{{$supplier->number_phone}}" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" placeholder="شماره  موبایل را وارد کنید ">
                            </div>
                        </div>



                        <div class="form-group" >
                            <label class="col-lg-3 control-label">توضیحات:</label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description" id="description" class="form-control" placeholder="توضیحات را وارد نماید">{{$supplier->description}}</textarea>

                            </div>

                        </div>
                        <br><br>
                        <div class="form-group" >
                            <label class="col-lg-3 control-label">تاریخ:</label>
                            <div class="col-lg-9">
                                <input type="text" name="date" class="myclass" value="{{$supplier->created_at}}" placeholder="تاریخ" id="mydate" >
                            </div>

                        </div>
                    </fieldset>



                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">بروزرسانی  <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic legend -->

    </div>


@endsection
