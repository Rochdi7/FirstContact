<div class="app-container container-fluid d-flex align-items-stretch flex-stack mt-lg-8" id="kt_app_header_container">
    <!--begin::Sidebar toggle-->
    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-1" id="kt_app_sidebar_mobile_toggle">
            <i class="ki-outline ki-abstract-14 fs-2"></i>
        </div>
        <!--begin::Logo image-->
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{ mix('assets/media/logos/logo-small.png')}}" class="h-35px theme-light-show"/>
            <img alt="Logo" src="{{ mix('assets/media/logos/logo-small-dark.png')}}" class="h-35px theme-dark-show"/>
        </a>
        <!--end::Logo image-->
    </div>
    <!--end::Sidebar toggle-->
    <!--begin::Navbar-->
    <div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
        <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 me-1 me-lg-0">
            <!--begin::Search-->
            <div class="header-search d-sm-flex align-items-center w-lg-500px d-none">
                <h1>{{__('general.welcome_message')}}</h1>
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Activities-->
        <div class="app-navbar-item ms-1 ms-md-3">
            <!--begin::Menu- wrapper-->
            <div
                class="btn btn-icon btn-custom btn-color-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end" id="kt_activities_toggle">
                <i class="ki-outline ki-notification-on fs-2"></i>
            </div>
            <!--end::Menu wrapper-->
        </div>
        <!--end::Activities-->
        <!--begin::Chat-->
        <div class="app-navbar-item ms-1 ms-md-3">
            <!--begin::Menu wrapper-->
            <div
                class="btn btn-icon btn-custom btn-color-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative"
                id="kt_drawer_chat_toggle">
                <i class="ki-outline ki-messages fs-2"></i>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-custom mt-1 ms-n1">5</span>
            </div>
            <!--end::Menu wrapper-->
        </div>
        <!--end::Chat-->
        <!--begin::Action-->
        <div class="app-navbar-item ms-1 ms-md-3">
            <a href="#"
               class="btn btn-flex btn-icon align-self-center fw-bold btn-secondary w-30px w-md-100 h-30px h-md-35px px-4 ms-3">
                <i class="ki-outline ki-crown-2 fs-3"></i>
                <span class="d-none d-md-inline ms-2 fs-7"> {{__('roles.role.'.Auth::user()->roles->pluck('name')->first())}}</span>
            </a>
        </div>
        <!--end::Action-->
        <!--begin::Action-->
        <div class="app-navbar-item ms-1">
            <x-language-switcher />
        </div>
        <!--end::Action-->
    </div>
    <!--end::Navbar-->
</div>
