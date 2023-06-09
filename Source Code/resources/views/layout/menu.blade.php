<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="{{url('backend/index')}}">Pool Villa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{url('backend/index')}}">Pool Villa</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Manage Account</li>
            <?php $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('backend')->user()->position)->first(); ?>
            @if($check->page_view == 1)
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='index'||Request::segment(2)=='admin_profile' ||Request::segment(3)=='add-admin'||Request::segment(3)=='update_profile' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin_profile')}}"><i class="fas fa-user"></i> <span> Admin</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='role' ||Request::segment(3)=='add-role'||Request::segment(3)=='update_role'  ? 'active' : null }}"><a class="nav-link" href="{{url('backend/role')}}"><i class="fas fa-user"></i> <span>Role</span> </a></li>
                {{-- <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='index'||Request::segment(2)=='admin_profile' ||Request::segment(3)=='add-admin'||Request::segment(3)=='update_profile' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin_profile')}}"><i class="fas fa-user"></i> <span> Admin</span> </a></li> --}}
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='Partner' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/Partner')}}"><i class="fas fa-hotel"></i> <span>Partner</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='member_profile' ||Request::segment(3)=='add-member'||Request::segment(3)=='update_member'  ? 'active' : null }}"><a class="nav-link" href="{{url('backend/member_profile')}}"><i class="fas fa-users"></i> <span>Member</span> </a></li>
            @endif
            <li class="menu-header">Frontend Control</li>
            @if($check->page_view == 1)
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='admin' && Request::segment(3)=='banner' || Request::segment(3)=='add' || Request::segment(3)=='edit' ? 'active' : null && Request::segment(4)=='discount-rooms' || Request::segment(4)=='add' || Request::segment(4)=='edit' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin/banner')}}"><i class="fas fa-bullhorn"></i> <span>Banner</span> </a></li>
            @endif
            <li class="menu-header">Accessory</li>
            @if($check->page_view == 1)
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='country' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/country')}}"><i class="fas fa-flag"></i> <span>Country</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='enjoy_with' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/enjoy_with')}}"><i class="fab fa-accusoft"></i> <span>Enjoy with</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='admin' && Request::segment(3)=='facilities'||Request::segment(3)=='add_facilities'||Request::segment(3)=='edit_facilities'  ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin/facilities')}}"><i class="fa fa-info-circle"></i> <span>Facilities</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='admin' && Request::segment(3)=='banking'||Request::segment(3)=='add_bank'||Request::segment(3)=='update_bank'  ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin/banking')}}"><i class="fa fa-university"></i> <span>Partner/Member Bank</span> </a></li>
                <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='admin' && Request::segment(3)=='banking_system'||Request::segment(3)=='add_bank_system'||Request::segment(3)=='update_bank_system'  ? 'active' : null }}"><a class="nav-link" href="{{url('backend/admin/banking_system')}}"><i class="fa fa-university"></i> <span>System Bank</span> </a></li>
            @endif
            <li class="menu-header">เมนูที่ยังขาด</li>
            @if($check->page_view == 1)
               <li ><a class="nav-link" ><i class="fas fa-flag"></i> <span>Review Report </span> </a></li>
               <li ><a class="nav-link" ><i class="fas fa-flag"></i> <span>Reversation  </span> </a></li>
               <li><a class="nav-link" ><i class="fas fa-flag"></i> <span>Inbox </span> </a></li>
               <!-- <li class="{{ Request::segment(1) == 'backend' && Request::segment(2)=='country' ? 'active' : null }}"><a class="nav-link" href="{{url('backend/country')}}"><i class="fas fa-flag"></i> <span>Remittance report</span> </a></li> -->
            @endif
        </ul>
    </aside>
    </div>