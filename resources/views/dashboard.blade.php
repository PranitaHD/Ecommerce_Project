{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!doctype html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard - Mega Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This dashboard was created as an example of the flexibility that Architect offers.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link href="/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/scripts/main.d810cf0ae7f39f28f336.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="45" class="rounded-circle" src="user_images/{{Auth::user()->image}}" alt="">
                                            {{-- @if(empty({{Auth::user()->image}}))
                                                <img width="42" class="rounded-circle" src="assets/images/avatars/1.png" alt="">
                                            @else
                                                <img width="42" class="rounded-circle" src="user_images/{{Auth::user()->image}} "alt="">
                                            @endif --}}
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right" style="background-color: black;">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-secondary">
                                                    <div class="menu-header-image opacity-5" style="background-image: url('assets/images/dropdown-header/abstract2.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="user_images/{{Auth::user()->image}}" alt="Profile">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">
                                                                        {{Auth::user()->name}}
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <form method="POST" action="{{route('logout')}}">
                                                                        @csrf
                                                                    <button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">{{Auth::user()->name}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @dd(auth::user()); --}}

        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options</h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class"
                                                    data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header</div>
                                                <div class="widget-subheading">
                                                    Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class"
                                                    data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar</div>
                                                <div class="widget-subheading">
                                                    Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class"
                                                    data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer</div>
                                                <div class="widget-subheading">
                                                    Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div> Header Options </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme</h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light"></div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class"
                                            data-class="bg-secondary header-text-light"></div>
                                        <div class="swatch-holder bg-success switch-header-cs-class"
                                            data-class="bg-success header-text-light"></div>
                                        <div class="swatch-holder bg-info switch-header-cs-class"
                                            data-class="bg-info header-text-light"></div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class"
                                            data-class="bg-warning header-text-dark"></div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class"
                                            data-class="bg-danger header-text-light"></div>
                                        <div class="swatch-holder bg-light switch-header-cs-class"
                                            data-class="bg-light header-text-dark"></div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class"
                                            data-class="bg-dark header-text-light"></div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class"
                                            data-class="bg-focus header-text-light"></div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class"
                                            data-class="bg-alternate header-text-light"></div>
                                        <div class="divider"></div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class"
                                            data-class="bg-vicious-stance header-text-light"></div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class"
                                            data-class="bg-midnight-bloom header-text-light"></div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class"
                                            data-class="bg-night-sky header-text-light"></div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class"
                                            data-class="bg-slick-carbon header-text-light"></div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class"
                                            data-class="bg-asteroid header-text-light"></div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class"
                                            data-class="bg-royal header-text-light"></div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class"
                                            data-class="bg-warm-flame header-text-dark"></div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class"
                                            data-class="bg-night-fade header-text-dark"></div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class"
                                            data-class="bg-sunny-morning header-text-dark"></div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class"
                                            data-class="bg-tempting-azure header-text-dark"></div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class"
                                            data-class="bg-amy-crisp header-text-dark"></div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class"
                                            data-class="bg-heavy-rain header-text-dark"></div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class"
                                            data-class="bg-mean-fruit header-text-dark"></div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class"
                                            data-class="bg-malibu-beach header-text-light"></div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class"
                                            data-class="bg-deep-blue header-text-dark"></div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class"
                                            data-class="bg-ripe-malin header-text-light"></div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class"
                                            data-class="bg-arielle-smile header-text-light"></div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class"
                                            data-class="bg-plum-plate header-text-light"></div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class"
                                            data-class="bg-happy-fisher header-text-dark"></div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class"
                                            data-class="bg-happy-itmeo header-text-light"></div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class"
                                            data-class="bg-mixed-hopes header-text-light"></div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class"
                                            data-class="bg-strong-bliss header-text-light"></div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class"
                                            data-class="bg-grow-early header-text-light"></div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class"
                                            data-class="bg-love-kiss header-text-light"></div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class"
                                            data-class="bg-premium-dark header-text-light"></div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class"
                                            data-class="bg-happy-green header-text-light"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme</h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class"
                                            data-class="bg-primary sidebar-text-light"></div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class"
                                            data-class="bg-secondary sidebar-text-light"></div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class"
                                            data-class="bg-success sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class"
                                            data-class="bg-info sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class"
                                            data-class="bg-warning sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class"
                                            data-class="bg-danger sidebar-text-light"></div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class"
                                            data-class="bg-light sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class"
                                            data-class="bg-dark sidebar-text-light"></div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class"
                                            data-class="bg-focus sidebar-text-light"></div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class"
                                            data-class="bg-alternate sidebar-text-light"></div>
                                        <div class="divider"></div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"
                                            data-class="bg-vicious-stance sidebar-text-light"></div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
                                            data-class="bg-midnight-bloom sidebar-text-light"></div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class"
                                            data-class="bg-night-sky sidebar-text-light"></div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"
                                            data-class="bg-slick-carbon sidebar-text-light"></div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class"
                                            data-class="bg-asteroid sidebar-text-light"></div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class"
                                            data-class="bg-royal sidebar-text-light"></div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"
                                            data-class="bg-warm-flame sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class"
                                            data-class="bg-night-fade sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"
                                            data-class="bg-sunny-morning sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"
                                            data-class="bg-tempting-azure sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"
                                            data-class="bg-amy-crisp sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"
                                            data-class="bg-heavy-rain sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"
                                            data-class="bg-mean-fruit sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"
                                            data-class="bg-malibu-beach sidebar-text-light"></div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"
                                            data-class="bg-deep-blue sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"
                                            data-class="bg-ripe-malin sidebar-text-light"></div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"
                                            data-class="bg-arielle-smile sidebar-text-light"></div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"
                                            data-class="bg-plum-plate sidebar-text-light"></div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"
                                            data-class="bg-happy-fisher sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
                                            data-class="bg-happy-itmeo sidebar-text-light"></div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
                                            data-class="bg-mixed-hopes sidebar-text-light"></div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"
                                            data-class="bg-strong-bliss sidebar-text-light"></div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class"
                                            data-class="bg-grow-early sidebar-text-light"></div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"
                                            data-class="bg-love-kiss sidebar-text-light"></div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"
                                            data-class="bg-premium-dark sidebar-text-light"></div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class"
                                            data-class="bg-happy-green sidebar-text-light"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default</button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs</h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line"> Line</button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow"> Shadow </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="pb-2">Light Color Schemes
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="app-theme-white"> White Theme</button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="app-theme-gray"> Gray Theme</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li class="mm-active">
                                <a href="{{route('dash')}}" active>
                                    <i class="metismenu-icon fal fa-columns"></i>Dashboard
                                </a>
                            </li>
                            @if (Auth::user()->role_id==1)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-users"></i>Users
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul class="mm-show">
                                        <li>
                                            <a href="{{route('users.create')}}">
                                                <i class="metismenu-icon"></i>Add Users
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('users.index')}}">
                                                <i class="metismenu-icon"></i>Manage Users
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->role_id==1 || Auth::user()->role_id==2)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-box-full"></i>Products
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{route('products.create')}}">
                                                <i class="metismenu-icon"></i> Add Products
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('products.index')}}">
                                                <i class="metismenu-icon"></i>Manage Products
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->role_id==1)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-user-tag"></i> Roles
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{route('roles.create')}}">
                                                <i class="metismenu-icon"></i>Add Roles
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('roles.index')}}">
                                                <i class="metismenu-icon"></i>Manage Roles
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <!-- <li class="app-sidebar__heading">Components</li> -->
                            @if (Auth::user()->role_id==1 || Auth::user()->role_id==2)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-key"></i> Secrets
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{route('secrets.index')}}">
                                                <i class="metismenu-icon"></i>Manage Secrets
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-shopping-cart"></i>Orders
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{route('orders.index')}}">
                                                <i class="metismenu-icon"></i>Manage Orders
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->role_id==1 || Auth::user()->role_id==2)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon fal fa-gem"></i>Transactions
                                        <i class="metismenu-state-icon fal fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{route('transactions.index')}}">
                                                <i class="metismenu-icon"></i>Manage Transactions
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <strong>Copyright &copy; 2021-2022 <a href="{{route('dash')}}"><span class="text-success">Architect</span></a>.</strong>
                                &nbsp;&nbsp;All rights reserved.
                            </div>
                            <div class="app-footer-right"><b>Version</b>&nbsp;8.0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>

    <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Insert, Update and Delete Alerts Script -->
    <script>
        $(".alert").delay(2000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
    <!-- Country, State and City Dropdown Script -->
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="" class="option_color">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="" class="option_color">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="" class="option_color">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <!-- Show Password script -->
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password")
                x.type = "text";
            else
                x.type = "password";
        }
    </script>
    <!-- PDF Button in Table -->
    <script>
        function printTable() { window.print(); }
    </script>
</body>
</html>
