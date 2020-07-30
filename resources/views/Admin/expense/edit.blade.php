@extends('Admin.master')
@section('content')

    <div class="col-md-12">

    @include('Admin.layout.errors')
    <!-- Basic legend -->
        <form class="form-horizontal" action="{{route('expense.update',['expense'=>$expense->id])}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="panel panel-flat">


                <div class="panel-body">
                    <fieldset>
                        <div>
                            <a href="{{route('expense.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">
                                بازگشت <i
                                        class="fa fa-arrow-circle-o-left "></i></a>
                            <legend class="text-semibold"><h2>بروزرسانی هزینه  </h2></legend>

                        </div>





                        <div class="form-group" id="numberGroup">
                            <label class="col-lg-3 control-label">شماره ی سند: </label>
                            <div class="col-lg-9">
                                <input type="text" name="documentNumber" id="numberSupplier" class="form-control"
                                       value="{{ $expense->documentNumber}}"

                                       placeholder="شماره ی سند را وارد کنید ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">نوع هزینه :</label>

                            <div class="col-lg-9">
                                <select name="type" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="" >--انتخاب کنید--</option>
                                    @foreach($typeExpenses as $typeExpense)
                                        <option value="{{$typeExpense->id}}" {{$expense->type_id == $typeExpense->id  ? 'selected' : ''}}>{{$typeExpense->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="col-lg-3 control-label">توضیحات:</label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description" id="description" class="form-control"  placeholder="توضیحات را وارد نماید">{{$expense->description}}</textarea>

                            </div>

                        </div>

                        <br><br>
                        <div class="form-group" >
                            <label class="col-lg-3 control-label">تاریخ:</label>
                            <div class="col-lg-9">
                                <input type="text" name="date" class="myclass" value="{{$expense->created_at}}" placeholder="تاریخ" id="mydate" >
                            </div>

                        </div>


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
