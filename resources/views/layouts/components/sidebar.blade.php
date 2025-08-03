	<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Book </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('book.index') }}">All Book </a></li>
									<li><a href="{{ route('book.create') }}">Create New Book </a></li>
								</ul>
							</li>
						
							
							<li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Student </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('student.index') }}">All Student </a></li>
									<li><a href="{{ route('student.create') }}">Create New Student </a></li>
								</ul>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->