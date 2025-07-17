<x-app-layout>
    <x-slot name="toolbar">
        <x-toolbar title="{{ __('messages.title') }}" :breadcrumb="Breadcrumbs::render('customer.messages.create')">
            <a href="{{ route('customer.messages.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>

    <div class="card">
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <h2 class="fw-bold fs-1 text-gray-900">{{ __('messages.new') }}</h2>
            </div>

            <form method="POST" action="{{ route('customer.messages.store') }}" class="form-message">
                @csrf
                @include('customer.messages.fields')
            </form>
        </div>
    </div>
</x-app-layout>