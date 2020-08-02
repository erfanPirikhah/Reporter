@extends('Admin.master')

@section('script')

    <script>
       async function val() {
           ///select input supp for give value to send backend
           var id = document.getElementById("supp").value;

           ///send value to route and result commodity and sale by filter supplier
      await axios.post('/api/supplier',{id})
            .then(data=>{
                let items =data.data
                let counter=1;
                ///select input suppTbl for the generate table
                let result= document.querySelector('#suppTbl')
                result.innerHTML =''
                items.forEach(item=>{
                    item.sales.forEach(sale =>{

                    /// inner  item  to table
                        result.innerHTML += `
                            <tr>
                                <td>${counter++}</td>
                                <td>${sale.buyerName}</td>
                                <td>${sale.buyerCity}</td>
                                <td>${sale.sellerCode}</td>
                                <td>${sale.buyerCode}</td>
                                <td>${sale.price}</td>
                            </tr>
                        `
                    })
                })
            })
        }

    </script>
@endsection
@section('content')

    <div class="col-md-8">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">گزارشات<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                <div class="heading-elements">

                </div>
            </div>

            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                        <li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab" class="legitRipple" aria-expanded="false">بر اساس تامین کننده</a></li>
                        <li class=""><a href="#highlighted-justified-tab2" data-toggle="tab" class="legitRipple" aria-expanded="true">Inactive</a></li>
                        <li class=""><a href="#highlighted-justified-tab2" data-toggle="tab" class="legitRipple" aria-expanded="true">Inactive</a></li>

                    </ul>

                    <div class="form-group">
                        <label class="display-block">انتخاب تامین کننده</label>
                        <select class="select-fixed-single select2-hidden-accessible" onchange="val()" name="supp" id="supp" tabindex="-1" aria-hidden="true">
                            <option> یک گزینه را انتخاب کنید </option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->nameSupplier}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane active" id="highlighted-justified-tab1">
                            <div class="table-responsive ">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام خریدار</th>
                                        <th>نام شهر</th>
                                        <th>شماره پیگری فروشنده</th>
                                        <th>شماره پیگیری خریدار</th>
                                        <th>قیمت کل</th>



                                    </tr>
                                    </thead>
                                    <tbody id="suppTbl">




                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane " id="highlighted-justified-tab2">
                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                        </div>

                        <div class="tab-pane" id="highlighted-justified-tab3">
                            DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                        </div>

                        <div class="tab-pane" id="highlighted-justified-tab4">
                            Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-flat">


            <!-- Numbers -->
            <div class="container-fluid">
                <div class="row text-center">
                    <br>
                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> تومان:{{$week}}</h6>
                            <span class="text-muted text-size-small">فروش در هفته</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> تومان:{{$month}}</h6>
                            <span class="text-muted text-size-small">فروش در یک ماه</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> تومان:{{$day}}</h6>
                            <span class="text-muted text-size-small">فروش در یک روز</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /numbers -->




        </div>

    </div>



@endsection

