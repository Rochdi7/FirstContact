<div class="row">
    <!-- Name -->
    <div class="form-group col-md-6 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('message_templates.fields.name') }}</label>
        <input type="text" name="name"
               class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}"
               required
               placeholder="{{ __('message_templates.fields.name') }}"
               value="{{ old('name', $messageTemplate->name ?? '') }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Subject -->
    <div class="form-group col-md-6 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('message_templates.fields.subject') }}</label>
        <input type="text" name="subject"
               class="form-control form-control-solid {{ $errors->has('subject') ? 'is-invalid' : '' }}"
               required
               placeholder="{{ __('message_templates.fields.subject') }}"
               value="{{ old('subject', $messageTemplate->subject ?? '') }}">
        @error('subject')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <!-- Body -->
    <div class="form-group col-md-12 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('message_templates.fields.body') }}</label>
        <textarea name="body" rows="8"
                  class="form-control form-control-solid {{ $errors->has('body') ? 'is-invalid' : '' }}"
                  required
                  placeholder="{{ __('message_templates.fields.body') }}">{{ old('body', $messageTemplate->body ?? '') }}</textarea>
        @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!--begin::Actions-->
    <div class="text-start pt-10">
        <a href="{{ route('customer.message_templates.index') }}" type="reset"
           class="btn btn-light me-3" data-kt-users-modal-action="cancel">
            {{ __('buttons.cancel') }}
        </a>
        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
        </button>
    </div>
    <!--end::Actions-->
</div>
