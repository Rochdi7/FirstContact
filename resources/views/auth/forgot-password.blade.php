<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!--begin::Form-->
    <form class="form w-100" method="POST" action="{{ route('password.email') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">{{__('auth.forgot_password') }}</h1>
            <!--end::Titre-->
            <!--begin::Texte-->
            <div class="text-gray-500 fw-semibold fs-6 mb-2">{{__('auth.reset_password_instruction') }}</div>
            <!--end::Texte-->
            <div class="mb-4 text-sm text-gray-600">
                {{__('auth.forgot_password_message') }}
            </div>
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <x-text-input id="email" placeholder="{{__('users.fields.email') }}" class="form-control bg-transparent" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" class="btn btn-primary me-4">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{__('buttons.send') }}</span>
                <!--end::Indicator label-->
            </button>
            <a href="{{ route('login') }}" class="btn btn-light">{{__('buttons.cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</x-guest-layout>
