<x-layout>
    <!-- Main content -->
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Profile</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/edit-profile" role="button">
                                <i class="fa-solid fa-pencil"></i>
                                <span class="button-text">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <img class="img-circle elevation-2" width="200"
                                src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/blank-profile.png') }}"
                                alt="Profile Image" />
                        </div>
                        <div class="mb-3">
                            <h3>Account Information</h3>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="name"
                                        value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" readonly class="form-control-plaintext" id="email"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthdate" class="col-sm-3 col-form-label">Birthdate</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="birthdate"
                                        value="{{ date('F j, Y', strtotime(auth()->user()->birthdate)) }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="contact-number" class="col-sm-3 col-form-label">Contact Number</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="contact-number"
                                        value="{{ auth()->user()->contact_number }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="address"
                                        value="{{ auth()->user()->address }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="branch" class="col-sm-3 col-form-label">Store</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="branch"
                                        value="{{ auth()->user()->store == null ? 'N/A' : auth()->user()->store }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="loa" class="col-sm-3 col-form-label">LOA</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="loa"
                                        value="{{ auth()->user()->level_of_access }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-layout>