@extends('Admin.master')

@section('script')
    <script>
        $('#commodite').on('change',function() {


            ///get Data_id value
            var result = $("#commodite option:selected").map(function() {
                return $(this).attr('data_id');
            }).get();
            /// var sum
            var sum = 0;
            /// foreach and sums values
            $.each(result,function(key, value){
                    var val = JSON.parse(value)
                    sum =parseInt(val)+sum;
            })





            function total ()
            {
                let className='alert alert-primary alert-styled-left';
                let div=document.createElement("div")
                div.appendChild(document.createTextNode(`کل حساب : ${sum}`))
                div.className=className;
                document.querySelector('#result').appendChild(div)

                /// input hidden price for send to laravel request
                document.querySelector('#price').value = sum
            }

            ///check exist div sum to remove
            if(document.querySelector('#result').firstChild){
                document.querySelector('#result').firstChild.remove()
                total ()
            }else {
                total ()
            }


        });



    </script>
@endsection

@section('content')
    <div class="col-md-12">

    @include('Admin.layout.errors')
    <!-- Basic legend -->
        <form class="form-horizontal" method="post" action="{{route('sale.store')}}">
            {{csrf_field()}}
            <div class="panel panel-flat">
                <div class="panel-body">
                    <fieldset>
                        <div>
                            <a href="{{route('commodity.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">
                                بازگشت <i
                                        class="fa fa-arrow-circle-o-left "></i></a>
                            <legend class="text-semibold"><h2>ثبت فروش</h2></legend>

                        </div>
                        <br>
                        <div class="form-group" id="nameGroup">
                            <label class="col-lg-3 control-label">نام خریدار: </label>
                            <div class="col-lg-9">
                                <input type="text" name="buyerName" class="form-control"
                                       placeholder="نام  کالا را وارد کنید"   value="{{ old('buyerName')}}">
                            </div>
                        </div>

                        <br>
                        <div class="form-group" id="nameGroup">
                            <label class="col-lg-3 control-label">نام شهر خریدار :</label>
                            <div class="col-lg-9">
                                <input type="text" name="buyerCity"  class="form-control"
                                       placeholder="نام  کالا را وارد کنید"   value="{{ old('buyerCity')}}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group" >
                            <label class="col-lg-3 control-label">تاریخ:</label>
                            <div class="col-lg-9">
                                <input type="text" name="date" class="myclass"  placeholder="تاریخ" id="mydate" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group" id="numberGroup">
                            <label class="col-lg-3 control-label">شماره موبایل:</label>
                            <div class="col-lg-9">
                                <input type="text"  name="phoneBuyer"  class="form-control" value="{{ old('phoneBuyer')}}" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" placeholder="شماره  موبایل را وارد کنید ">
                            </div>
                        </div>

                        <br><br><br>
                        <div class="form-group" >
                            <label class="col-lg-3 control-label">انتخاب کالا</label>
                            <div class="col-lg-9">
                                <select multiple="" id="commodite" name="commodity_id[]" class="select-border-color border-warning select2-hidden-accessible" tabindex="-1" aria-hidden="true" >
                                       @foreach($commoditis as $commodite)
                                        <option value="{{$commodite->id}}" data_id="[{{$commodite->priceCommodity}}]" >{{$commodite->nameCommodity}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <input type="hidden" name="price" id="price" value="">
                    </fieldset>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">ثبت <i
                                    class="icon-arrow-left13 position-right"></i></button>
                    </div>
                    <br>
                    <div id="result" class="container col-md-6 center">

                    </div>
                </div>

            </div>
        </form>
        <!-- /basic legend -->



    </div>




@endsection
