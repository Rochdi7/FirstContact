<div class="row">
    <!--begin::Input group-->
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="form-group col-md-12 mb-7">
            <label  class="required fw-semibold fs-6 mb-2" for="name_{{ $localeCode }}">
                {{ __('store_types.fields.name') }}( {{ $properties['native'] }} )
            </label>
            <input dir="{{$localeCode=='ar' ? 'rtl':''}}"
                   class="form-control {{ $errors->has($localeCode.'.name') ? 'is-invalid' : '' }}" type="text"
                   name="{{ $localeCode }}[name]" id="name_{{ $localeCode }}"
                   value="{{ old($localeCode . '.name',$storeType->{'name:'.$localeCode} ?? '') }}" required>
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
    <a href="{{route('admin.store_types.index')}}" type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">{{__('buttons.cancel') }}</a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{__('buttons.save_changes') }}</span>
    </button>
</div>
<!--end::Actions-->
