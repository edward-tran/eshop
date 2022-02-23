<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion " id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{ url('dashboard') }}" style="color: black;"> 
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Category</div>
                            <a class="nav-link" href="{{ url ('categories') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
                                Categories
                            </a>
                            <a class="nav-link" href="{{ url ('add-category') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus"></i></div>
                                Add Category
                            </a>
                            <div class="sb-sidenav-menu-heading">Product</div>
                            <a class="nav-link" href="{{ url ('products') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="{{ url ('add-product') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus"></i></div>
                                Add Product
                            </a>
                            <div class="sb-sidenav-menu-heading">Order</div>
                            <a class="nav-link" href="{{ url ('orders') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
                                Orders
                            </a>
                            <div class="sb-sidenav-menu-heading">User</div>
                            <a class="nav-link" href="{{ url ('users') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
                                Users
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">Login</a>
                                            <a class="nav-link" href="#">Register</a>
                                            <a class="nav-link" href="#">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:
                          <h5>{{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                </nav>
            </div>