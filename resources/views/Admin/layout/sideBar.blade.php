<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">




        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <div class="sidebar-user-material mt-0">
                        <div class="category-content">
                            <div class="sidebar-user-material-content">
                                <a href="#" class="legitRipple"><img src="/assets/images/admin.png" class="img-circle img-responsive" alt=""></a>
                                <h6>Admin</h6>
                            </div>
                        </div>
                    </div>



                    <!-- Main -->
                    <li><a href="/"><i class="icon-home4"></i> <span>داشبورد</span></a></li>

                    <li>
                        <a href="#"><i class="fa fa-product-hunt"></i> <span>کالا</span></a>
                        <ul>
                            <li><a href="{{Route('commodity.index')}}"> لیست کالا <i class="fa fa-list"></i></a></li>
                            <li><a href="{{Route('commodity.create')}}">افزودن کالا <i class="fa fa-plus-circle"></i> </a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span>تامین کننده</span></a>
                        <ul>
                            <li><a href="{{Route('supplier.index')}}"> لیست تامین کننده ها <i class="fa fa-list"></i></a></li>
                            <li><a href="{{Route('supplier.create')}}">افزودن تامین کننده <i class="fa fa-user"></i> </a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-money"></i> <span>هزینه ها</span></a>
                        <ul>
                            <li><a href="{{Route('expense.index')}}"> لیست هزینه ها <i class="fa fa-list"></i></a></li>
                            <li><a href="{{Route('expense.create')}}">ثبت هزینه <i class="fa fa-user"></i> </a></li>

                        </ul>
                    </li>

                    <li><a href="{{Route('typeExpense.index')}}"><i class="fa fa-print"></i> <span>نوع هزینه</span></a></li>
                    <li>

                    </li>

                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>