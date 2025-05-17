<div class="row">
    <!--begin::Input group-->
    <div class="form-group col-md-3 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('countries.fields.code') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="code"
               class="form-control text-uppercase form-control-solid mb-3 mb-lg-0  {{ $errors->has('code') ? 'is-invalid' : '' }}"
               required placeholder="{{ __('countries.fields.code') }}"
               value="{{ old('code', $country->code ?? '') }}"/>
        <!--end::Input-->
        @if ($errors->has('code'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('code') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="form-group col-md-3 mb-7">
            <label  class="required fw-semibold fs-6 mb-2" for="name_{{ $localeCode }}">
                {{ __('countries.fields.name') }}( {{ $properties['native'] }} )
            </label>
            <input dir="{{$localeCode=='ar' ? 'rtl':''}}"
                   class="form-control {{ $errors->has($localeCode.'.name') ? 'is-invalid' : '' }}" type="text"
                   name="{{ $localeCode }}[name]" id="name_{{ $localeCode }}"
                   value="{{ old($localeCode . '.name',$country->{'name:'.$localeCode} ?? '') }}" required>
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
    <a href="{{route('admin.countries.index')}}" type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">{{__('buttons.cancel') }}</a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{__('buttons.save_changes') }}</span>
    </button>
</div>
<!--end::Actions-->
