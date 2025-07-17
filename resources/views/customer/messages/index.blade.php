<x-app-layout>
    {{-- START::breadcrumb and title --}}
    <x-toolbar title="{{ __('messages.title') }}" :breadcrumb="Breadcrumbs::render('customer.messages.index')">
        <a href="{{ route('customer.messages.create') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
            {{ __('messages.create') }}
        </a>
    </x-toolbar>
    {{-- END::breadcrumb and title --}}

    <!--begin::Card-->
    <div class="card">
        @include('customer.messages.form-search')

        <!--begin::Card body-->
        <div class="card-body">
            @include('customer.messages.datatable')
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
            $(function() {
                let lang = $('html').attr('lang');
                let isArabic = (lang === 'ar');

                if ($('#datatable_messages').length) {
                    let table = $('#datatable_messages').DataTable({
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        language: {
                            'url': '{{ asset('assets/js/custom/datatables/') }}/' + lang + '.json'
                        },
                        direction: isArabic ? "rtl" : "ltr",
                        autoWidth: false,
                        ajax: "{{ route('customer.messages.index') }}",
                        columns: [{
                                data: 'provider',
                                name: 'provider',
                                className: 'text-start'
                            },
                            {
                                data: 'message_template',
                                name: 'message_template',
                                className: 'text-start'
                            },
                            {
                                data: 'layout_template',
                                name: 'layout_template',
                                className: 'text-start'
                            },
                            {
                                data: 'created_at_blade',
                                name: 'created_at',
                                className: 'text-start'
                            },
                            {
                                data: 'actions',
                                orderable: false,
                                searchable: false,
                                className: 'text-end'
                            },
                        ],
                        order: [
                            [3, 'desc']
                        ],
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>