<div class="row">
    <!-- Provider -->
    <div class="form-group col-md-3 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('mail_providers.fields.provider') }}</label>
        <select name="provider" class="form-select form-control form-control-solid" required>
            <option value="gmail" {{ old('provider', $mailProvider->provider ?? '') == 'gmail' ? 'selected' : '' }}>Gmail</option>
            <option value="outlook" {{ old('provider', $mailProvider->provider ?? '') == 'outlook' ? 'selected' : '' }}>Outlook</option>
        </select>
    </div>

    <!-- Account Name -->
    <div class="form-group col-md-3 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('mail_providers.fields.account_name') }}</label>
        <input type="text" name="account_name"
               class="form-control form-control-solid {{ $errors->has('account_name') ? 'is-invalid' : '' }}"
               value="{{ old('account_name', $mailProvider->account_name ?? '') }}" required>
        @if ($errors->has('account_name'))
            <div class="invalid-feedback">{{ $errors->first('account_name') }}</div>
        @endif
    </div>

    <!-- Email -->
    <div class="form-group col-md-3 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('mail_providers.fields.email') }}</label>
        <input type="email" name="email"
               class="form-control form-control-solid {{ $errors->has('email') ? 'is-invalid' : '' }}"
               value="{{ old('email', $mailProvider->settings['email'] ?? '') }}" required>
        @if ($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <!-- Password -->
    <div class="form-group col-md-3 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('mail_providers.fields.password') }}</label>
        <input type="password" name="password"
               class="form-control form-control-solid {{ $errors->has('password') ? 'is-invalid' : '' }}"
               placeholder="••••••••••">
        <small class="text-muted">{{ __('mail_providers.notes.password_hint') }}</small>
        @if ($errors->has('password'))
            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>
</div>

<!-- Actions -->
<div class="text-start pt-10">
    <a href="{{ route('customer.mail_providers.index') }}" class="btn btn-light me-3">
        {{ __('buttons.cancel') }}
    </a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{ __('buttons.save_changes') }}</span>
    </button>
</div>
