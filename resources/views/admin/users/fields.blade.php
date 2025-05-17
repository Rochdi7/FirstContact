<!--begin::Scroll-->
<div class="row">
    <h3 class="my-4 fs-4">{{ __('users.form.base_info') }}</h3>
    <div class="separator mb-5"></div>
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('users.fields.first_name') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0  {{ $errors->has('first_name') ? 'is-invalid' : '' }}"  required placeholder="{{ __('users.fields.first_name') }}" value="{{ old('first_name', $user->first_name ?? '') }}" />
        <!--end::Input-->
        @if ($errors->has('first_name'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('first_name') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('users.fields.last_name') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0  {{ $errors->has('last_name') ? 'is-invalid' : '' }}" required placeholder="{{ __('users.fields.last_name') }}" value="{{ old('last_name', $user->last_name ?? '') }}" />
        <!--end::Input-->
        @if ($errors->has('last_name'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('last_name') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('users.fields.email') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0  {{ $errors->has('email') ? 'is-invalid' : '' }}" required placeholder="{{ __('users.fields.email') }}" value="{{ old('email', $user->email ?? '') }}" />
        <!--end::Input-->
        @if ($errors->has('email'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{ __('users.fields.status') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <div class="fv-row mt-1">
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input type="hidden" name="approved" value="0">
                <input class="form-check-input" name="approved" value="1"
                       type="checkbox" {{ old('approved', $user->approved ?? 1) == 1 ? 'checked' : '' }}/>
            </div>
        </div>
        <!--end::Input-->
        @if ($errors->has('approved'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                {{ $errors->first('approved') }}
            </div>
        @endif
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    @if(!isset($user))
        <!--begin::Input group-->
        <div class="col-md-6 mb-7" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <label class="required fw-semibold fs-6 mb-2">{{ __('users.fields.password') }}</label>
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-solid {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="{{ __('users.fields.password') }}" name="password" required autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
													<i class="ki-outline ki-eye-slash fs-2"></i>
													<i class="ki-outline ki-eye fs-2 d-none"></i>
												</span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">{{ __('users.fields.password_hint') }}</div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
    @endif
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{__('users.fields.phone')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="fv-row">
            <input type="tel" name="phone_iti" id="phone_iti" required value="{{ old('phone', $user->phone ?? '') }}"
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
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{__('users.fields.gender')}}</label>
        <!--end::Label-->
            <div class="d-flex align-items-center mt-3">
                <!--begin::Option-->
                @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                    <label
                        class="form-check form-check-inline form-check-solid me-5 {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" name="gender" required type="radio"
                               value="{{ $key }}" {{ old('gender', $user->gender ?? '') === (string) $key ? 'checked' : '' }}/>
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
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-2">{{__('users.fields.birth_date')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
            <input name="birthday"
                   class="form-control form-control-solid {{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                   placeholder="{{__('messages.select_date')}}" id="birthday"
                   value="{{ old('birthday', $user->birthday ?? '') }}" required/>
        @if($errors->has('birthday'))
            <div class="invalid-feedback">
                {{ $errors->first('birthday') }}
            </div>
        @endif
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="col-md-6 mb-7">
        <!--begin::Label-->
        <label
            class="fw-semibold fs-6 mb-2">{{__('users.fields.profile_photo')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
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
        @if($errors->has('photo'))
            <div class="invalid-feedback">
                {{ $errors->first('photo') }}
            </div>
        @endif
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <h3 class="my-4 fs-4">{{ __('users.form.roles_permissions') }}</h3>
    <div class="separator mb-5"></div>
    <div class="mb-5">
        <!--begin::Label-->
        <label class="required fw-semibold fs-6 mb-5">{{__('users.fields.role')}}</label>
        <!--end::Label-->
        <!--begin::Roles-->
        @foreach ($roles as $key => $role)
            <!--begin::Input row-->
            <div class="d-flex fv-row">
                <!--begin::Radio-->
                <div class="form-check form-check-custom form-check-solid">
                    <!--begin::Input-->
                    <input class="form-check-input me-3" name="role" type="radio" value="{{ $role->id }}" id="kt_modal_update_role_option_{{ $key }}"
                        {{ (old('role', (isset($user) ? $user->roles->first()->id : null)) == $role->id) ? 'checked' : '' }} />
                    <!--end::Input-->
                    <!--begin::Label-->
                    <label class="form-check-label" for="kt_modal_update_role_option_{{ $key }}">
                        <div class="fw-bold text-gray-800">{{__('roles.role.'.$role->name) }}</div>
                        <div class="text-gray-600">{{ $role->description }}</div>
                    </label>
                    <!--end::Label-->
                </div>
                <!--end::Radio-->
            </div>
            <!--end::Input row-->
            @if(!$loop->last)
                <div class='separator separator-dashed my-5'></div> <!-- Separator between rows except last -->
            @endif
        @endforeach
        <!--end::Roles-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Scroll-->
<!--begin::Actions-->
<div class="text-start pt-10">
    <a href="{{route('admin.users.index')}}" type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">{{__('buttons.cancel') }}</a>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">{{__('buttons.save_changes') }}</span>
    </button>
</div>
<!--end::Actions-->
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css"
          integrity="sha512-jO9KUHlvIF4MH/OTiio0aaueQrD38zlvFde9JoEA+AQaCNxIJoX4Kjse3sO2kqly84wc6aCtdm9BIUpYdvFYoA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/css/intlTelInput.css" integrity="sha512-s51TDsIcMqlh1YdQbF3Vj4StcU/5s97VyLEEpkPWwP0CJfjZ/C5zAaHnG+DZroGDn1UagQezDEy61jP4yoi4vQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/intlTelInput.min.js" integrity="sha512-uZZS8rsETXJQX6Jy57Zdc7PAmP83GCjC1F/LX0xUj12wY5SlfUX+CVnYFEX89doutQPeFbI9FjUCkpuTWqlBwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.2.1/js/utils.min.js" integrity="sha512-viyGJzhGVZqq0awVdFrcUjKyAtoYoxXzAZBBkMd1E19TkkdpMM+UpfgF+yaCst2D4Vsz4dMMW1wi2wyvU79BoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>
    <script>
        $("#birthday").flatpickr({
            locale: 'fr',
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
            preferredCountries: ["MA", "FR"],
            onlyCountries: ["MA", "FR"],
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
                $('.form-user').find('input[name="photo"]').remove()
                $('.form-user').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('.form-user').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($user) && $user->photo)
                var file = {!! json_encode($user->photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('.form-user').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
