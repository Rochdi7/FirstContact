<div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true"
    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
    data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">

    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu"
        data-kt-menu="true" data-kt-menu-expand="false">

        {{-- ADMIN AREA --}}
        @can('access users')
            <div data-kt-menu-trigger="click"
                class="menu-item {{ request()->routeIs('admin.users.*') ||
                request()->routeIs('admin.roles.*') ||
                request()->routeIs('admin.permissions.*') ||
                request()->routeIs('admin.plans.*') ||
                request()->routeIs('admin.templates.*')
                    ? 'here show '
                    : '' }} menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-category fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.menu_users') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    @can('access users')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                                href="{{ route('admin.users.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.users') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access permissions')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}"
                                href="{{ route('admin.permissions.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.permissions') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access roles')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}"
                                href="{{ route('admin.roles.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.roles') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access plans')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.plans.*') ? 'active' : '' }}"
                                href="{{ route('admin.plans.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.plans') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access templates')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.templates.*') ? 'active' : '' }}"
                                href="{{ route('admin.templates.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.templates') }}</span>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        @endcan

        {{-- CUSTOMER AREA --}}
        @can('access message_templates')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('customer.message_templates.*') ? 'active' : '' }}"
                    href="{{ route('customer.message_templates.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-file fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.message_templates') }}</span>
                </a>
            </div>
        @endcan

        @can('access contacts')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('customer.contacts.*') ? 'active' : '' }}"
                    href="{{ route('customer.contacts.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-phone fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.contacts') }}</span>
                </a>
            </div>
        @endcan

        @can('access mail_providers')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('customer.mail_providers.*') ? 'active' : '' }}"
                    href="{{ route('customer.mail_providers.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-send fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.mail_providers') }}</span>
                </a>
            </div>
        @endcan

        @can('access customer_templates')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('customer.templates.*') ? 'active' : '' }}"
                    href="{{ route('customer.templates.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-folder fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.templates') }}</span>
                </a>
            </div>
        @endcan

        @can('access messages')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('customer.messages.*') ? 'active' : '' }}"
                    href="{{ route('customer.messages.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-message-text fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.messages') }}</span>
                </a>
            </div>
        @endcan


        {{-- SETTINGS --}}
        @can('access settings')
            <div data-kt-menu-trigger="click"
                class="menu-item {{ request()->routeIs('admin.countries.*') ||
                request()->routeIs('admin.currencies.*') ||
                request()->routeIs('admin.store_types.*')
                    ? 'here show '
                    : '' }} menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-setting fs-2"></i>
                    </span>
                    <span class="menu-title">{{ __('menu.menu_settings') }}</span>
                    <span class="menu-arrow"></span>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    @can('access countries')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.countries.*') ? 'active' : '' }}"
                                href="{{ route('admin.countries.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.countries') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access currencies')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.currencies.*') ? 'active' : '' }}"
                                href="{{ route('admin.currencies.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.currencies') }}</span>
                            </a>
                        </div>
                    @endcan

                    @can('access store_types')
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.store_types.*') ? 'active' : '' }}"
                                href="{{ route('admin.store_types.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">{{ __('menu.store_types') }}</span>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        @endcan

    </div>
    <!--end::Menu-->
</div>
