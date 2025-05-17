<x-guest-layout>
    <!--begin::Form-->
    <form method="POST" action="{{ route('register') }}" class="form w-100">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">{{__('auth.register') }}</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->

        <!-- Prénom -->
        <div class="fv-row mb-8">
            <x-text-input placeholder="{{__('users.fields.first_name')}}" id="first_name" class="form-control bg-transparent" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Nom de famille -->
        <div class="fv-row mb-8">
            <x-text-input placeholder="{{__('users.fields.last_name') }}" id="last_name" class="form-control bg-transparent" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="fv-row mb-8">
            <x-text-input placeholder="{{__('users.fields.email') }}" id="email" class="form-control bg-transparent" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="{{__('users.fields.password') }}" name="password" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
													<i class="ki-outline ki-eye-slash fs-2"></i>
													<i class="ki-outline ki-eye fs-2 d-none"></i>
												</span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">{{__('users.fields.password_hint') }}</div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--end::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="{{__('auth.password_repeat') }}" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{__('auth.register') }}</span>
                <!--end::Indicator label-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">{{__('auth.already_have_account') }}
            <a href="{{ route('login') }}" class="link-primary fw-semibold">{{__('auth.login') }}</a></div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->
</x-guest-layout>
