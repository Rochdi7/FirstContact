<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{__('users.title')}}" :breadcrumb="Breadcrumbs::render('user-create')">
            <a href="{{ route('admin.users.index') }}" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">{{__('buttons.back')}}</a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <!--begin::Title-->
                <h2 class="fw-bold fs-1 text-gray-900">{{__('users.new')}}</h2>
                <!--end::Title-->
            </div>
            <!--begin::Formulaire d'insertion-->
            <form method="POST" class="form-user" action="{{ route("admin.users.store") }}">
                @csrf
             @include('admin.users.fields')
            </form>
            <!--end::Formulaire d'insertion-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-app-layout>
