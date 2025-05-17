<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label
            class="col-lg-4 col-form-label fw-bold fs-6">Name</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" name="name"
                   class="form-control form-control-lg form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   placeholder="Name" value="{{ old('name',$permission->name ?? '') }}">
        </div>
        @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</div>
<!--end::Actions-->
