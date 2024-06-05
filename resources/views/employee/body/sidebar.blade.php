<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('back/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Employee</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="{{ route('employee.index')}}"><i class='bx bx-radio-circle'></i>Default</a>
						</li>
					
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Rooms </div>
					</a>
					<ul>
					
						<li> <a href="{{ route('room.employee.view')}}"><i class='bx bx-radio-circle'></i> show room </a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Booking </div>
					</a>
					<ul>
					
						<li> <a href="{{ route('admin.bookings.index')}}"><i class='bx bx-radio-circle'></i> Booking Request </a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>