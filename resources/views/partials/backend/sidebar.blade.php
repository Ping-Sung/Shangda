<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
		<a class="nav-link" href="{{ route('backend') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>{{ __('Dashboard') }}</span>
		</a>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-user-friends"></i>
			<span>{{ __('People Management') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
			<a class="dropdown-item" href="{{ route('users.index') }}">{{ __('Staffs') }}</a>
			<a class="dropdown-item" href="{{ route('suppliers.index') }}">{{ __('Suppliers') }}</a>
			<a class="dropdown-item" href="#">{{ __('Consumers') }}</a>
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">{{ __('Related:') }}</h6>
			<a class="dropdown-item" href="#">{{ __('Job Titles') }}</a>
		</div>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-dolly-flatbed"></i>
			<span>{{ __('Stuffs Management') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
			<a class="dropdown-item" href="{{ route('materials.index') }}">{{ __('Materials') }}</a>
			<a class="dropdown-item" href="#">{{ __('Products') }}</a>
			<h6 class="dropdown-header">{{ __('Related:') }}</h6>
			<a class="dropdown-item" href="#">{{ __('Categories') }}</a>
		</div>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fab fa-wpforms"></i>
			<span>{{ __('Orders Management') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
			<a class="dropdown-item" href="#">{{ __('Purchase Orders') }}</a>
			<a class="dropdown-item" href="#">{{ __('Sales Orders') }}</a>
			<a class="dropdown-item" href="#">{{ __('Return Orders') }}</a>
		</div>
	</li>
	
</ul>