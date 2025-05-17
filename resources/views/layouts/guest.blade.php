<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      @if(app()->getLocale() === 'ar') direction="rtl" dir="rtl" style="direction: rtl"
      @else direction="ltr" dir="ltr" style="direction: ltr" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
    @endif

</head>
<!--begin::Body-->
<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('{{ mix('assets/media/auth/bg10.jpeg') }}');
        }

        [data-bs-theme="dark"] body {
            background-image: url('{{ mix('assets/media/auth/bg10-dark.jpeg') }}');
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ mix('assets/media/auth/agency.png') }}" alt=""/>
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ mix('assets/media/auth/agency-dark.png') }}" alt=""/>
                <!--end::Image-->
                <!--begin::Titre-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Rapide, Efficace et Productif</h1>
                <!--end::Titre-->
                <!--begin::Texte-->
                <div class="text-gray-600 fs-base text-center fw-semibold">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nibh nulla, vestibulum ac commodo nec,
                    vehicula eget urna. Maecenas risus mi, cursus sit amet nibh at, tincidunt dictum odio. Duis.
                </div>
                <!--end::Texte-->

            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                <x-language-switcher/>

                <!--begin::Content-->
                <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                        {{ $slot }}
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center">
                        <!--begin::Links-->
                        <div class="d-flex fw-semibold text-primary fs-base gap-5">
                            <a href="pages/team.html" target="_blank">Terms</a>
                            <a href="pages/pricing/column.html" target="_blank">Plans</a>
                            <a href="pages/contact.html" target="_blank">Contact Us</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ mix('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ mix('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
