<x-app-layout>
    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="Home admin" :breadcrumb="Breadcrumbs::render('home')">
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">
        ----
    </div>
    <!--end::Card-->

</x-app-layout>
