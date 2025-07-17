{{-- resources/views/customer/messages/show.blade.php --}}
<x-app-layout>
    <x-slot name="toolbar">
        <x-toolbar 
            title="{{ __('View Message') }}"
            :breadcrumb="Breadcrumbs::render('customer.messages.show', $message)">
            
            <a href="{{ route('customer.messages.index') }}"
               class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                {{ __('buttons.back') }}
            </a>
        </x-toolbar>
    </x-slot>

    <div class="card card-flush">
        <div class="card-body p-9">
            <iframe 
                src="{{ route('customer.messages.preview', $message->id) }}"
                width="100%" 
                height="800" 
                frameborder="0"
                class="border rounded">
            </iframe>
        </div>
    </div>
</x-app-layout>
