<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{ __('templates.title') }}" :breadcrumb="Breadcrumbs::render('template-edit', $template)">
            <a href="{{ route('admin.templates.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <!--begin::Title-->
                <h2 class="fw-bold fs-1 text-gray-900">{{ __('templates.edit') }}</h2>
                <!--end::Title-->
            </div>
            <!--begin::Form-->
            <form method="POST" class="form-template" action="{{ route('admin.templates.update', [$template->id]) }}">
                @method('PUT')
                @csrf
                @include('admin.templates.fields', ['template' => $template])
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-app-layout>
