<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{__('plans.title')}}" :breadcrumb="Breadcrumbs::render('plan-show', $plan)">
            <a href="{{ route('admin.plans.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">{{__('buttons.back') }}</a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <!--begin::Title-->
                <h2 class="fw-bold fs-1 text-gray-900">{{__('plans.show') }}</h2>
                <!--end::Title-->
            </div>

            <!-- Plan Details -->
            <div class="row">
                <div class="col-md-6">
                    <strong>{{ __('plans.name') }}:</strong>
                    <p>{{ $plan->name }}</p>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('plans.description') }}:</strong>
                    <p>{{ $plan->description }}</p>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('plans.price') }}:</strong>
                    <p>{{ $plan->price }}</p>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('plans.duration') }}:</strong>
                    <p>{{ $plan->duration }}</p>
                </div>
            </div>

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-app-layout>
