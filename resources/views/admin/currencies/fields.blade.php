<div class="row">
    <!--begin::Input group-->
    <div class="form-group col-md-3 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('currencies.fields.code') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="code"
               class="form-control text-uppercase form-control-solid mb-3 mb-lg-0 {{ $errors->has('code') ? 'is-invalid' : '' }}"
               required placeholder="{{ __('currencies.fields.code') }}"
               value="{{ old('code', $currency->code ?? '') }}"/>
        <!--end::Input-->
        @if ($errors->has('code'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('code') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-3 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('currencies.fields.symbol') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="symbol"
               class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->has('symbol') ? 'is-invalid' : '' }}"
               required placeholder="{{ __('currencies.fields.symbol') }}"
               value="{{ old('symbol', $currency->symbol ?? '') }}"/>
        <!--end::Input-->
        @if ($errors->has('symbol'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('symbol') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-3 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('currencies.fields.exchange_rate') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="number" step="0.000001" name="exchange_rate"
               class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->has('exchange_rate') ? 'is-invalid' : '' }}"
               required placeholder="{{ __('currencies.fields.exchange_rate') }}"
               value="{{ old('exchange_rate', $currency->exchange_rate ?? '1.0000') }}"/>
        <!--end::Input-->
        @if ($errors->has('exchange_rate'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('exchange_rate') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <div></div>
    <!--begin::Input group for translations-->
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="form-group col-md-3 mb-7">
            <label class="required fw-semibold fs-6 mb-2" for="name_{{ $localeCode }}">
                {{ __('currencies.fields.name') }} ({{ $properties['native'] }})
            </label>
            <input dir="{{ $localeCode == 'ar' ? 'rtl' : '' }}"
                   class="form-control {{ $errors->has($localeCode.'.name') ? 'is-invalid' : '' }}" type="text"
                   name="{{ $localeCode }}[name]" id="name_{{ $localeCode }}"
                   value="{{ old($localeCode . '.name', $currency->{'name:'.$localeCode} ?? '') }}" required>
            @if($errors->has($localeCode.'.name'))
                <div class="invalid-feedback">
                    {{ $errors->first($localeCode.'.name') }}
                </div>
            @endif
        </div>
    @endforeach
    <!--end::Input group-->
</div>

<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{route('admin.currencies.index')}}" type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
        {{ __('buttons.cancel') }}
    </a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
    </button>
</div>
<!--end::Actions-->
