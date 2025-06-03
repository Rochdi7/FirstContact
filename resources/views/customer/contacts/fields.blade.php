<div class="row">
    <!-- First Name -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('contacts.fields.first_name') }}</label>
        <input type="text" name="first_name"
               class="form-control form-control-solid {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
               placeholder="{{ __('contacts.fields.first_name') }}"
               required
               value="{{ old('first_name', $contact->first_name ?? '') }}">
        @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Last Name -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('contacts.fields.last_name') }}</label>
        <input type="text" name="last_name"
               class="form-control form-control-solid {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
               placeholder="{{ __('contacts.fields.last_name') }}"
               required
               value="{{ old('last_name', $contact->last_name ?? '') }}">
        @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group col-md-4 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('contacts.fields.email') }}</label>
        <input type="email" name="email"
               class="form-control form-control-solid {{ $errors->has('email') ? 'is-invalid' : '' }}"
               placeholder="{{ __('contacts.fields.email') }}"
               required
               value="{{ old('email', $contact->email ?? '') }}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <!-- Phone -->
    <div class="form-group col-md-6 mb-7">
        <label class="fw-semibold fs-6 mb-2">{{ __('contacts.fields.phone') }}</label>
        <input type="text" name="phone"
               class="form-control form-control-solid {{ $errors->has('phone') ? 'is-invalid' : '' }}"
               placeholder="{{ __('contacts.fields.phone') }}"
               value="{{ old('phone', $contact->phone ?? '') }}">
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Company -->
    <div class="form-group col-md-6 mb-7">
        <label class="fw-semibold fs-6 mb-2">{{ __('contacts.fields.company') }}</label>
        <input type="text" name="company"
               class="form-control form-control-solid {{ $errors->has('company') ? 'is-invalid' : '' }}"
               placeholder="{{ __('contacts.fields.company') }}"
               value="{{ old('company', $contact->company ?? '') }}">
        @error('company')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{ route('customer.contacts.index') }}" type="reset"
       class="btn btn-light me-3" data-kt-users-modal-action="cancel">
        {{ __('buttons.cancel') }}
    </a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
    </button>
</div>
<!--end::Actions-->
