<x-app-layout>
    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="Plan Management" :breadcrumb="Breadcrumbs::render('plan')">
            <a href="{{ route('admin.plans.create') }}" 
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                Create New Plan
            </a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <div class="row g-7">
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_plans">
                    <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">ID</th>
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Max Templates</th>
                        <th class="min-w-125px">AI Enabled</th>
                        <th class="min-w-125px">Price</th>
                        <th class="min-w-125px">Features</th>
                        <th class="min-w-125px">Created At</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    @foreach($plans as $plan)
                     <tr>
                        <td>{{ $plan->id ?? '' }}</td>
                        <td>{{ $plan->name ?? '' }}</td>
                        <td>{{ $plan->max_templates ?? '' }}</td>
                        <td>{!! $plan->ai_enabled ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>' !!}</td>
                        <td>${{ number_format($plan->price, 2) }}</td>
                        <td>
                            @foreach($plan->features as $feature)
                                <span class="badge badge-info mb-1">{{ $feature }}</span>
                            @endforeach
                        </td>
                        <td>{{ $plan->created_at->format('d-m-Y H:i') }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.plans.edit', $plan->id) }}" class="menu-link px-3">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <form class="menu-link px-3" action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-link" value="Delete">
                                    </form>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ mix('assets/plugins/custom/datatables/datatables.bundle.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ mix('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

        <script>
            new DataTable('#table_plans');
        </script>
    @endpush
</x-app-layout>
