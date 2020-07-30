@include('Admin.layout.header')

<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
    @include('Admin.layout.sideBar')
    <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->

            <!-- /page header -->


            <!-- Content area -->
            <div class="content">


                @yield('content')

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<!-- ./alart ------------------- -->
<script src="/assets/js/alert.js">

</script>


@include('sweetalert::alert')











<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="/assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="/assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="/assets/js/pages/form_select2.js"></script>

<script type="text/javascript" src="/assets/js/core/app.js"></script>
<script type="text/javascript" src="/assets/js/pages/alpaca_basic.js"></script>

<script type="text/javascript" src="/assets/js/plugins/ui/ripple.min.js"></script>
<script type="text/javascript" src="/assets/js/sweetalert.min.js"></script>
{{--Persion datePicker --}}
<script type="text/javascript" src="/assets/js/persian-date.min.js"></script>
<script type="text/javascript" src="/assets/js/persian-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#mydate").persianDatepicker({
            altField: '#mydate',
            altFormat: "YYYY/MM/DD",
            observer: true,
            format: 'YYYY/MM/DD',
            initialValue: false,
            initialValueType: 'persian',
            autoClose: true,
            maxDate: 'today',
        });
    });

</script>
{{--End  Persion datePicker --}}
@yield('script')

</body>

</html>
