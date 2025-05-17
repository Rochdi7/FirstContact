<x-guest-layout>

    <!--begin::Form-->
    <form class="form w-100" method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="text-center mb-10">
            <!--begin::Titre-->
            <h1 class="text-gray-900 fw-bolder mb-3">Configurer un nouveau mot de passe</h1>
            <!--end::Titre-->
            <!--begin::Texte-->
            <div class="text-gray-500 fw-semibold fs-6">Avez-vous déjà réinitialisé le mot de passe ?
                <a href="{{ route('login') }}" class="link-primary fw-bold">Se connecter</a>
            </div>
            <!--end::Texte-->
        </div>
        <!--begin::Heading-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <x-text-input id="email" placeholder="Email" class="form-control bg-transparent" type="email" name="email"
                          :value="old('email', $request->email)" required autofocus/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            <!--end::Email-->
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="Password" name="password"
                           autocomplete="off"/>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                          data-kt-password-meter-control="visibility">
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
            <div class="text-muted">Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de
                symboles.
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>

            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--end::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="Repeat Password" name="password_confirmation" type="password" autocomplete="off"
                   class="form-control bg-transparent"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>

            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Action-->
        <div class="d-grid mb-10">
            <button type="submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Réinitialiser le mot de passe</span>
                <!--end::Indicator label-->
            </button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</x-guest-layout>
