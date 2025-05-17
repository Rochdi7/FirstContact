<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
   data-bs-toggle="dropdown" aria-expanded="false">
    {{__('buttons.actions')}}
{{--    <i class="ki-outline ki-down fs-5 ms-1"></i>--}}
</a>
<ul class="dropdown-menu">
    @can('show store_types')
        <li>
            <a href="{{ route('admin.store_types.edit', $storeType->id) }}" class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                <i class="ki-duotone ki-book-square fs-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                {{__('buttons.show')}}</a>
        </li>
    @endcan
    @can('edit store_types')
        <li>
            <a href="{{ route('admin.store_types.edit', $storeType->id) }}" class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                <i class="ki-duotone ki-notepad-edit fs-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                {{__('buttons.edit')}}</a>
        </li>
    @endcan
        @can('delete store_types')
        <li>
            <form action="{{ route('admin.store_types.destroy', $storeType->id) }}" method="POST"
                  onsubmit="return confirm('{{__('messages.confirm_delete')}}');">
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
                    {{__('buttons.delete')}}</button>
            </form>
        </li>
        @endcan
</ul>
