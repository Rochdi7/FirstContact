<div class="row">
    <!-- Mail Provider -->
    <div class="form-group col-md-6 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('messages.fields.mail_provider') }}</label>
        <select name="mail_provider_id"
                class="form-select form-select-solid {{ $errors->has('mail_provider_id') ? 'is-invalid' : '' }}"
                data-control="select2"
                data-placeholder="{{ __('messages.fields.mail_provider') }}"
                required>
            <option></option>
            @foreach($mailProviders as $id => $name)
                <option value="{{ $id }}"
                        {{ old('mail_provider_id') == $id ? 'selected' : '' }}>
                    {{ $name }} (ID: {{ $id }})
                </option>
            @endforeach
        </select>
        @error('mail_provider_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Message Template -->
    <div class="form-group col-md-6 mb-7">
        <label class="fw-semibold fs-6 mb-2">{{ __('messages.fields.message_template') }}</label>
        <select name="message_template_id"
                class="form-select form-select-solid {{ $errors->has('message_template_id') ? 'is-invalid' : '' }}"
                data-control="select2"
                data-placeholder="{{ __('messages.fields.message_template') }}">
            <option></option>
            @foreach($messageTemplates as $id => $name)
                <option value="{{ $id }}"
                        {{ old('message_template_id') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('message_template_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Layout Template -->
    <div class="form-group col-md-6 mb-7">
        <label class="fw-semibold fs-6 mb-2">
            {{ __('messages.fields.layout_template') }}
            <span class="text-muted fw-normal fs-7 d-block">
                (Optional — leave empty to send as plain Gmail-style message)
            </span>
        </label>
        <select name="template_id"
                class="form-select form-select-solid {{ $errors->has('template_id') ? 'is-invalid' : '' }}"
                data-control="select2"
                data-placeholder="{{ __('messages.fields.layout_template') }}">
            <option></option>
            @foreach($templates as $id => $name)
                <option value="{{ $id }}"
                        {{ old('template_id') == $id ? 'selected' : '' }}>
                    {{ $name }} (ID: {{ $id }})
                </option>
            @endforeach
        </select>
        @error('template_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Recipients -->
    <div class="form-group col-md-12 mb-7">
        <label class="required fw-semibold fs-6 mb-2">{{ __('messages.fields.recipients') }}</label>
        <select name="recipients[]"
                class="form-select form-select-solid {{ $errors->has('recipients') ? 'is-invalid' : '' }}"
                data-control="select2"
                data-placeholder="{{ __('messages.fields.recipients') }}"
                data-close-on-select="false"
                data-allow-clear="true"
                multiple
                required>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}"
                        {{ collect(old('recipients', []))->contains($contact->id) ? 'selected' : '' }}>
                    {{ $contact->first_name }} {{ $contact->last_name }} ({{ $contact->email }})
                </option>
            @endforeach
        </select>
        @error('recipients')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{ route('customer.messages.index') }}" type="reset" class="btn btn-light me-3">
        {{ __('buttons.cancel') }}
    </a>
    <button type="submit" name="action" value="save_send" class="btn btn-success">
        <span class="indicator-label">{{ __('buttons.save_and_send') }}</span>
    </button>
</div>
<!--end::Actions-->
