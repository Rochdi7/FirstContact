<a href="#"
   class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
   data-bs-toggle="dropdown"
   aria-expanded="false">
    {{ __('buttons.actions') }}
</a>

<ul class="dropdown-menu">

    @can('update', $template)
        <li>
            <a href="{{ route('admin.templates.edit', $template->id) }}"
               class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                <i class="ki-duotone ki-notepad-edit fs-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                {{ __('buttons.edit') }}
            </a>
        </li>
    @endcan

    @can('delete', $template)
        <li>
            <form action="{{ route('admin.templates.destroy', $template->id) }}" method="POST"
                  onsubmit="return confirm('{{ __('messages.confirm_delete') }}');">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item btn btn-sm btn-icon-danger btn-text-danger">
                    <i class="ki-duotone ki-trash fs-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                    {{ __('buttons.delete') }}
                </button>
            </form>
        </li>
    @endcan

</ul>
