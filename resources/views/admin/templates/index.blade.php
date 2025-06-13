<x-app-layout> 
    {{-- START::breadcrumb and title--}}
    <x-toolbar title="{{ __('templates.title') }}" :breadcrumb="Breadcrumbs::render('template')">
        <a href="{{ route('admin.templates.create') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
            {{ __('templates.create') }}
        </a>
    </x-toolbar>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">

        @include("admin.templates.form-search")

        <!--begin::Card body-->
        <div class="card-body">
            @include('admin.templates.datatable')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    @push('styles')
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <script>
            $(function () {
                let lang = $('html').attr('lang');
                let isArabic = (lang === 'ar');

                let table = $('#datatable_templates').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    language: {
                        'url': '{{ asset("assets/js/custom/datatables/") }}/' + lang + '.json'
                    },
                    "direction": isArabic ? "rtl" : "ltr",
                    "autoWidth": false,
                    ajax: "{{ route('admin.templates.index') }}",
                    columns: [
                        { data: 'name', name: 'name', className: 'text-start' },
                        { data: 'plan', name: 'plan', className: 'text-start' },
                        { data: 'view_path', name: 'view_path', className: 'text-start' },
                        { data: 'created_at_blade', name: 'created_at', className: 'text-start' },
                        { data: 'actions', orderable: false, className: 'text-end' },
                    ],
                    order: [[0, 'desc']],
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? val : '', true, false).draw();
                                });
                        });
                    }
                });

                $('#kt_search').on('click', function (e) {
                    e.preventDefault();
                    var params = {};
                    $('.datatable-input').each(function () {
                        var i = $(this).data('col-index');
                        if (params[i]) {
                            params[i] += '|' + $(this).val();
                        } else {
                            params[i] = $(this).val();
                        }
                    });
                    $.each(params, function (i, val) {
                        table.column(i).search(val ? val : '', false, false);
                    });
                    table.table().draw();
                });

                $('#kt_reset').on('click', function (e) {
                    e.preventDefault();
                    $('.datatable-input').each(function () {
                        $(this).val('');
                        table.column($(this).data('col-index')).search('', false, false);
                    });
                    $('.datatable-input-native').each(function () {
                        $(this).val('');
                    });
                    $('.select-empty').each(function () {
                        $(this).val('').trigger('change')
                    });
                    table.table().draw();
                });
            });
        </script>
    @endpush
</x-app-layout>
