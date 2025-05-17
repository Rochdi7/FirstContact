<div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true"
     data-kt-scroll-activate="true" data-kt-scroll-height="auto"
     data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
     data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu"
         data-kt-menu="true" data-kt-menu-expand="false">
        @can('access users')
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (request()->routeIs("admin.users.*") or request()->routeIs("admin.roles.*")or request()->routeIs("admin.permissions.*") ) ? "here show " : "" }} menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <i class="ki-outline ki-category fs-2"></i>
                </span>
                <span class="menu-title">{{ __('menu.menu_users') }}</span>
                <span class="menu-arrow"></span>
			</span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    @can('access users')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs("admin.users.*") ? "active" : "" }}"
                               href="{{route('admin.users.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{__('menu.users')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                    @can('access permissions')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs("admin.permissions.*") ? "active" : "" }}"
                               href="{{route('admin.permissions.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                                <span class="menu-title">{{__('menu.permissions')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                    @can('access roles')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}"
                               href="{{ route('admin.roles.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                                <span class="menu-title">{{__('menu.roles')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
        @endcan

        @can('access settings')
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (request()->routeIs("admin.countries.*") or request()->routeIs("admin.currencies.*")or request()->routeIs("admin.store_types.*")) ? "here show " : "" }} menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <i class="ki-outline ki-category fs-2"></i>
                </span>
                <span class="menu-title">{{ __('menu.menu_settings') }}</span>
                <span class="menu-arrow"></span>
			</span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    @can('access countries')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs("admin.countries.*") ? "active" : "" }}"
                               href="{{route('admin.countries.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{__('menu.countries')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                    @can('access currencies')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs("admin.currencies.*") ? "active" : "" }}"
                               href="{{route('admin.currencies.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{__('menu.currencies')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                    @can('access store_types')
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs("admin.store_types.*") ? "active" : "" }}"
                               href="{{route('admin.store_types.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">{{__('menu.store_types')}}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endcan
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
        @endcan

    </div>
    <!--end::Menu-->
</div>
