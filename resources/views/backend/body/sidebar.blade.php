<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('back/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Dashboard</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.index') }}">
                        <i class='bx bx-radio-circle'></i>Dashboard
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i></div>
                <div class="menu-title">Room Types</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('roomtype.create') }}">
                        <i class='bx bx-plus-circle'></i>Create Room Type
                    </a>
                </li>
                <li> 
                    <a href="{{ route('roomtype.index') }}">
                        <i class='bx bx-show'></i>Show Room Types
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-bed'></i></div>
                <div class="menu-title">Rooms</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('room.create') }}">
                        <i class='bx bx-plus-circle'></i>Create Room
                    </a>
                </li>
                <li> 
                    <a href="{{ route('room.index') }}">
                        <i class='bx bx-show'></i>Show Rooms
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-calendar'></i></div>
                <div class="menu-title">Booking</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.bookings.index') }}">
                        <i class='bx bx-list-check'></i>Booking Requests
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
