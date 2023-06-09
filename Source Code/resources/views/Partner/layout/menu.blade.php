<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;0,500;1,500&family=Srisakdi&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Kanit', sans-serif;
    }
 
</style>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="text-primary">Asiathai Partner </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}"class="text-primary">AP</a>
        </div>
        <ul class="sidebar-menu">

            {{-- @if(Auth::guard('partner')->user()->position == '1'||Auth::guard('web')->user()->position == '2') --}}
            <li class="menu-header">จัดการที่พัก</li>
            <li class="{{ Request::segment(2) == 'Dashboard'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Dashboard') }}"><i class="fa fa-address-card"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::segment(2) == 'Poolvilla'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Poolvilla/Index') }}"><i class="fa fa-home"></i><span>Poolvilla</span></a></li>
            <li class="{{ Request::segment(2) == 'Reservation'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Reservation') }}"><i class="fa fa-check-square"></i><span>Reservation</span></a></li>
            <li class="{{ Request::segment(2) == 'Finace'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Finace') }}"><i class="fa fa-file" aria-hidden="true"></i>Finace</span></a></li>
            <li class="{{ Request::segment(2) == 'Inbox'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Inbox') }}"><i class="fa fa-envelope"></i><span>Inbox</span></a></li>
            <li class="{{ Request::segment(2) == 'Reviews'  ? 'active ' : null }} "><a class="nav-link " href="{{ url('Partner/Reviews') }}"><i class="fa fa-star"></i><span>Reviews</span></a></li>
           
    

            {{-- @endif --}}

       

                
            



   
        </ul>
    </aside>
    </div>
