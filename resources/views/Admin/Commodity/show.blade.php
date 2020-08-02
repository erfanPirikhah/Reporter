@extends('Admin.master')
@section('content')


 
    
    <div class="panel panel-info panel-bordered">
        <div class="panel-heading">
            <h6 class="panel-title">جزئیات<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
            <div class="heading-elements">

            </div>
        </div>


                <div class="content">
                    <table style="width:100%">
                        <tr>
                            {{--  $supplier resive on from supplierController@show--}}
        
                            <th>نام کالا</th>
                            <th>کد کالا</th>
                            <th>تامین کننده</th>
                            <th>قیمت:</th>
                            <td><h5 class="no-margin">آخرین بروزرسانی:</h5></td>
                            <th> وضعیت:</th>
                        </tr>
                        <br>
                        <tr>
                            <td><b>{{$commodity->nameCommodity}}</b></td>
                            <td>{{$commodity->codeCommodity}}</td>
                            <td>{{$commodity->Supplier->nameSupplier}}</td>
                            <td>{{$commodity->priceCommodity}}</td>
                            <td> {{Verta($commodity->created_at)->formatDate()}}</td>
                            <td> <span class="{{$commodity->status  ?  'label label-success' : 'label label-danger'}}">{{$commodity->status  ? 'موجود' : 'نامجود'}}</span></td>
                        </tr>
        
                    </table>
                    <br>
                    <hr>

                    <small> توضیحات :</small>
                    <div class="col-sm-5">

                        <div class="well ">
                            <label for="">
                                تامین کننده :
                                {{$commodity->Supplier->nameSupplier}}
                            </label><br>
                            <label for="">
                               شماره تماس :
                                {{$commodity->Supplier->number_phone}}
                            </label><br>
                            <label for="">
                                توضیحات :
                                {{$commodity->Supplier->description}}
                            </label>
        
                        </div>
        
        
                    </div>
                    <div class="col-sm-5">
                        <small> تصویر  :</small>
                        <img src="{{$commodity->imageUrl}}" class="img-responsive " alt="..." width="90%" height="70%" >
                    </div>
        
                </div>
           
         


            
         

       



        <br><br>
    </div>





@endsection