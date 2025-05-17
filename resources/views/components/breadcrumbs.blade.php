@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb breadcrumb-line text-muted fs-7 fw-semibold">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item"><a class="text-muted fw-bolder text-hover-primary" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item text-muted">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>
@endunless
