@include('Partner/layout/sweetalert')
<div class="navbar-bg" style="background-color: orange;"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
  
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('asset/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">สวัสดี, {{Auth::guard('partner')->user()->firstname}} </div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ url('Partner/EditMyProfile') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> ข้อมูลผู้ใช้งาน
            </a>
            <a href="{{ url('Partner/ChagePassword') }}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> รหัสผ่าน
            </a>
           <div class="dropdown-divider"></div>
            <a href="{{ url('Partner/logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
            </a>
        </div>
        </li>
    </ul>
</nav>
