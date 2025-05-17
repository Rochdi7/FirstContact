<x-app-layout>
    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="Gestion des permissions" :breadcrumb="Breadcrumbs::render('permission-create')">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">List permissions</a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <div class="row g-7">
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer"
                 aria-expanded="true">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">
                        Créer Permission
                    </h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div class="collapse show">
                <!--begin::Form-->
                <form method="POST" action="{{ route("admin.permissions.store") }}">
                    @csrf
                    @include('admin.permissions.fields')
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
    </div>

</x-app-layout>
