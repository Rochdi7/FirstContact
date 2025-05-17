<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!--begin::Form-->
    <form method="POST" action="{{ route('login') }}" class="form w-100">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">{{__('auth.login') }}</h1>
            @if(session('message'))
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <!--end::Title-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <x-text-input id="email" placeholder="{{__('users.fields.email') }}"  class="form-control bg-transparent" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <x-text-input id="password" class="form-control bg-transparent"
                          type="password"
                          name="password"
                          placeholder="{{__('users.fields.password') }}"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <!--begin::Link-->
            @if (Route::has('password.request'))
                <a class="link-primary" href="{{ route('password.request') }}">
                   {{__('auth.forgot_password') }}
                </a>
            @endif
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{__('auth.login') }}</span>
                <!--end::Indicator label-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">{{__('auth.not_member') }}
            <a href="{{ route('register') }}" class="link-primary">{{__('auth.register') }}</a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->
</x-guest-layout>
