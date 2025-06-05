<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{ __('mail_providers.title') }}" :breadcrumb="Breadcrumbs::render('mail_providers-edit', $mailProvider)">
            <a href="{{ route('customer.mail_providers.index') }}"
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
                <h2 class="fw-bold fs-1 text-gray-900">{{ __('mail_providers.edit') }}</h2>
            </div>

            <!--begin::Form-->
            <form method="POST" action="{{ route('customer.mail_providers.update', $mailProvider->id) }}" class="form-mail-provider">
                @csrf
                @method('PUT')

                @include('customer.mail_providers.fields', ['mailProvider' => $mailProvider])
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-app-layout>
