<div class="row">
    <!--begin::Input group-->
    <div class="form-group col-md-4 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.name') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="name"
            class="form-control form-control-solid mb-3 mb-lg-0  {{ $errors->has('name') ? 'is-invalid' : '' }}"
            required placeholder="{{ __('plans.fields.name') }}" value="{{ old('name', $plan->name ?? '') }}" />
        <!--end::Input-->
        @if ($errors->has('name'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.max_templates') }}</label>
        <input type="number" name="max_templates"
            class="form-control form-control-solid {{ $errors->has('max_templates') ? 'is-invalid' : '' }}" required
            placeholder="{{ __('plans.fields.max_templates') }}"
            value="{{ old('max_templates', $plan->max_templates ?? '') }}" />
        @if ($errors->has('max_templates'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('max_templates') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.ai_enabled') }}</label>
        <div class="fv-row mt-1">
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input type="hidden" name="ai_enabled" value="0">
                <input class="form-check-input" name="ai_enabled" value="1" type="checkbox"
                   {{ old('ai_enabled', $plan->ai_enabled ?? 1) == 1 ? 'checked' : '' }}/>
            </div>
        </div>
    @if ($errors->has('ai_enabled'))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            {{ $errors->first('ai_enabled') }}
        </div>
    @endif
    </div>

    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.price') }}</label>
        <input type="number" step="0.01" name="price"
            class="form-control form-control-solid {{ $errors->has('price') ? 'is-invalid' : '' }}" required
            placeholder="{{ __('plans.fields.price') }}" value="{{ old('price', $plan->price ?? '') }}" />
        @if ($errors->has('price'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('price') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="form-group col-md-8 mb-7">
        <label class="fw-semibold fs-6 mb-2">{{ __('plans.fields.features') }}</label>
        <input id="kt_tagify_features" name="features"
       class="form-control form-control-solid {{ $errors->has('features') ? 'is-invalid' : '' }}"
       placeholder="{{ __('plans.fields.features') }}"
       value='{{ old("features", isset($plan) ? json_encode(array_map(fn($f) => ["value" => $f], $plan->features ?? [])) : "") }}' />

        @if ($errors->has('features'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('features') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
</div>

<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{route('admin.plans.index')}}" type="reset" class="btn btn-light me-3"
        data-kt-users-modal-action="cancel">
        {{__('buttons.cancel')}}
    </a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{__('buttons.save_changes')}}</span>
    </button>
</div>
<!--end::Actions-->

<!-- Tagify CSS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var input = document.querySelector("#kt_tagify_features");
        new Tagify(input);
    });
</script>

