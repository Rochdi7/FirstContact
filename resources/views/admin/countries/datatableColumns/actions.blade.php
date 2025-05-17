<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm dropdown-toggle"
   data-bs-toggle="dropdown" aria-expanded="false">
    {{__('buttons.actions')}}
{{--    <i class="ki-outline ki-down fs-5 ms-1"></i>--}}
</a>
<ul class="dropdown-menu">
    @can('show countries')
        <li>
            <a href="{{ route('admin.countries.edit', $country->id) }}" class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                <i class="ki-duotone ki-book-square fs-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                {{__('buttons.show')}}</a>
        </li>
    @endcan
    @can('edit countries')
        <li>
            <a href="{{ route('admin.countries.edit', $country->id) }}" class="dropdown-item btn btn-sm btn-active-icon-dark btn-text-dark">
                <i class="ki-duotone ki-notepad-edit fs-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                {{__('buttons.edit')}}</a>
        </li>
    @endcan
        @can('delete countries')
        <li>
            <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST"
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
