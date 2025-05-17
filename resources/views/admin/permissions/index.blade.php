<x-app-layout>
    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="Gestion des permissions" :breadcrumb="Breadcrumbs::render('permission')">
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Ajouter une permission</a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <div class="row g-7">
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_users">
                    <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">id</th>
                        <th class="min-w-125px">name</th>
                        <th class="min-w-125px">Guard name</th>
                        <th class="min-w-125px">Created at</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    @foreach($permissions as $permission)
                     <tr>
                        <td>{{ $permission->id ?? '' }}</td>
                        <td>{{ $permission->name ?? '' }}</td>
                        <td>{{ $permission->guard_name ?? '' }}</td>
                        <td>{{ $permission->created_at ?? '' }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <form class="menu-link px-3" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

        <script !src="">
            new DataTable('#table_users');
        </script>
    @endpush
</x-app-layout>
