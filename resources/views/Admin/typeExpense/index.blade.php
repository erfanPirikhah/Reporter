@extends('Admin.master')
@section('content')

    <div class="col-md-5 container">
    @include('Admin.layout.errors')
        <!-- /basic legend -->
       <div>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                   data-whatever="@mdo">افزودن نوع هزینه <i class="fa fa-plus"></i>
           </button>
           <div class="panel panel-flat container">
               <div class="panel-body">
                   <div class="table-responsive col-md-12">


                       <table class="table table-striped" >
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>نوع هزینه </th>
                               <th>حذف</th>

                           </tr>
                           </thead>
                           <tbody>
                           @foreach($typeExpenses as $typeExpense)
                               <tr>
                                   <th>{{$counter++}}</th>
                                   <th>{{$typeExpense->name}}</th>
                                   <th>
                                       <form action="{{Route('typeExpense.destroy',["typeExpense"=>$typeExpense->id])}}" method="post">
                                           {{ method_field('DELETE') }}
                                           {{ csrf_field() }}
                                           <div class="btn-group mr-2" role="group" aria-label="First group">
                                               <button class="btn btn-danger btn-rounded legitRipple" onclick="archiveFunction()"> حذف  <i class="fa fa-trash"></i></button>
                                           </div>
                                       </form>
                                   </th>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
               <br><br>
               <div style="text-align: center">
                   {{$typeExpenses->render()}}
               </div>
           </div>
       </div>


    <!-- Basic legend -->




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن نوع هزینه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('typeExpense.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">نام:</label>
                                <input type="text" name="nameTypeExpense" id="nameSupplier" class="form-control"
                                       value="{{ old('nameTypeExpense')}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن<i class="fa fa-close"></i></button>
                                <button type="submit" class="btn btn-primary">ارسال <i class="fa fa-arrow-circle-o-left"></i></button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>


@endsection