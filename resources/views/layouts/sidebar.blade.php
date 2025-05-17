<div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo flex-shrink-0 d-none d-lg-flex flex-center align-items-center"
         id="kt_app_sidebar_logo">
        <!--begin::Logo-->
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{ mix('assets/media/logos/logo.png')}}"
                 class="h-35px d-none d-sm-inline app-sidebar-logo-default theme-light-show"/>
            <img alt="Logo" src="{{ mix('assets/media/logos/logo-dark.png')}}" class="h-35px theme-dark-show"/>
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-1"></i>
            </div>
        </div>
        <!--end::Aside toggle-->
    </div>
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu flex-column-fluid">
        <!--begin::Menu wrapper-->
        @include('layouts.menu')
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
        <!--begin::User-->
        <div class="">
            <!--begin::User info-->
            <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                 data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px">
                    @if(auth()->user()->photo)
                            <img src="{{auth()->user()->photo->preview}}" alt="{{auth()->user()->name}}" alt="{{\Illuminate\Support\Str::limit(auth()->user()->first_name, 1,'')}}.{{\Illuminate\Support\Str::limit(auth()->user()->last_name, 1,'')}}">
                    @else
                        <div class="symbol-label fs-3 fw-bold {{auth()->user()->gender =='f' ? "bg-danger" : "bg-primary"}} text-inverse-danger">
                            {{\Illuminate\Support\Str::limit(auth()->user()->first_name, 1,'')}}.{{\Illuminate\Support\Str::limit(auth()->user()->last_name, 1,'')}}
                        </div>
                    @endif
                </div>
                <!--begin::Name-->
                <div class="d-flex flex-column align-items-start justify-content-center ms-3">
                    <span class="text-gray-500 fs-8 fw-semibold">{{__('users.profile.greeting')}}</span>
                    <a href="#" class="text-gray-800 fs-7 fw-bold text-hover-primary">{{auth()->user()->name}}</a>
                </div>
                <!--end::Name-->
            </div>
            <!--end::User info-->
            <!--begin::User account menu-->
            <div
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            @if(auth()->user()->photo)
                                <img src="{{auth()->user()->photo->preview}}" alt="{{auth()->user()->name}}" alt="{{\Illuminate\Support\Str::limit(auth()->user()->first_name, 1,'')}}.{{\Illuminate\Support\Str::limit(auth()->user()->last_name, 1,'')}}">
                            @else
                                <div class="symbol-label fs-3 fw-bold {{auth()->user()->gender =='f' ? "bg-danger" : "bg-primary"}} text-inverse-danger">
                                    {{\Illuminate\Support\Str::limit(auth()->user()->first_name, 1,'')}}.{{\Illuminate\Support\Str::limit(auth()->user()->last_name, 1,'')}}
                                </div>
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">{{auth()->user()->name}}
                                <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                @can('edit my_profile')
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a href="{{route('profile.edit')}}" class="menu-link px-5">{{__('users.profile.my_profile')}}</a>
                </div>
                <!--end::Menu item-->
                @endcan
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                     data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                    <a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">{{__('users.profile.mode')}}
											<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
												<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
												<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
											</span></span>
                    </a>
                    <!--begin::Menu-->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-night-day fs-2"></i>
													</span>
                                <span class="menu-title">{{__('users.profile.light')}}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-moon fs-2"></i>
													</span>
                                <span class="menu-title">{{__('users.profile.dark')}}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-screen fs-2"></i>
													</span>
                                <span class="menu-title">{{__('users.profile.system')}}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();   this.closest('form').submit();" class="menu-link px-5">{{__('auth.logout')}}</a>
                    </form>

                </div>
                <!--end::Menu item-->
            </div>
            <!--end::User account menu-->
        </div>
        <!--end::User-->
    </div>
    <!--end::Footer-->
</div>
