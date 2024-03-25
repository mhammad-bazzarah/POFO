<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <div class="d-sm-none d-lg-inline-block">Hi,{{ Auth()->User()->name }}!</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('admin.settings') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">POFO</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{setSidebarActive(['dashboard'])}}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Sections</li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.hyperTitle.*' ,'admin.hero.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Hero</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.hyperTitle.*'])}}">
                        <a class="nav-link" href="{{ route('admin.hyperTitle.index') }}">Hyper Title</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.hero.*'])}}">
                        <a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Section</a>
                    </li>

                </ul>
            </li>
            <li class="{{setSidebarActive(['admin.service.*'])}}">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="far fa-square"></i>
                    <span>Services</span>
                </a>
            </li>
            <li class="{{setSidebarActive(['admin.about.*'])}}">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="far fa-square"></i>
                    <span>About Me</span>
                </a>
            </li>
            <li class="nav-item dropdown {{setSidebarActive([
                'admin.portfolioCategory.*',
                'admin.portfolioItem.*',
                'admin.portfolioSettings.*',
                ])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio Section</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.portfolioCategory.*'])}}">
                        <a class="nav-link" href="{{ route('admin.portfolioCategory.index') }}">Category</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.portfolioItem.*'])}}">
                        <a class="nav-link" href="{{ route('admin.portfolioItem.index') }}">Portfolio Items</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.portfolioSettings.*'])}}">
                        <a class="nav-link" href="{{ route('admin.portfolioSettings.index') }}">PortFolio Settings</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive([
                'admin.skillsItems.*' ,
                'admin.skillsSettings.*'
                ])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skills Section</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.skillsItems.*'])}}">
                        <a class="nav-link" href="{{ route('admin.skillsItems.index') }}">Skills Items</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.skillsSettings.*'])}}">
                        <a class="nav-link" href="{{ route('admin.skillsSettings.index') }}">Skills Settings</a>
                    </li>
                </ul>
            </li>
            <li class="{{setSidebarActive(['admin.experience.*'])}}">
                <a class="nav-link" href="{{ route('admin.experience.index') }}">
                    <i class="far fa-square"></i>
                    <span>Experience Section</span>
                </a>
            </li>
            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Feedback Section</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.feedback.index') }}">Feedbacks</a></li>
                    <li><a class="nav-link" href="{{ route('admin.feedbackSettings.index') }}">Feedback Settings</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive([
                'admin.blogCategory.*',
                'admin.blogs.*',
                'admin.blogSettings.*',
                ])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Blog Section</span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.blogCategory.*'])}}">
                        <a class="nav-link" href="{{ route('admin.blogCategory.index') }}">Category</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.blogs.*'])}}">
                        <a class="nav-link" href="{{ route('admin.blogs.index') }}">Blog Item</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.blogSettings.*'])}}">
                        <a class="nav-link" href="{{ route('admin.blogSettings.index') }}">Blog Settings</a>
                    </li>
                </ul>
            </li>
            <li class="{{setSidebarActive(['admin.contactSettings.*'])}}">
                <a class="nav-link" href="{{ route('admin.contactSettings.index') }}">
                    <i class="far fa-square"></i>
                    <span> Contact Settings</span>
                </a>
            </li>
            <li class="nav-item dropdown {{setSidebarActive([
                'admin.footerSocial.*' ,
                'admin.footerInfo.*' ,
                'admin.footerContactInfo.*' ,
                'admin.footerUseful.*' ,
                'admin.footerHelp.*' ,
                ])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Footer </span>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.footerSocial.*'])}}">
                        <a class="nav-link " href="{{ route('admin.footerSocial.index') }}">Social Links</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.footerInfo.*'])}}">
                        <a class="nav-link" href="{{ route('admin.footerInfo.index') }}">Footer Info</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.footerContactInfo.*'])}}">
                        <a class="nav-link" href="{{ route('admin.footerContactInfo.index') }}">Contact Info</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.footerUseful.*'])}}">
                        <a class="nav-link" href="{{ route('admin.footerUseful.index') }}">Usefull Links</a>
                    </li>
                    <li class="{{setSidebarActive(['admin.footerHelp.*'])}}">
                        <a class="nav-link" href="{{ route('admin.footerHelp.index') }}">Help Links </a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Settings</li>
            <li class="{{setSidebarActive(['admin.settings'])}}">
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    <i class="far fa-square"></i>
                    <span> Settings</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
