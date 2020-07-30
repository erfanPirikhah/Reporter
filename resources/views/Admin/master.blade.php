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



@yield('script')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</html>
