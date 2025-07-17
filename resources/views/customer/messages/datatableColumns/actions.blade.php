<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
   data-bs-toggle="dropdown" aria-expanded="false" aria-label="{{ __('buttons.actions') }}">
    {{ __('buttons.actions') }}
</a>
<ul class="dropdown-menu">
    <li>
        <a href="{{ route('customer.messages.show', $message->id) }}"
           class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
            <i class="ki-duotone ki-eye fs-3">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            {{ __('buttons.show') }}
        </a>
    </li>
    <li>
        <a href="{{ route('customer.messages.edit', $message->id) }}"
           class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
            <i class="ki-duotone ki-notepad-edit fs-3">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            {{ __('buttons.edit') }}
        </a>
    </li>
    <li>
        <form action="{{ route('customer.messages.destroy', $message->id) }}"
              method="POST"
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
</ul>
