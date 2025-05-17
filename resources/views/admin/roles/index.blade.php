<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{__('roles.title') }}" :breadcrumb="Breadcrumbs::render('role')">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">{{__('roles.create') }}</a>
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
                        <th class="min-w-125px">{{__('roles.fields.name') }}</th>
                        <th class="min-w-125px">{{__('roles.fields.permissions') }}</th>
                        <th class="min-w-125px">{{__('general.crud.created_at') }}</th>
                        <th class="text-end min-w-100px">{{__('buttons.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    @foreach($roles as $role)
                     <tr>
                        <td>{{ $role->id ?? '' }}</td>
                        <td>{{__('roles.role.'.$role->name) ?? ''}}</td>
                         <td class="w-50">
                             @foreach($role->permissions as $key => $item)
                                 <span class="badge badge-danger mb-1">{{ $item->name }}</span>
                             @endforeach
                         </td>
                        <td>{{ $role->created_at ?? '' }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('buttons.actions')}}
                            </a>
                            <ul class="dropdown-menu">
                                @can('edit roles')
                                    <li>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                                            <i class="ki-duotone ki-user-edit fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            {{__('buttons.edit')}}</a>
                                    </li>
                                @endcan
                                @can('delete roles')
                                <li>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                          onsubmit="return confirm('{{__('messages.confirm_delete')}}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item btn btn-sm btn-icon-danger btn-text-danger">
                                            <i class="ki-duotone ki-trash fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                            {{__('buttons.delete')}}</button>
                                    </form>
                                </li>
                                @endcan

                            </ul>
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
            document.addEventListener("DOMContentLoaded", function () {
                let lang = document.documentElement.lang || 'en'; // Get the current language from <html lang="">
                let isArabic = (lang === 'ar'); // Check if the language is Arabic

                new DataTable('#table_users', {
                    language: {
                        url: '{{ asset("assets/js/custom/datatables/") }}/' + lang + '.json'
                    },
                    direction: isArabic ? "rtl" : "ltr",
                    autoWidth: false,
                });
            });
        </script>
    @endpush
</x-app-layout>
