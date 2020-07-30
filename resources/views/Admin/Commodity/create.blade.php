@extends('Admin.master')

@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var domain = "";
        $('#lfm').filemanager('image', {prefix: domain});

    </script>
@endsection

@section('content')
    <div class="col-md-12">

    @include('Admin.layout.errors')
    <!-- Basic legend -->
        <form class="form-horizontal" method="post" action="{{route('commodity.store')}}">
            {{csrf_field()}}
            <div class="panel panel-flat">


                <div class="panel-body">
                    <fieldset>
                        <div>
                            <a href="{{route('commodity.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">
                                بازگشت <i
                                        class="fa fa-arrow-circle-o-left "></i></a>
                            <legend class="text-semibold"><h2>افزودن کالای جدید</h2></legend>

                        </div>


                        <div class="form-group" id="nameGroup">
                            <label class="col-lg-3 control-label">نام کالا: </label>
                            <div class="col-lg-9">
                                <input type="text" name="nameCommodity" id="nameSupplier" class="form-control"
                                       placeholder="نام  کالا را وارد کنید">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">انتخاب تامین کننده :</label>

                            <div class="col-lg-9">
                                <select name="supplier" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option>انتخاب کنید</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->nameSupplier}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="numberGroup">
                            <label class="col-lg-3 control-label">قیمت (تومان):</label>
                            <div class="col-lg-9">
                                <input type="text" name="priceCommodity" id="numberSupplier" class="form-control"
                                       placeholder="قیمت  را وارد کنید ">
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">انتخاب تصویر:</label>
                            <div class="col-lg-4">
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-warning">
                                       <i class="fa fa-picture-o"></i> Choose
                                     </a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                                </div>
                                <img id="holder" name="imageUrl" style="margin-top:15px;max-height:100px;">
                            </div>
                            <div class="col-lg-4 ">

                                <div class="checkbox ml-45">

                                    <div class="form-group">

                                        <label class="radio-inline radio-right">
                                            &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp
                                            <label for="">وضعیت کالا :</label>
                                            <input type="radio" name="status" checked="checked" value="1">
                                           موجود
                                        </label>

                                        <label class="radio-inline radio-right">
                                            <input type="radio" name="status" value="0">
                                          ناموجود
                                        </label>
                                    </div>
                                </div>
                            </div>




                        </div>


                        <br><br>





                    </fieldset>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">ثبت <i
                                    class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic legend -->

    </div>




@endsection
