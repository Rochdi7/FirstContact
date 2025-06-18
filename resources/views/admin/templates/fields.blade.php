<div class="row">
    <!-- Plans (multiple select) -->
    <div class="form-group col-md-6 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('templates.fields.plans') }}</label>
        <select name="plan_ids[]" class="form-select form-select-solid {{ $errors->has('plan_ids') ? 'is-invalid' : '' }}" multiple required>
            @foreach($plans as $plan)
                <option value="{{ $plan->id }}"
                    {{ (isset($template) && $template->plans->contains($plan->id)) ? 'selected' : '' }}>
                    {{ $plan->name }}
                </option>
            @endforeach
        </select>
        @error('plan_ids')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Name -->
    <div class="form-group col-md-6 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('templates.fields.name') }}</label>
        <input type="text" name="name"
               class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}"
               required
               placeholder="{{ __('templates.fields.name') }}"
               value="{{ old('name', $template->name ?? '') }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- View Path -->
    <div class="form-group col-md-12 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('templates.fields.view_path') }}</label>
        <select name="view_path" class="form-select form-select-solid {{ $errors->has('view_path') ? 'is-invalid' : '' }}" required>
            <option value="">{{ __('templates.fields.select_view_path') }}</option>
            @foreach($views as $view)
                <option value="{{ $view }}" {{ old('view_path', $template->view_path ?? '') == $view ? 'selected' : '' }}>
                    {{ $view }}
                </option>
            @endforeach
        </select>
        @error('view_path')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{ route('admin.templates.index') }}" class="btn btn-light me-3">
        {{ __('buttons.cancel') }}
    </a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
    </button>
</div>
