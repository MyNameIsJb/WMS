<x-layout>
    <!-- Main content -->
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Search Profile</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        @unless(count($users) == 0)
                        @foreach ($users as $user)
                        <div class="mb-3 text-center">
                            <img class="img-circle elevation-2" width="200"
                                src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/blank-profile.png') }}"
                                alt="Profile Image" />
                        </div>
                        <div class="mb-3">
                            <h3>Account Information</h3>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="name"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" readonly class="form-control-plaintext" id="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthdate" class="col-sm-3 col-form-label">Birthdate</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="birthdate"
                                        value="{{ date('F j, Y', strtotime($user->birthdate)) }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="contact-number" class="col-sm-3 col-form-label">Contact Number</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="contact-number"
                                        value="{{ $user->contact_number }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="address"
                                        value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="branch" class="col-sm-3 col-form-label">Store</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="branch"
                                        value="{{ $user->store == null ? 'N/A' : $user->store }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="loa" class="col-sm-3 col-form-label">LOA</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="loa"
                                        value="{{ $user->level_of_access }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No users found</p>
                        @endunless
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-layout>