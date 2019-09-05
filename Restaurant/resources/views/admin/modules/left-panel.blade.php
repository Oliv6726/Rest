<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin/') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Product Management</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa-cutlery fa"></i>Manage Menus</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Create Menu</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Menu List</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Manage Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li id="menu-choice"><i class="fa fa-table"></i><a href="{{ url('/admin/category/create') }}">Create Category</a></li>
                            <li id="menu-choice"><i class="fa fa-table"></i><a href="{{ url('/admin/category/list') }}">Category list</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Manage Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Create Product</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Product List</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Order Management</li><!-- /.menu-title -->
                            <li><a href="page-login.html">Active Orders</a>
                            <a href="page-register.html">All Orders</a></li>

                    <li class="menu-title">Staff Management</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Staff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Create Staff</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Staff list</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>