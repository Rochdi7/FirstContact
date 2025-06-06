<x-app-layout>

    {{-- START::breadcrumb and title --}}
    <x-slot name="toolbar">
        <x-toolbar title="{{ __('contacts.title') }}" :breadcrumb="Breadcrumbs::render('contacts-create')">
            <a href="{{ route('customer.contacts.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title --}}

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <h2 class="fw-bold fs-1 text-gray-900">{{ __('contacts.new') }}</h2>
            </div>

            <!--begin::Form-->
            <form method="POST" action="{{ route('customer.contacts.store') }}" class="form-contact">
                @csrf

                {{-- Form Fields --}}
                @include('customer.contacts.fields')

            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-app-layout>
