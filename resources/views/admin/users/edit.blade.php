<x-app-layout>

    {{-- START::breadcrumb and title--}}
    <x-slot name="toolbar">
        <x-toolbar title="{{__('users.title')}}" :breadcrumb="Breadcrumbs::render('user-edit',$user)">
            <a href="{{ route('admin.users.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">{{__('buttons.back') }}</a>
        </x-toolbar>
    </x-slot>
    {{-- END::breadcrumb and title--}}

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <!--begin::Title-->
                <h2 class="fw-bold fs-1 text-gray-900">{{__('users.edit') }}</h2>
                <!--end::Title-->
            </div>
            <!--begin::Formulaire d'insertion-->
            <form method="POST" class="form-user" action="{{ route("admin.users.update", [$user->slug]) }}">
                @method('PUT')
                @csrf
                @include('admin.users.fields')
            </form>
            <!--end::Formulaire d'insertion-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    <!--begin::Card Modification du mot de passe-->
    <div class="card mt-5">
        <!--begin::Card body-->
        <div class="card-body p-10 p-lg-15">
            <div class="d-flex flex-stack mb-7">
                <!--begin::Title-->
                <h2 class="fw-bold fs-1 text-gray-900">{{__('auth.password_change') }}</h2>
                <!--end::Title-->
            </div>
            <form class="form" action="{{ route('admin.users.update-password', $user->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <!--begin::Scroll-->
                <div class="row">
                    <!--begin::Input group-->
                    <div class="col-md-4 mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">{{__('users.fields.email') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" readonly
                               class="form-control form-control-solid mb-3 mb-lg-0"
                               required placeholder="Email" value="{{ $user->email }}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="col-md-4 mb-7" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <label class="required fw-semibold fs-6 mb-2">{{__('users.fields.password') }}</label>
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-solid " type="password" placeholder="{{__('users.fields.password') }}" name="password" autocomplete="off" />
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
                    <div class="col-md-4 mb-7">
                        <!--begin::Repeat Password-->
                        <label class="required fw-semibold fs-6 mb-2">{{__('auth.password_repeat') }}</label>
                        <input placeholder="{{__('auth.password_repeat') }}" name="password_confirmation" type="password" autocomplete="off" class="form-control form-control-solid " />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        <!--end::Repeat Password-->
                    </div>
                    <!--end::Input group=-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-start pt-10">
                    <a href="{{route('admin.users.index')}}" type="reset" class="btn btn-light me-3"
                       data-kt-users-modal-action="cancel">Annuler</a>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Sauvegarder</span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card Modification du mot de passe-->

</x-app-layout>
