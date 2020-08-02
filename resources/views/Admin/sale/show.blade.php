@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h6 class="panel-title">جزئیات<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
            </div>

        </div>

        <div class="panel-body">
            <div class="content">
                <a href="{{route('sale.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">
                    بازگشت <i
                            class="fa fa-arrow-circle-o-left "></i></a>
                <br>
                <hr>


                <div class="col-sm-5">
                    <small> توضیحات :</small>
                    <div class="well ">
                        <label for="">
                            نام خریدار:
                            {{$sale->buyerName}}
                        </label><br>

                        <label for="">
                            شهر خریدار :
                            {{$sale->buyerCity}}
                        </label><br>

                        <label for="">
                            شماره پیگری فروشنده :
                            {{$sale->sellerCode}}
                        </label><br>

                        <label for="">
                            شماره پیگیری خریدار :
                            {{$sale->buyerCode}}
                        </label><br>

                        <label for="">
                            تاریخ :
                            {{Verta($sale->created_at)->formatDate()}}</td>
                        </label><br>

                        <label for="">
                            قیمت کل :
                            {{$sale->price}}
                        </label><br>

                        <label for="">
                            تامین کننده :
                            {{$sale->supplier()->nameSupplier}}
                        </label><br>
                        <label for="">
                           کالا ی ثبت شده همراه قیمت  :
                         <ul >
                             @foreach($sale->commodities as $name )
                                <li class="list-group-item">{{$name->nameCommodity}}       [ {{$name->priceCommodity}}]</li>
                             @endforeach
                         </ul>

                        </label><br>


                    </div>


                </div>


            </div>
        </div>

   
     
    </div>





@endsection