<x-app-layout>
    <x-slot name="toolbar">
        <x-toolbar title="Create New Plan" :breadcrumb="Breadcrumbs::render('plan-create')">
            <a href="{{ route('admin.plans.index') }}" 
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>

    <div class="card">
        <div class="card-body p-10 p-lg-15">
            <form method="POST" action="{{ route("admin.plans.store") }}">
                @csrf
                @include('admin.plans.fields')
                <button type="submit" class="btn btn-primary mt-4">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
