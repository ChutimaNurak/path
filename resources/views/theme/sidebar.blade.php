<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
<!-- รอบงาน -->
           <li>
                <a href=""><i class="fa fa-dashboard fa-fw"></i>รอบงาน
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/') }}/job">ข้อมูลรอบงาน</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}/job/create">เพิ่มข้อมูลรอบงาน</a>
                    </li>
                </ul>
            </li>
<!-- ลูกค้า -->
           <li>
                <a href=" "><i class="#"></i>ลูกค้า
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/') }}/customer">ข้อมูลลูกค้า</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}/customer/create"> เพิ่มข้อมูลลูกค้า </a>
                    </li>
                </ul>
            </li>
<!-- ตำแหน่ง -->
            <li>
                <a href="#"><i class="#"></i>ข้อมูลที่อยู่ลูกค้า
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/') }}/position">ข้อมูลที่อยู่ลูกค้า</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/') }}/position/create">เพิ่มข้อมูลที่อยู่ลูกค้า</a>
                    </li>
                </ul>
            </li>
<!-- เส้นทาง -->
            <li>
                <a href="#"><i class="#"></i>ข้อมูลเส้นทาง
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/') }}/route">ข้อมูลเส้นทาง</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/') }}/route/create">เพิ่มข้อมูลเส้นทาง</a>
                    </li>
                </ul>
            </li>
<!--คำนวณเส้นทาง-->
            <li>
                <a href="#"><i class="#"></i>คำนวณเส้นทาง</a>
            </li>
<!-- 
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.html">Blank Page</a>
                    </li>

                    <li>
                        <a href="login.html">Login Page</a>
                    </li>
                </ul>
            </li>
-->
        </ul>
    </div>
</div>