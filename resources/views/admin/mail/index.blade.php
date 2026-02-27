@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Inbox</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card" style="height:600px">
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#composemodal">
                            Compose
                        </button>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="#" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span
                                class="ms-1 float-end">({{ $mailCount }})</span></a>
                        <a href="#"><i class="mdi mdi-star-outline me-2"></i>Starred</a>
                        <a href="#"><i class="mdi mdi-diamond-stone me-2"></i>Important</a>
                        <a href="#"><i class="mdi mdi-file-outline me-2"></i>Draft</a>
                        <a href="#"><i class="mdi mdi-email-check-outline me-2"></i>Sent Mail</a>
                        <a href="#"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                    </div>


                </div>
                <!-- End Left sidebar -->


                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">

                    <div class="card">
                        <div class="btn-toolbar p-3" role="toolbar">
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                        class="fa fa-inbox"></i></button>
                                <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                        class="fa fa-exclamation-circle"></i></button>
                                <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                        class="far fa-trash-alt"></i></button>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Updates</a>
                                    <a class="dropdown-item" href="#">Social</a>
                                    <a class="dropdown-item" href="#">Team Manage</a>
                                </div>
                            </div>

                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    More <i class="mdi mdi-dots-vertical ms-2"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                    <a class="dropdown-item" href="#">Add Star</a>
                                    <a class="dropdown-item" href="#">Mute</a>
                                </div>
                            </div>
                        </div>
                        <ul class="message-list">

                            @foreach ($contact_users as $contact_user)
                                   <li class={{ $contact_user->is_show == 0 ? "unread" :""}}>
                                <div class="col-mail col-mail-1">
                                    <div class="checkbox-wrapper-mail">
                                        <input type="checkbox" id="chk{{ $contact_user->id }}">
                                        <label class="form-label" for="chk{{ $contact_user->id }}" class="toggle"></label>
                                    </div>
                                    <a href="#" class="title">{{ $contact_user->cname }}</a><span class="star-toggle far fa-star"></span>
                                </div>
                                <div class="col-mail col-mail-2">
                                    <a href="#" class="subject">{{$contact_user->csubject}}  – <span class="teaser"> {{ $contact_user->cmassage }}:</span>
                                    </a>
                                    <div class="date">{{ \Carbon\Carbon::parse($contact_user['created_at'])->format('M-d') }}</div>
                                </div>
                            </li>
                            @endforeach




                        </ul>

                    </div> <!-- card -->

                    <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Product Pagination">
                                <ul class="pagination pagination-sm shadow-sm">
                                    {{ $contact_users->links() }}
                                </ul>
                            </nav>
                        </div>

                </div> <!-- end Col-9 -->

            </div>

        </div><!-- End row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Modal -->
<div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="To">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <form method="post">
                            <textarea id="elm1" name="area"></textarea>
                        </form>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
            </div>
        </div>
    </div>
</div>




@endsection
