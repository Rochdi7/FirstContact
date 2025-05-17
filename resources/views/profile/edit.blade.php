<x-app-layout>
    <x-slot name="toolbar">
        <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            {{__('users.title') }}</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        {{ Breadcrumbs::render('profile-edit') }}
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
    </x-slot>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css"
              integrity="sha512-jO9KUHlvIF4MH/OTiio0aaueQrD38zlvFde9JoEA+AQaCNxIJoX4Kjse3sO2kqly84wc6aCtdm9BIUpYdvFYoA=="
              crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/css/intlTelInput.css" integrity="sha512-s51TDsIcMqlh1YdQbF3Vj4StcU/5s97VyLEEpkPWwP0CJfjZ/C5zAaHnG+DZroGDn1UagQezDEy61jP4yoi4vQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <!--begin::About card-->
    <div class="card">
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Mes informations</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Body-->
        <div class="card-body p-5 px-lg-19 py-lg-16">
            <!--begin::Content main-->
            <div class="mb-14">
                <!--begin::Body-->
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="form fv-plugins-bootstrap5 fv-plugins-framework form-update-profile">
                    @csrf
                    @method('patch')
                    <!-- Prénom -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label for="first_name" class="col-lg-4 col-form-label required fw-semibold fs-6">
                            {{ __('users.fields.first_name') }}
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input id="first_name" name="first_name" type="text" class="form-control form-control-lg form-control-solid" placeholder="{{ __('users.fields.first_name') }}" value="{{ old('first_name', $user->first_name) }}" required autofocus autocomplete="given-name">
                            @if ($errors->has('first_name'))
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>

                    <!-- Nom de famille -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label for="last_name" class="col-lg-4 col-form-label required fw-semibold fs-6">
                            {{ __('users.fields.last_name') }}
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input id="last_name" name="last_name" type="text" class="form-control form-control-lg form-control-solid" placeholder="{{ __('users.fields.last_name') }}" value="{{ old('last_name', $user->last_name) }}" required autocomplete="family-name">
                            @if ($errors->has('last_name'))
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label for="email" class="col-lg-4 col-form-label required fw-semibold fs-6">
                            {{ __('users.fields.email') }}
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input id="email" name="email" type="email" class="form-control form-control-lg form-control-solid"  placeholder="{{__('users.fields.email') }}" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @if ($errors->has('email'))
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="btn btn-link text-gray-600 hover:text-gray-900">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('users.fields.gender') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <div class="d-flex align-items-center mt-3">
                                <!--begin::Option-->
                                @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                                    <label
                                        class="form-check form-check-inline form-check-solid me-5 {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" name="gender" type="radio"
                                               value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'checked' : '' }}/>
                                        <span class="fw-bold ps-2 fs-6"
                                              for="gender_{{ $key }}">{{__($label) }}</span>
                                    </label>
                                @endforeach
                                @if($errors->has('gender'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label
                            class="col-lg-4 col-form-label fw-bold fs-6">{{ __('users.fields.phone') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="tel" name="phone_iti" id="phone_iti" value="{{ old('phone', $user->phone ?? '') }}"
                                   class="form-control form-control-lg form-control-solid {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                            <input type="hidden" name="phone" id="phone" value="{{ old('phone', $user->phone ?? '') }}">
                        </div>
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label
                            class="col-lg-4 col-form-label fw-bold fs-6">{{ __('users.fields.birth_date') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input name="birthday"
                                   class="form-control form-control-solid {{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                                   placeholder="{{ __('users.fields.select_date') }}" id="birthday"
                                   value="{{ old('birthday', $user->birthday) }}"/>
                        </div>
                        @if($errors->has('birthday'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birthday') }}
                            </div>
                        @endif
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label
                            class="col-lg-4 col-form-label fw-bold fs-6">{{__('users.fields.profile_photo')}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <!--begin::Dropzone-->
                            <div class="dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                 id="photo-dropzone">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">{{__('messages.upload_instruction')}}</h3>
                                        <span class="fs-7 fw-bold text-gray-400">{{__('messages.upload_photo')}}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        @if($errors->has('photo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photo') }}
                            </div>
                        @endif
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <div class="row mb-6">
                        <div class="col-lg-8 offset-lg-4 d-flex align-items-center gap-4">
                            <button type="submit" class="btn btn-primary">
                                {{__('buttons.save_changes') }}
                            </button>
                        </div>
                    </div>
                </form>


                <!--End::Body-->

            </div>
            <!--end::Content main-->

        </div>
        <!--end::Body-->
    </div>
    <!--end::About card-->

    <!--begin::About card-->
    <div class="card mt-4">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{__('auth.password_change') }}</h3>
            </div>
            <div class="card-toolbar rotate-180">
                <i class="ki-duotone ki-down fs-1"></i>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Body-->
        <div id="kt_docs_card_collapsible" class="collapse">
            <div class="card-body p-5 px-lg-19 py-lg-16">
                <!--begin::Content main-->
                <div class="mb-14">
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <!-- Mot de passe actuel -->
                        <div class="row mb-6">
                            <label for="update_password_current_password"
                                   class="col-lg-4 col-form-label required fw-semibold fs-6">
                                {{__('auth.current_password') }}
                            </label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input id="update_password_current_password" name="current_password" type="password"
                                       class="form-control form-control-lg form-control-solid"
                                       autocomplete="current-password">
                                @if ($errors->updatePassword->has('current_password'))
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        {{ $errors->updatePassword->first('current_password') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Nouveau mot de passe -->
                        <div class="row mb-6">
                            <label for="update_password_password"
                                   class="col-lg-4 col-form-label required fw-semibold fs-6">
                                {{__('auth.new_password') }}
                            </label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input id="update_password_password" name="password" type="password"
                                       class="form-control form-control-lg form-control-solid"
                                       autocomplete="new-password">
                                @if ($errors->updatePassword->has('password'))
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        {{ $errors->updatePassword->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Confirmer le mot de passe -->
                        <div class="row mb-6">
                            <label for="update_password_password_confirmation"
                                   class="col-lg-4 col-form-label required fw-semibold fs-6">
                                {{__('auth.password_repeat') }}
                            </label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input id="update_password_password_confirmation" name="password_confirmation"
                                       type="password" class="form-control form-control-lg form-control-solid"
                                       autocomplete="new-password">
                                @if ($errors->updatePassword->has('password_confirmation'))
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        {{ $errors->updatePassword->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Bouton Sauvegarder -->
                        <div class="row mb-6">
                            <div class="col-lg-8 offset-lg-4 d-flex align-items-center gap-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('buttons.save_changes') }}
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-success"
                                    >
                                        {{__('buttons.save_changes') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Content main-->

            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::About card-->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/intlTelInput.min.js" integrity="sha512-uZZS8rsETXJQX6Jy57Zdc7PAmP83GCjC1F/LX0xUj12wY5SlfUX+CVnYFEX89doutQPeFbI9FjUCkpuTWqlBwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.min.js" integrity="sha512-viyGJzhGVZqq0awVdFrcUjKyAtoYoxXzAZBBkMd1E19TkkdpMM+UpfgF+yaCst2D4Vsz4dMMW1wi2wyvU79BoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $("#birthday").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"
                integrity="sha512-FHa4dxvEkSR0LOFH/iFH0iSqlYHf/iTwLc5Ws/1Su1W90X0qnxFxciJimoue/zyOA/+Qz/XQmmKqjbubAAzpkA=="
                crossorigin="anonymous"></script>

        <script>
            // Start cell phone
            var input_cell_phone = document.querySelector("#phone_iti");
            var phoneErrorMsg = document.getElementById('phone-error-msg');
            // initialise plugin
            var iti_cell_phone = window.intlTelInput(input_cell_phone, {
                separateDialCode:true,
                localizedCountries:{"af":"Afghanistan (‫افغانستان‬‎)","al":"Albanie (Shqipëri)","dz":"Algérie (‫الجزائر‬‎)","as":"Samoa américaines (American Samoa)","ad":"Andorre (Andorra)","ao":"Angola","ai":"Anguilla","ag":"Antigua-et-Barbuda (Antigua and Barbuda)","ar":"Argentine (Argentina)","am":"Arménie (Հայաստան)","aw":"Aruba","au":"Australie (Australia)","at":"Autriche (Österreich)","az":"Azerbaïdjan (Azərbaycan)","bs":"Bahamas","bh":"Bahreïn (‫البحرين‬‎)","bd":"Bangladesh (বাংলাদেশ)","bb":"Barbade (Barbados)","by":"Biélorussie (Беларусь)","be":"Belgique (België)","bz":"Belize","bj":"Bénin","bm":"Bermudes (Bermuda)","bt":"Bhoutan (འབྲུག)","bo":"Bolivie (Bolivia)","ba":"Bosnie-Herzégovine (Босна и Херцеговина)","bw":"Botswana","br":"Brésil (Brasil)","io":"Territoire britannique de l’océan Indien (British Indian Ocean Territory)","vg":"Îles Vierges britanniques (British Virgin Islands)","bn":"Brunei","bg":"Bulgarie (България)","bf":"Burkina Faso","bi":"Burundi (Uburundi)","kh":"Cambodge (កម្ពុជា)","cm":"Cameroun","ca":"Canada","cv":"Cap-Vert (Kabu Verdi)","bq":"Bonaire, Saint-Eustache et Saba (Caribbean Netherlands)","ky":"Îles Caïmans (Cay Islands)","cf":"République centrafricaine","td":"Tchad","cl":"Chili (Chile)","cn":"Chine (中国)","co":"Colombie (Colombia)","km":"Comores (‫جزر القمر‬‎)","cd":"République démocratique du Congo (Jamhuri ya Kidemokrasia ya Kongo)","cg":"République du Congo / (Congo) (Congo-Brazzaville)","ck":"Îles Cook (Cook Islands)","cr":"Costa Rica","ci":"Côte d’Ivoire","hr":"Croatie (Hrvatska)","cu":"Cuba","cw":"Curaçao","cy":"Chypre (Κύπρος)","cz":"République tchèque (Česká republika)","dk":"Danemark (Danmark)","dj":"Djibouti","dm":"Dominique (Dominica)","do":"République dominicaine (República Dominicana)","ec":"Équateur (Ecuador)","eg":"Égypte (‫مصر‬‎)","sv":"Salvador (El Salvador)","gq":"Guinée équatoriale (Guinea Ecuatorial)","er":"Érythrée (Eritrea)","ee":"Estonie (Eesti)","et":"Éthiopie (Ethiopia)","fk":"Îles Malouines (Islas Malvinas)","fo":"Îles Féroé (Føroyar)","fj":"Fidji (Fiji)","fi":"Finlande (Suomi)","fr":"France","gf":"Guyane (Guyane française)","pf":"Polynésie française","ga":"Gabon","gm":"Gambie (Gambia)","ge":"Géorgie (საქართველო)","de":"Allemagne (Deutschland)","gh":"Ghana (Gaana)","gi":"Gibraltar","gr":"Grèce (Ελλάδα)","gl":"Groenland (Kalaallit Nunaat)","gd":"Grenade (Grenada)","gp":"Guadeloupe","gu":"Guam","gt":"Guatemala","gn":"Guinée","gw":"Guinée-Bissau (República da Guiné-Bissau)","gy":"Guyana","ht":"Haïti (Haiti)","hn":"Honduras","hk":"Hong Kong (香港)","hu":"Hongrie (Magyarország)","is":"Islande (Ísland)","in":"Inde (भारत)","id":"Indonésie (Indonesia)","ir":"Iran (‫ایران‬‎)","iq":"Irak (‫العراق‬‎)","ie":"Irlande (Ireland)","il":"Israël (‫ישראל‬‎)","it":"Italie (Italia)","jm":"Jamaïque (Jamaica)","jp":"Japon (日本)","jo":"Jordanie (‫الأردن‬‎)","kz":"Kazakhstan (Казахстан)","ke":"Kenya","ki":"Kiribati","kw":"Koweït (‫الكويت‬‎)","kg":"Kirghizistan (Кыргызстан)","la":"Laos (ລາວ)","lv":"Lettonie (Latvija)","lb":"Liban (‫لبنان‬‎)","ls":"Lesotho","lr":"Liberia","ly":"Libye (‫ليبيا‬‎)","li":"Liechtenstein","lt":"Lituanie (Lietuva)","lu":"Luxembourg","mo":"Macao (澳門)","mk":"Macédoine (Македонија)","mg":"Madagascar (Madagasikara)","mw":"Malawi","my":"Malaisie (Malaysia)","mv":"Maldives","ml":"Mali","mt":"Malte (Malta)","mh":"Marshall (Marshall Islands)","mq":"Martinique","mr":"Mauritanie (‫موريتانيا‬‎)","mu":"Maurice (Moris)","mx":"Mexique (México)","fm":"Micronésie (Micronesia)","md":"Moldavie (Republica Moldova)","mc":"Monaco","mn":"Mongolie (Монгол)","me":"Monténégro (Crna Gora)","ms":"Montserrat","ma":"Maroc (‫المغرب‬‎)","mz":"Mozambique (Moçambique)","mm":"Birmanie (မြန်မာ)","na":"Namibie (Namibië)","nr":"Nauru","np":"Népal (नेपाल)","nl":"Pays-Bas (Nederland)","nc":"Nouvelle-Calédonie","nz":"Nouvelle-Zélande (New Zealand)","ni":"Nicaragua","ne":"Niger (Nijar)","ng":"Nigeria","nu":"Niue","nf":"Île Norfolk (Norfolk Island)","kp":"Corée du Nord (조선 민주주의 인민 공화국)","mp":"Îles Mariannes du Nord (Northern Mariana Islands)","no":"Norvège (Norge)","om":"Oman (‫عُمان‬‎)","pk":"Pakistan (‫پاکستان‬‎)","pw":"Palaos (Palau)","ps":"Autorité palestinienne (‫فلسطين‬‎)","pa":"Panama (Panamá)","pg":"Papouasie-Nouvelle-Guinée (Papua New Guinea)","py":"Paraguay","pe":"Pérou (Perú)","ph":"Philippines","pl":"Pologne (Polska)","pt":"Portugal","pr":"Porto Rico (Puerto Rico)","qa":"Qatar (‫قطر‬‎)","re":"La Réunion","ro":"Roumanie (România)","ru":"Russie (Россия)","rw":"Rwanda","bl":"Saint-Barthélemy","sh":"Sainte-Hélène, Ascension et Tristan da Cunha (Saint Helena)","kn":"Saint-Christophe-et-Niévès (Saint Kitts and Nevis)","lc":"Sainte-Lucie (Saint Lucia)","mf":"Saint-Martin (Antilles françaises) (partie française))","pm":"Saint-Pierre-et-Miquelon","vc":"Saint-Vincent-et-les-Grenadines (Saint Vincent and the Grenadines)","ws":"Samoa","sm":"Saint-Marin (San Marino)","st":"Sao Tomé-et-Principe (São Tomé e Príncipe)","sa":"Arabie saoudite (‫المملكة العربية السعودية‬‎)","sn":"Sénégal","rs":"Serbie (Србија)","sc":"Seychelles","sl":"Sierra Leone","sg":"Singapour (Singapore)","sx":"Saint-Martin (Sint Maarten)","sk":"Slovaquie (Slovensko)","si":"Slovénie (Slovenija)","sb":"Salomon (Solomon Islands)","so":"Somalie (Soomaaliya)","za":"Afrique du Sud (South Africa)","kr":"Corée du Sud (대한민국)","ss":"Soudan du Sud (‫جنوب السودان‬‎)","es":"Espagne (España)","lk":"Sri Lanka (ශ්‍රී ලංකාව)","sd":"Soudan (‫السودان‬‎)","sr":"Suriname","sz":"Swaziland","se":"Suède (Sverige)","ch":"Suisse (Schweiz)","sy":"Syrie (‫سوريا‬‎)","tw":"Taïwan / (République de Chine (Taïwan)) (台灣)","tj":"Tadjikistan (Tajikistan)","tz":"Tanzanie (Tanzania)","th":"Thaïlande (ไทย)","tl":"Timor oriental (Timor-Leste)","tg":"Togo","tk":"Tokelau","to":"Tonga","tt":"Trinité-et-Tobago (Trinidad and Tobago)","tn":"Tunisie (‫تونس‬‎)","tr":"Turquie (Türkiye)","tm":"Turkménistan (Turkmenistan)","tc":"Îles Turques-et-Caïques (Turks and Caicos Islands)","tv":"Tuvalu","vi":"Îles Vierges des États-Unis (U.S. Virgin Islands)","ug":"Ouganda (Uganda)","ua":"Ukraine (Україна)","ae":"Émirats arabes unis (‫الإمارات العربية المتحدة‬‎)","gb":"Royaume-Uni (United Kingdom)","us":"États-Unis (United States)","uy":"Uruguay","uz":"Ouzbékistan (Oʻzbekiston)","vu":"Vanuatu","va":"État de la Cité du Vatican (Città del Vaticano)","ve":"Venezuela","vn":"Viêt Nam (Việt Nam)","wf":"Wallis-et-Futuna (Wallis and Futuna)","ye":"Yémen (‫اليمن‬‎)","zm":"Zambie (Zambia)","zw":"Zimbabwe"},
                // preferredCountries: ["MA", "FR"],
                // onlyCountries: ["MA", "FR"],
            });

            const init_cell_phone={!! old('phone', $user->phone??'')==''? 1 : 0!!};
            if (init_cell_phone!==1){
                iti_cell_phone.setNumber("{{ old('phone', $user->phone??'') }}");
            }

            var reset = function() {
                input_cell_phone.classList.remove("is-invalid");
            };
            iti_cell_phone.setNumber($('#phone').val());
            // on blur: validate
            input_cell_phone.addEventListener('blur', function() {
                reset();
                if (input_cell_phone.value.trim()) {
                    if (iti_cell_phone.isValidNumber()) {
                        input_cell_phone.classList.remove("is-invalid");
                        input_cell_phone.classList.add("is-valid");
                        $('#phone').val(iti_cell_phone.getNumber());
                        phoneErrorMsg.style.display = 'none';
                    } else {
                        input_cell_phone.classList.remove("is-valid");
                        input_cell_phone.classList.add("is-invalid");
                        phoneErrorMsg.style.display = 'block';
                    }
                }
            });

            // on keyup / change flag: reset
            input_cell_phone.addEventListener('change', reset);
            input_cell_phone.addEventListener('keyup', reset);
            // End cell phone
        </script>
        <script>
            $("div#photo-dropzone").dropzone({
                url: '{{ route('profile.storeMedia') }}',
                maxFilesize: 4, // MB
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    size: 4,
                    width: 1000,
                    height: 1000
                },

                success: function (file, response) {
                    $('.form-update-profile').find('input[name="photo"]').remove()
                    $('.form-update-profile').append('<input type="hidden" name="photo" value="' + response.name + '">')
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    if (file.status !== 'error') {
                        $('.form-update-profile').find('input[name="photo"]').remove()
                        this.options.maxFiles = this.options.maxFiles + 1
                    }
                },
                init: function () {
                    @if(isset($user) && $user->photo)
                    var file = {!! json_encode($user->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('.form-update-profile').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                    @endif
                },
                error: function (file, response) {
                    if ($.type(response) === 'string') {
                        var message = response //dropzone sends it's own error messages in string
                    } else {
                        var message = response.errors.file
                    }
                    file.previewElement.classList.add('dz-error')
                    _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                    _results = []
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i]
                        _results.push(node.textContent = message)
                    }

                    return _results
                },
                transformFile: function (file, done) {
                    var documentFileDropzone = this;

                    // Create the image editor overlay
                    var editor = document.createElement('div');
                    editor.style.position = 'fixed';
                    editor.style.left = 0;
                    editor.style.right = 0;
                    editor.style.top = 0;
                    editor.style.bottom = 0;
                    editor.style.zIndex = 9999;
                    editor.style.backgroundColor = '#000';

                    // Create the confirm button
                    var confirm = document.createElement('button');
                    confirm.style.position = 'absolute';
                    confirm.style.left = '10px';
                    confirm.style.top = '10px';
                    confirm.style.zIndex = 9999;
                    confirm.textContent = 'Confirm';
                    confirm.addEventListener('click', function () {

                        // Get the canvas with image data from Cropper.js
                        var canvas = cropper.getCroppedCanvas({
                            width: 400,
                            height: 400
                        });

                        // Turn the canvas into a Blob (file object without a name)
                        canvas.toBlob(function (blob) {

                            // Update the image thumbnail with the new image data
                            documentFileDropzone.createThumbnail(
                                blob,
                                documentFileDropzone.options.thumbnailWidth,
                                documentFileDropzone.options.thumbnailHeight,
                                documentFileDropzone.options.thumbnailMethod,
                                false,
                                function (dataURL) {

                                    // Update the Dropzone file thumbnail
                                    documentFileDropzone.emit('thumbnail', file, dataURL);

                                    // Return modified file to dropzone
                                    done(blob);
                                }
                            );

                        });

                        // Remove the editor from view
                        editor.parentNode.removeChild(editor);

                    });
                    editor.appendChild(confirm);

                    // Load the image
                    var image = new Image();
                    image.src = URL.createObjectURL(file);
                    editor.appendChild(image);

                    // Append the editor to the page
                    document.body.appendChild(editor);

                    // Create Cropper.js and pass image
                    var cropper = new Cropper(image, {
                        aspectRatio: 1
                    });

                }
            })
        </script>
    @endpush

</x-app-layout>
