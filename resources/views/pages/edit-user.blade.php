@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Edit User</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/user/lists" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/user/update/{{ $user->id }}" novalidate autocomplete="off">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="hidden" name="id" id="user_id" value="{{ $user->id }}">
                                <select id="levelOfAccess" class="form-select" name="level_of_access"
                                    value="{{ $user->level_of_access }}" onchange="ShowHideDiv()">
                                    <option value="" disabled>Select level of access</option>
                                    <option value="Administrator" {{$user->level_of_access == 'Administrator' ?
                                        'selected' : ''
                                        }}>Administrator</option>
                                    <option value="Staff" {{$user->level_of_access == 'Staff' ? 'selected' : ''
                                        }}>Staff</option>
                                    <option value="Store" {{$user->level_of_access == 'Store' ? 'selected' : ''
                                        }}>Store</option>
                                </select>

                                @error('level_of_access')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="store" class="form-control"
                                    placeholder="Name of Store(optional)" value="{{ $user->store }}">

                                @error('store')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ $user->name }}">

                                @error('name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $user->email }}">

                                @error('email')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="contact_number" class="form-control"
                                    placeholder="Contact Number" value="{{ $user->contact_number }}">

                                @error('contact_number')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                    value="{{ $user->address }}">

                                @error('address')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <p class="m-0">Birthdate</p>
                                <input type="date" name="birthdate" class="form-control" value="{{ $user->birthdate }}">

                                @error('birthdate')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-check"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div><!-- /.container-fluid -->
</x-layout>
@else
<x-layout>
    <script>
        window.location = "/profile";
    </script>
</x-layout>
@endif