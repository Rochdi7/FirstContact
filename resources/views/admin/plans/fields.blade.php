<div class="row">
    <!-- Max Templates -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.max_templates') }}</label>
        <input type="number" name="max_templates"
               class="form-control form-control-solid {{ $errors->has('max_templates') ? 'is-invalid' : '' }}"
               required
               placeholder="{{ __('plans.fields.max_templates') }}"
               value="{{ old('max_templates', $plan->max_templates ?? '') }}">
        @error('max_templates')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- AI Enabled -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.ai_enabled') }}</label>
        <div class="fv-row mt-1">
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input type="hidden" name="ai_enabled" value="0">
                <input class="form-check-input" name="ai_enabled" value="1" type="checkbox"
                       {{ old('ai_enabled', $plan->ai_enabled ?? 1) == 1 ? 'checked' : '' }} />
            </div>
        </div>
        @error('ai_enabled')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Price -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('plans.fields.price') }}</label>
        <input type="number" step="0.01" name="price"
               class="form-control form-control-solid {{ $errors->has('price') ? 'is-invalid' : '' }}"
               required
               placeholder="{{ __('plans.fields.price') }}"
               value="{{ old('price', $plan->price ?? '') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Translated Name & Features --}}
<div class="row">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <!-- Name Field -->
        <div class="form-group col-md-4 mb-7">
            <label class="required fw-semibold fs-6 mb-2" for="name_{{ $localeCode }}">
                {{ __('plans.fields.name') }} ({{ $properties['native'] }})
            </label>
            <input type="text"
                   dir="{{ $localeCode === 'ar' ? 'rtl' : 'ltr' }}"
                   name="{{ $localeCode }}[name]"
                   id="name_{{ $localeCode }}"
                   class="form-control form-control-solid {{ $errors->has($localeCode.'.name') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('plans.fields.name') }}"
                   value="{{ old($localeCode.'.name', $plan?->{'name:'.$localeCode} ?? '') }}"
                   required>
            @error($localeCode.'.name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Features Field -->
        <div class="form-group col-md-8 mb-7">
            <label class="fw-semibold fs-6 mb-2" for="features_{{ $localeCode }}">
                {{ __('plans.fields.features') }} ({{ $properties['native'] }})
            </label>
            <input id="kt_tagify_features_{{ $localeCode }}" name="{{ $localeCode }}[features]"
                   class="form-control form-control-solid tagify-field {{ $errors->has($localeCode.'.features') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('plans.fields.features') }}"
                   value='{{ old($localeCode.".features", isset($plan) ? json_encode(array_map(fn($f) => ["value" => $f], $plan?->translate($localeCode)?->features ?? [])) : "") }}'>
            @error($localeCode.'.features')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
      <!--begin::Actions-->
      <div class="text-start pt-10">
                    <a href="{{ route('admin.plans.index') }}" type="reset"
                       class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                        {{ __('buttons.cancel') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
                    </button>
                </div>
                <!--end::Actions-->
</div>

<!-- Tagify CSS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" />

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.tagify-field').forEach(input => {
            new Tagify(input);
        });
    });
</script>
