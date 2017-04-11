<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img alt="User Image" class="img-circle" src="/images/utilities/administrator.png">
                </img>
            </div>
            <div class="pull-left info">
                <p>
                    Alexander Pierce
                </p>
                <a href="#">
                    <i class="fa fa-circle text-success">
                    </i>
                    Online
                </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" class="sidebar-form" method="get">
            <div class="input-group">
                <input class="form-control" name="q" placeholder="Search..." type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-flat" id="search-btn" name="search" type="submit">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </span>
                </input>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">
                MAIN NAVIGATION
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-tasks">
                    </i>
                    Category
                </a>
            </li>
            <li>
                <a href="{{  route('products.index') }}">
                    <i class="fa fa-cube">
                    </i>
                    Product
                </a>
            </li>
              <li>
                <a href="{{ route('stock.index') }}">
                    <i class="fa fa-database">
                    </i>
                    Stock
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-cart-arrow-down">
                    </i>
                    Order
                </a>
            </li>
             <li>
                <a href=" {{ url('/admin/post') }}">
                    <i class="fa fa-book">
                    </i>
                    Post
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>