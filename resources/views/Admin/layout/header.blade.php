<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open"></i> </div>
        <div class="sidebar-brand-text mx-3"> Books control panel </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard </span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
Books Management
    </div>
   <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.books.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>(Show Books)</span>
        </a>
    </li>

   <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.books.create') }}">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>(Add New Books)</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
Orders and customers
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>(Orders)</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>(Users)</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link btn btn-link text-start w-100" style="border: none; background: none;">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </form>
</li>
</ul>


