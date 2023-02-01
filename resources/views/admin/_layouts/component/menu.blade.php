<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('admin.home') }}">
                        <span class="brand-logo">
                            
                        </span>
                        <h2 class="brand-text mb-0">@lang('pages.site')</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item @php if($menu == 'home') echo 'active' @endphp"><a class="nav-link d-flex align-items-center" href="{{ route('admin.home') }}"><i data-feather="home"></i><span data-i18n="Home">Home</span></a></li>
                <li class="nav-item @php if($menu == 'shop') echo 'active' @endphp"><a class="nav-link d-flex align-items-center" href="{{ route('admin.shop') }}"><i data-feather='shopping-bag'></i></i><span data-i18n="Shop">Shop</span></a></li>
                @if(Auth::user()->role == 'Admin')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="index.html" data-toggle="dropdown"><i data-feather="home"></i><span data-i18n="Dashboards">Administrator</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu="" class="@php if($menu == 'style') echo 'active' @endphp">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.style') }}" data-toggle="dropdown" data-i18n="Style"><i data-feather="check-square"></i><span data-i18n="Styles">Styles</span></a>
                        </li>
                        <li data-menu="" class="@php if($menu == 'manage') echo 'active' @endphp">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.manage') }}" data-toggle="dropdown" data-i18n="Manage"><i data-feather="activity"></i><span data-i18n="Manage">Manage</span></a>
                        </li>
                        <li data-menu="" class="@php if($menu == 'information') echo 'active' @endphp">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.information') }}" data-toggle="dropdown" data-i18n="Information"><i data-feather="shopping-cart"></i><span data-i18n="Information">Information</span></a>
                        </li>
                        <li data-menu="" class="@php if($menu == 'credit') echo 'active' @endphp">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.credit') }}" data-toggle="dropdown" data-i18n="Credit"><i data-feather="activity"></i><span data-i18n="Credit">Credit</span></a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->