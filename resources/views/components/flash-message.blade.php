@if(session('success') || session('error') || session('info') || session('warning'))
    @php
        $status = session('success') ? 'success' : (session('error') ? 'error' : (session('info') ? 'info' : 'warning'));
        $message = session($status);
        $icon = 'ki-check-circle';
    @endphp

    <div
        class="alert alert-dismissible bg-light-{{ $status == 'error' ? 'danger' : $status  }} border border-{{ $status == 'error' ? 'danger' : $status}} d-flex flex-column flex-sm-row p-5 mb-10">
        <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2hx text-{{ $status == 'error' ? 'danger' : $status }} me-4 mb-5 mb-sm-0">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <!--begin::Title-->
            @if($status=="success")
                <h5 class="mb-1">{{__('messages.operation_success') }}</h5>
            @else
                <h5 class="mb-1">{{ ucfirst($status) }}</h5>
            @endif
            <!--end::Title-->

            <!--begin::Content-->
            <span>{!! $message !!}</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Close-->
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-{{ $status == 'error' ? 'danger' : $status }}"><span class="path1"></span><span
                    class="path2"></span></i>
        </button>
        <!--end::Close-->
    </div>
@endif

