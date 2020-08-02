@extends('Admin.master')
@section('content')


    <div class="panel panel-flat">
        <div class="panel-heading">
            <div>
                <h2 class="panel-title" style="float: right">لیست کالا <a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h2>

                <a href="{{route('commodity.create')}}" style="float: left" class=" btn btn-xlg bg-teal-400">   افزودن کالا <i
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
                    <th>تصویر</th>
                    <th>نام کالا</th>
                    <th>کد کالا</th>
                    <th>تامین کننده</th>
                    <th>قیمت</th>
                
                    <th>وضعیت</th>
                    <th>نمایش</th>
                    <th>تنظیمات</th>


                </tr>
                </thead>
                <tbody>

{{--              $commoditys resive on from commodityController@index--}}
                @foreach($commoditis as $commodity)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td><img src="{{$commodity->imageUrl}}" alt=""  class="img-responsive"  width="90" height="70" ></td>
                        <td>{{$commodity->nameCommodity}}</td>
                        <td>{{$commodity->codeCommodity}}</td>
                        <td>{{$commodity->Supplier->nameSupplier}}</td>

                        <td>{{$commodity->priceCommodity}}</td>
                       
                        <td><span class="{{$commodity->status  ?  'label label-success' : 'label label-danger'}}">{{$commodity->status  ? 'موجود' : 'نامجود'}}</span></td>
                        <td><a href="{{Route('commodity.show',["commodity"=>$commodity->id])}}" class="btn btn-default btn-raised legitRipple">جزئیات </a> </td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                                <form action="{{Route('commodity.destroy',["commodity"=>$commodity->id])}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{Route('commodity.edit',["commodity"=>$commodity->id])}}" class="btn btn-info btn-rounded legitRipple">ویرایش <i class="fa fa-edit"></i></a>
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
            {{$commoditis->render()}}
        </div>
    </div>



@endsection

