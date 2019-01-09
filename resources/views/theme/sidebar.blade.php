<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <!--   <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li> -->
            <li>
                <img src="{{url('/')}}/img/2.png"/>
            </li>
           <!--  <div style="font-size: 18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นางสาวชุติมา  นุรักษ์ </div> -->
            <br>
            <!-- ลูกค้า -->
            <li>
                <a href="{{ url('/') }}/customer">
                    <i class="fa fa-user "></i> ข้อมูลลูกค้า
                </a>
                
            </li>
           <br>
            <!-- รอบงาน -->
            <li>
                <a href="{{ url('/') }}/job">
                    <i class="fa fa-truck "></i> ข้อมูลรอบงาน
                </a>
            </li>
        </ul>
    </div>
</div>