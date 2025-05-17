<div class="d-flex align-items-center">
    <!--begin:: Avatar -->
    @if($user->photo)
        <a href="{{route('admin.users.show',[$user->slug])}}" class="me-3">
            <div class="symbol symbol-50px">
                <img src="{{$user->photo->preview}}" alt="image" class="w-100">
                @if(!$user->approved)
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-3 bg-danger rounded-circle border border-2 border-body h-10px w-10px"></div>
                @endif
            </div>

        </a>
    @else
        <a href="{{route('admin.users.show',[$user->slug])}}" class="me-3">
            <div class="symbol symbol-50px">
                <div class="symbol-label fs-3 fw-bold {{$user->gender =='f' ? "bg-light-danger text-danger" : "bg-light-primary text-primary"}} text-uppercase">
                    {{\Illuminate\Support\Str::limit($user->first_name, 1,'')}}.{{\Illuminate\Support\Str::limit($user->last_name, 1,'')}}
                    @if(!$user->approved)
                        <div
                            class="position-absolute translate-middle bottom-0 start-100 mb-3 bg-danger rounded-circle border border-2 border-body h-10px w-10px"></div>
                    @endif
                </div>
            </div>

        </a>
    @endif

    <!--end::Avatar-->
    <!--begin::User details-->
    <div class="d-flex flex-column">
        <a href="{{route('admin.users.show',[$user->slug])}}"
           class="text-dark fw-bolder text-hover-primary mb-0 fs-6">{{$user->name}}</a>
        <span class="text-gray-600 fs-7 fw-semibold">{{$user->phone}}</span>
    </div>
    <!--begin::User details-->
</div>

