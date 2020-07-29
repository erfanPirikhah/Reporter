@extends('Admin.master')
@section('content')
    <div class="col-md-12">

        @include('Admin.layout.errors')
        <!-- Basic legend -->
        <form class="form-horizontal" method="post" action="{{route('commodity.create')}}">
            {{csrf_field()}}
            <div class="panel panel-flat">


                <div class="panel-body">
                    <fieldset>
                        <div>
                            <a href="{{route('commodity.index')}}" style="float: left" class=" btn btn-xlg bg-teal-400">  بازگشت <i
                                        class="fa fa-arrow-circle-o-left "></i></a>
                            <legend class="text-semibold"><h2>افزودن کالای جدید</h2></legend>

                        </div>


                        <div class="form-group" id="nameGroup">
                            <label class="col-lg-3 control-label">نام کالا: </label>
                            <div class="col-lg-9">
                                <input type="text" name="nameSupplier" id="nameSupplier" class="form-control" placeholder="نام  کالا را وارد کنید">
                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-lg-3 control-label">انتخاب تامین کننده :</label>

                            <div class="col-lg-9">
                                <select class=" select select2-hidden-accessible" tabindex="-1" aria-hidden="true">

                                        <option>انتخاب کنید</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="WY">Wyoming</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="numberGroup">
                            <label class="col-lg-3 control-label">شماره موبایل:</label>
                            <div class="col-lg-9">
                                <input type="text"  name="numberSupplier" id="numberSupplier" class="form-control" pattern="09(0[1-2]|1[0-9]|3[0-9]|2[0-1])-?[0-9]{3}-?[0-9]{4}" placeholder="شماره  موبایل را وارد کنید ">
                            </div>
                        </div>



                        <div class="form-group" >
                            <label class="col-lg-3 control-label">توضیحات:</label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="description" id="description" class="form-control" placeholder="توضیحات را وارد نماید"></textarea>

                            </div>

                        </div>
                    </fieldset>



                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">ثبت <i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic legend -->

    </div>


{{--    <script>--}}
{{--        const form = document.querySelector('form');--}}
{{--        form.addEventListener('submit' , validate);--}}


{{--        function validate (e){--}}
{{--            e.preventDefault()--}}
{{--            ///----------get Vlaue in form and save the varibale--}}
{{--            const name=document.querySelector('#nameSupplier').value--}}
{{--            const number=document.querySelector('#numberSupplier').value--}}
{{--            const disc=document.querySelector('#description').value--}}



{{--            const className = " badge badge-danger";--}}
{{--            ///---------check NameSpuller value  if null show Error message--}}
{{--            if (name==""){--}}
{{--                ///create new Element div--}}
{{--                const div= document.createElement('div')--}}
{{--                ///append text to div--}}
{{--                div.appendChild(document.createTextNode('  نام را وارد کنید'))--}}
{{--                ///add class badge to div--}}
{{--                div.className=className--}}
{{--                ///append div to nameGroup--}}
{{--                const nameGroup = document.querySelector('#nameGroup')--}}
{{--                nameGroup.appendChild(div)--}}
{{--                ///delete tag div affter 3 secend--}}
{{--                setTimeout(()=>{--}}
{{--                    div.remove()--}}
{{--                },3000)--}}
{{--            }--}}

{{--            ///---------check numberSpuller value  if null show Error message--}}
{{--            if (number==""){--}}
{{--                ///create new Element div--}}
{{--                const div= document.createElement('div')--}}
{{--                ///append text to div--}}
{{--                div.appendChild(document.createTextNode('شماره ی موبایل  را وارد کنید'))--}}
{{--                ///add class badge to div--}}
{{--                div.className=className--}}
{{--                ///append div to nameGroup--}}
{{--                const nameGroup = document.querySelector('#numberGroup')--}}
{{--                nameGroup.appendChild(div)--}}
{{--                ///delete tag div affter 3 secend--}}
{{--                setTimeout(()=>{--}}
{{--                    div.remove()--}}
{{--                },3000)--}}
{{--            }--}}


{{--            ///---------check description value  if null show Error message--}}
{{--            if (disc==""){--}}
{{--                ///create new Element div--}}
{{--                const div= document.createElement('div')--}}
{{--                ///append text to div--}}
{{--                div.appendChild(document.createTextNode('توضیحات  را وارد کنید'))--}}
{{--                ///add class badge to div--}}
{{--                div.className=className--}}
{{--                ///append div to nameGroup--}}
{{--                const nameGroup = document.querySelector('#discSupplier')--}}
{{--                nameGroup.appendChild(div)--}}
{{--                ///delete tag div affter 3 secend--}}
{{--                setTimeout(()=>{--}}
{{--                    div.remove()--}}
{{--                },3000)--}}

{{--            }--}}

{{--            axios.post('supplier',{name,number,disc})--}}
{{--                .then(data =>console.log(data))--}}
{{--        }--}}


{{--    </script>--}}
@endsection
