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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">View Contact</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Apps</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Contacts</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add Member</a>
                        <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">New Campaign</a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
    </x-slot>

    <div class="row g-7">
        <!--begin::Contact groups-->
        <div class="col-lg-6 col-xl-3">
            <!--begin::Contact group wrapper-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Groups</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Contact groups-->
                    <div class="d-flex flex-column gap-5">
                        <!--begin::Contact group-->
                        <div class="d-flex flex-stack">
                            <a href="apps/contacts/getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">All Contacts</a>
                            <div class="badge badge-light-primary">9</div>
                        </div>
                        <!--begin::Contact group-->
                        <!--begin::Contact group-->
                        <div class="d-flex flex-stack">
                            <a href="apps/contacts/getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary">Subscribed</a>
                            <div class="badge badge-light-primary">3</div>
                        </div>
                        <!--begin::Contact group-->
                        <!--begin::Contact group-->
                        <div class="d-flex flex-stack">
                            <a href="apps/contacts/getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary">Tier 1 Member</a>
                            <div class="badge badge-light-primary">1</div>
                        </div>
                        <!--begin::Contact group-->
                        <!--begin::Contact group-->
                        <div class="d-flex flex-stack">
                            <a href="apps/contacts/getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary">Pending Approval</a>
                            <div class="badge badge-light-primary">3</div>
                        </div>
                        <!--begin::Contact group-->
                        <!--begin::Contact group-->
                        <div class="d-flex flex-stack">
                            <a href="apps/contacts/getting-started.html" class="fs-6 fw-bold text-danger text-hover-primary">Blocked</a>
                            <div class="badge badge-light-danger">2</div>
                        </div>
                        <!--begin::Contact group-->
                    </div>
                    <!--end::Contact groups-->
                    <!--begin::Separator-->
                    <div class="separator my-7"></div>
                    <!--begin::Separator-->
                    <!--begin::Add contact group-->
                    <label class="fs-6 fw-semibold form-label">Add new group</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-solid" placeholder="Group name" />
                        <button type="button" class="btn btn-icon btn-light">
                            <i class="ki-outline ki-plus-square fs-2"></i>
                        </button>
                    </div>
                    <!--end::Add contact group-->
                    <!--begin::Separator-->
                    <div class="separator my-7"></div>
                    <!--begin::Separator-->
                    <!--begin::Add new contact-->
                    <a href="apps/contacts/add-contact.html" class="btn btn-primary w-100">
                        <i class="ki-outline ki-badge fs-2"></i>Add new contact</a>
                    <!--end::Add new contact-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contact group wrapper-->
        </div>
        <!--end::Contact groups-->
        <!--begin::Search-->
        <div class="col-lg-6 col-xl-3">
            <!--begin::Contacts-->
            <div class="card card-flush" id="kt_contacts_list">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_contacts_list_header">
                    <!--begin::Form-->
                    <form class="d-flex align-items-center position-relative w-100 m-0" autocomplete="off">
                        <!--begin::Icon-->
                        <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"></i>
                        <!--end::Icon-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid ps-13" name="search" value="" placeholder="Search contacts" />
                        <!--end::Input-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5" id="kt_contacts_list_body">
                    <!--begin::List-->
                    <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                    <div class="fw-semibold fs-7 text-muted">smith@kpmg.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
                                    <div class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                    <div class="fw-semibold fs-7 text-muted">melody@altbox.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                    <div class="fw-semibold fs-7 text-muted">max@kt.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                    <div class="fw-semibold fs-7 text-muted">sean@dellito.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                    <div class="fw-semibold fs-7 text-muted">brian@exchange.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-warning text-warning fs-6 fw-bolder">C</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
                                    <div class="fw-semibold fs-7 text-muted">mik@pex.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                    <div class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
                                    <div class="fw-semibold fs-7 text-muted">f.mit@kpmg.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">O</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                    <div class="fw-semibold fs-7 text-muted">olivia@corpmail.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-primary text-primary fs-6 fw-bolder">N</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                    <div class="fw-semibold fs-7 text-muted">owen.neil@gmail.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                    <div class="fw-semibold fs-7 text-muted">dam@consilting.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">E</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                    <div class="fw-semibold fs-7 text-muted">emma@intenso.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                    <div class="fw-semibold fs-7 text-muted">ana.cf@limtel.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-info text-info fs-6 fw-bolder">A</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                    <div class="fw-semibold fs-7 text-muted">robert@benko.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
                                    <div class="fw-semibold fs-7 text-muted">miller@mapple.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <span class="symbol-label bg-light-success text-success fs-6 fw-bolder">L</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                    <div class="fw-semibold fs-7 text-muted">lucy.m@fentech.com</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a href="apps/contacts/view-contact.html" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                                    <div class="fw-semibold fs-7 text-muted">ethan@loop.com.au</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::List-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>
        <!--end::Search-->
        <!--begin::Content-->
        <div class="col-xl-6">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <i class="ki-outline ki-badge fs-1 me-2"></i>
                        <h2>Contact Details</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar gap-3">
                        <!--begin::Chat-->
                        <button class="btn btn-sm btn-light btn-active-light-primary" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">
                            <i class="ki-outline ki-message-text-2 fs-2"></i>Chat</button>
                        <!--end::Chat-->
                        <!--begin::Chat-->
                        <a href="apps/inbox/reply.html" class="btn btn-sm btn-light btn-active-light-primary">
                            <i class="ki-outline ki-messages fs-2"></i>Message</a>
                        <!--end::Chat-->
                        <!--begin::Action menu-->
                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-dots-square fs-2"></i>
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="apps/contacts/edit-contact.html" class="menu-link px-3">Edit</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" id="kt_contact_delete" data-kt-redirect="apps/contacts/getting-started.html">Delete</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Action menu-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <!--begin::Profile-->
                    <div class="d-flex gap-7 align-items-center">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-circle symbol-100px">
                            <img src="assets/media/avatars/300-6.jpg" alt="image" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Contact details-->
                        <div class="d-flex flex-column gap-2">
                            <!--begin::Name-->
                            <h3 class="mb-0">Emma Smith</h3>
                            <!--end::Name-->
                            <!--begin::Email-->
                            <div class="d-flex align-items-center gap-2">
                                <i class="ki-outline ki-sms fs-2"></i>
                                <a href="#" class="text-muted text-hover-primary">smith@kpmg.com</a>
                            </div>
                            <!--end::Email-->
                            <!--begin::Phone-->
                            <div class="d-flex align-items-center gap-2">
                                <i class="ki-outline ki-phone fs-2"></i>
                                <a href="#" class="text-muted text-hover-primary">+6141 234 567</a>
                            </div>
                            <!--end::Phone-->
                        </div>
                        <!--end::Contact details-->
                    </div>
                    <!--end::Profile-->
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general">
                                <i class="ki-outline ki-home fs-4 me-1"></i>General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_meetings">
                                <i class="ki-outline ki-calendar-8 fs-4 me-1"></i>Meetings</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_activity">
                                <i class="ki-outline ki-save-2 fs-4 me-1"></i>Activity</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content" id="">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                            <!--begin::Additional details-->
                            <div class="d-flex flex-column gap-5 mt-7">
                                <!--begin::Company name-->
                                <div class="d-flex flex-column gap-1">
                                    <div class="fw-bold text-muted">Company Name</div>
                                    <div class="fw-bold fs-5">Keenthemes Inc</div>
                                </div>
                                <!--end::Company name-->
                                <!--begin::City-->
                                <div class="d-flex flex-column gap-1">
                                    <div class="fw-bold text-muted">City</div>
                                    <div class="fw-bold fs-5">Melbourne</div>
                                </div>
                                <!--end::City-->
                                <!--begin::Country-->
                                <div class="d-flex flex-column gap-1">
                                    <div class="fw-bold text-muted">Country</div>
                                    <div class="fw-bold fs-5">Australia</div>
                                </div>
                                <!--end::Country-->
                                <!--begin::Notes-->
                                <div class="d-flex flex-column gap-1">
                                    <div class="fw-bold text-muted">Notes</div>
                                    <p>Emma Smith joined the team on September 2019 as a junior associate. She soon showcased her expertise and experience in knowledge and skill in the field, which was very valuable to the company. She was promptly promoted to senior associate on July 2020.
                                        <br />
                                        <br />Emma Smith now heads a team of 5 associates and leads the company's sales growth by 7%.</p>
                                </div>
                                <!--end::Notes-->
                            </div>
                            <!--end::Additional details-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">
                            <!--begin::Dates-->
                            <ul class="nav nav-pills d-flex flex-stack flex-nowrap scroll-x pb-2">
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_0">
                                        <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                        <span class="fs-6 fw-bold">22</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary active" data-bs-toggle="tab" href="#kt_schedule_day_1">
                                        <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                        <span class="fs-6 fw-bold">23</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_2">
                                        <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                        <span class="fs-6 fw-bold">24</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_3">
                                        <span class="opacity-50 fs-7 fw-semibold">We</span>
                                        <span class="fs-6 fw-bold">25</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_4">
                                        <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                        <span class="fs-6 fw-bold">26</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_5">
                                        <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                        <span class="fs-6 fw-bold">27</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_6">
                                        <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                        <span class="fs-6 fw-bold">28</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_7">
                                        <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                        <span class="fs-6 fw-bold">29</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_8">
                                        <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                        <span class="fs-6 fw-bold">30</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                                <!--begin::Date-->
                                <li class="nav-item me-1">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 text-gray-900 text-active-white btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_9">
                                        <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                        <span class="fs-6 fw-bold">31</span>
                                    </a>
                                </li>
                                <!--end::Date-->
                            </ul>
                            <!--end::Dates-->
                            <!--begin::Tab Content-->
                            <div class="tab-content">
                                <!--begin::Day-->
                                <div id="kt_schedule_day_0" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">11:00 - 11:45
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Walter White</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Kendell Trevor</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">9:00 - 10:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Mark Randall</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_1" class="tab-pane fade show active">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">14:30 - 15:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly Team Stand-Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Karina Clarke</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Development Team Capacity Review</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">David Stevenson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">13:00 - 14:00
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly Team Stand-Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Kendell Trevor</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_2" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">11:00 - 11:45
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Kendell Trevor</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Creative Content Initiative</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">David Stevenson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">10:00 - 11:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Team Backlog Grooming Session</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Naomi Hayabusa</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_3" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly Team Stand-Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Walter White</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Lunch & Learn Catch Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Caleb Donaldson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Naomi Hayabusa</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_4" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Yannis Gloverson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">11:00 - 11:45
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Naomi Hayabusa</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">13:00 - 14:00
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales Pitch Proposal</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">David Stevenson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_5" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Mark Randall</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">10:00 - 11:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly Team Stand-Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Karina Clarke</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">14:30 - 15:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Peter Marcus</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_6" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">11:00 - 11:45
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales Pitch Proposal</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Michael Walters</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">10:00 - 11:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Bob Harris</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Sean Bean</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_7" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">13:00 - 14:00
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing Campaign Discussion</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Caleb Donaldson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">10:00 - 11:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Lunch & Learn Catch Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Peter Marcus</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-success rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">16:30 - 17:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Creative Content Initiative</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Caleb Donaldson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_8" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">14:30 - 15:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Marketing Campaign Discussion</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Walter White</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-info rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">11:00 - 11:45
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales Pitch Proposal</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Walter White</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-warning rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">12:00 - 13:00
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Development Team Capacity Review</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Sean Bean</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                                <!--begin::Day-->
                                <div id="kt_schedule_day_9" class="tab-pane fade show">
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">13:00 - 14:00
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Project Review & Testing</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Yannis Gloverson</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-danger rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">14:30 - 15:30
                                                <span class="fs-7 text-gray-500 text-uppercase">pm</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Sales Pitch Proposal</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Sean Bean</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                    <!--begin::Time-->
                                    <div class="d-flex flex-stack position-relative my-6">
                                        <!--begin::Bar-->
                                        <div class="position-absolute h-100 w-4px bg-primary rounded top-0 start-0"></div>
                                        <!--end::Bar-->
                                        <!--begin::Info-->
                                        <div class="fw-semibold ms-5 text-gray-600">
                                            <!--begin::Time-->
                                            <div class="fs-5">10:00 - 11:00
                                                <span class="fs-7 text-gray-500 text-uppercase">am</span></div>
                                            <!--end::Time-->
                                            <!--begin::Title-->
                                            <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">Weekly Team Stand-Up</a>
                                            <!--end::Title-->
                                            <!--begin::User-->
                                            <div class="text-gray-500">Lead by
                                                <a href="#">Sean Bean</a></div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Time-->
                                </div>
                                <!--end::Day-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                            <!--begin::Timeline-->
                            <div class="timeline-label">
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-warning fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest. And keep structure</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">10:00</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Content-->
                                    <div class="timeline-content d-flex">
                                        <span class="fw-bold text-gray-800 ps-3">AEOL meeting</span>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">14:37</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-danger fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Desc-->
                                    <div class="timeline-content fw-bold text-gray-800 ps-3">Make deposit
                                        <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-primary fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">21:03</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-danger fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Desc-->
                                    <div class="timeline-content fw-semibold text-gray-800 ps-3">New order placed
                                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-primary fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">21:03</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-danger fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Desc-->
                                    <div class="timeline-content fw-semibold text-gray-800 ps-3">New order placed
                                        <a href="#" class="text-primary">#XF-2356</a>.</div>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">10:30</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="ki-outline ki-abstract-8 text-success fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile app launch preparion meeting</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Timeline-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>
        <!--end::Content-->
    </div>

</x-app-layout>
