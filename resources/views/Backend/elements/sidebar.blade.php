<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fe-airplay"></i>
                        <span> Trang chủ </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-book"></i>
                        <span> Bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('newsCategory')}}">Danh mục Bài viết</a></li>
                        <li><a href="{{ route('news')}}">Danh sách Bài viết</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-book"></i>
                        <span> Dịch vụ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('service')}}">Danh sách Dịch vụ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-image"></i>
                        <span> Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('s')}}">Section trang chủ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Quản trị viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('user')}}">Danh sách User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-settings"></i>
                        <span> Cấu hình </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="#">Thông tin web</a></li>
                        <li><a href="#">Headline</a></li>
                    </ul>
                </li>
            </ul>

        </div>

        <!-- End Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
