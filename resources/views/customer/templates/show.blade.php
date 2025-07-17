<x-app-layout>
    <x-slot name="toolbar">
        <x-toolbar 
            title="{{ $template->name }}"
            :breadcrumb="Breadcrumbs::render('templates-show', $template)">
            <a href="{{ route('customer.templates.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>

    <div class="card card-flush">
        <div class="card-body p-9">
            <iframe 
                src="{{ route('customer.templates.preview', $template->id) }}"
                width="100%" 
                height="800" 
                frameborder="0"
                class="border rounded">
            </iframe>
        </div>
    </div>
</x-app-layout>
