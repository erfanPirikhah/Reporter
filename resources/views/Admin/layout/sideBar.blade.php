<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">




        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

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


                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>