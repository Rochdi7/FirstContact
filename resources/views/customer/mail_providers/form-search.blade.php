<form>
    <div class="card-header border-0 pt-6">

        <!--begin::Card title-->
        <div class="card-title d-flex flex-column flex-md-row">
            <!--begin::Search Provider-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                <input type="text" class="form-control form-control-solid datatable-input w-250px ps-13"
                       placeholder="{{ __('mail_providers.filter.provider') }}" data-col-index="0"/>
            </div>
            <!--end::Search Provider-->

            <!--begin::Search Account Name-->
            <div class="d-flex align-items-center position-relative ms-md-3 my-1">
                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                <input type="text" class="form-control form-control-solid datatable-input w-250px ps-13"
                       placeholder="{{ __('mail_providers.filter.account_name') }}" data-col-index="1"/>
            </div>
            <!--end::Search Account Name-->

            <!--begin::Search Email-->
            <div class="d-flex align-items-center position-relative ms-md-3 my-1">
                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                <input type="text" class="form-control form-control-solid datatable-input w-250px ps-13"
                       placeholder="{{ __('mail_providers.filter.email') }}" data-col-index="2"/>
            </div>
            <!--end::Search Email-->
        </div>
        <!--end::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <!--begin::RESET-->
                <button type="button" class="btn btn-light-primary me-3" id="kt_reset">
                    <i class="ki-outline ki-cross fs-2"></i>{{ __('buttons.reset') }}
                </button>
                <!--end::RESET-->

                <!--begin::FILTER-->
                <button type="button" class="btn btn-primary" id="kt_search">
                    <i class="ki-outline ki-filter fs-2"></i>{{ __('buttons.filter') }}
                </button>
                <!--end::FILTER-->
            </div>
        </div>
        <!--end::Card toolbar-->

    </div>
</form>
