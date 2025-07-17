<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
   data-bs-toggle="dropdown" aria-expanded="false">
    {{ __('buttons.actions') }}
</a>
<ul class="dropdown-menu">
    <li>
        <a href="{{ route('customer.templates.show', $template->id) }}"
           class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
            <i class="ki-duotone ki-eye fs-3">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            {{ __('buttons.view') }}
        </a>
    </li>
</ul>
