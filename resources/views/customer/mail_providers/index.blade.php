<x-app-layout>
    {{-- START::breadcrumb and title --}}
    <x-toolbar title="{{ __('mail_providers.title') }}" :breadcrumb="Breadcrumbs::render('mail_providers')">
        <a href="{{ route('customer.mail_providers.create') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
            {{ __('mail_providers.create') }}
        </a>
    </x-toolbar>
    {{-- END::breadcrumb and title --}}

    <!--begin::Card-->
    <div class="card">
        @include("customer.mail_providers.form-search")

        <!--begin::Card body-->
        <div class="card-body">
            @include('customer.mail_providers.datatable')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    @push('styles')
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script>
            $(function () {
                let lang = $('html').attr('lang');
                let isArabic = (lang === 'ar');

                let table = $('#datatable_mail_providers').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    language: {
                        url: '{{ asset("assets/js/custom/datatables/") }}/' + lang + '.json'
                    },
                    direction: isArabic ? "rtl" : "ltr",
                    autoWidth: false,
                    ajax: "{{ route('customer.mail_providers.index') }}",
                    columns: [
                        { data: 'provider', name: 'provider', className: 'text-start' },
                        { data: 'account_name', name: 'account_name', className: 'text-start' },
                        { data: 'settings.email', name: 'settings->email', className: 'text-start' },
                        { data: 'created_at_blade', name: 'created_at', className: 'text-start' },
                        { data: 'actions', orderable: false, searchable: false, className: 'text-end' },
                    ],
                    order: [[0, 'asc']]
                });

                $('#kt_search').on('click', function (e) {
                    e.preventDefault();
                    let params = {};
                    $('.datatable-input').each(function () {
                        let i = $(this).data('col-index');
                        params[i] = params[i] ? params[i] + '|' + $(this).val() : $(this).val();
                    });
                    $.each(params, function (i, val) {
                        table.column(i).search(val || '', false, false);
                    });
                    table.draw();
                });

                $('#kt_reset').on('click', function (e) {
                    e.preventDefault();
                    $('.datatable-input').each(function () {
                        $(this).val('');
                        table.column($(this).data('col-index')).search('', false, false);
                    });
                    $('.datatable-input-native').val('');
                    $('.select-empty').val('').trigger('change');
                    table.draw();
                });
            });
        </script>
    @endpush
</x-app-layout>
