<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-bold fs-6 required">{{__('roles.fields.name') }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" name="name"
                   class="form-control form-control-lg form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   placeholder="{{__('roles.fields.name') }}" value="{{ old('name',$role->name ?? '') }}" required>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-4 col-form-label fw-bold fs-6 required">{{__('roles.fields.permissions') }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <select class="form-select form-select-solid {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                    data-control="select2" data-placeholder="{{__('messages.select_option') }}" data-allow-clear="true"
                    name="permissions[]" multiple="multiple" required>
                @foreach($permissions as $id => $permission)
                    @if(isset($role))
                        <option
                            value="{{ $id }}" {{(in_array($id, old('permissions', [])) || $role->permissions->contains($id))  ? 'selected' : '' }}>{{ $permission }}</option>
                    @else
                        <option
                            value="{{ $id }}" {{ (in_array($id, old('permissions',[])))  ? 'selected' : '' }}>{{ $permission }}</option>
                    @endif
                @endforeach
            </select>
            @if($errors->has('permissions'))
                <div class="invalid-feedback">
                    {{ $errors->first('permissions') }}
                </div>
            @endif
        </div>

        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="submit" class="btn btn-primary">{{__('buttons.save_changes') }}</button>
</div>
<!--end::Actions-->
