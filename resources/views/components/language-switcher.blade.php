<div class="dropdown">
    <button class="btn btn-flex btn-icon align-self-center fw-bold btn-secondary w-30px w-md-100 h-30px h-md-35px px-4 dropdown-toggle"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false">
        {{ $supportedLocales[App::getLocale()]['native'] }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach($supportedLocales as $localeCode => $properties)
            @if($localeCode !== App::getLocale())
                <li>
                    <a class="dropdown-item text-capitalize" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
