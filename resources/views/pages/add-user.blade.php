@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Add User</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/user/lists" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/user/create" novalidate autocomplete="off">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <select id="levelOfAccess" class="form-select" name="level_of_access"
                                    value="{{ old('level_of_access') }}" onchange="ShowHideDiv()">
                                    <option value="" disabled selected>Select level of access</option>
                                    <option value="Administrator" @if (old('level_of_access')=="Administrator" )
                                        {{ 'selected' }} @endif>Administrator</option>
                                    <option value="Staff" @if (old('level_of_access')=="Staff" ) {{ 'selected' }}
                                        @endif>Staff</option>
                                    <option value="Store" @if (old('level_of_access')=="Store" ) {{ 'selected' }}
                                        @endif>Store</option>
                                </select>

                                @error('level_of_access')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="store" class="form-control"
                                    placeholder="Name of Store(Optional)" value="{{ old('store') }}">

                                @error('store')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ old('name') }}">

                                @error('name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">

                                @error('email')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="contact_number" class="form-control"
                                    placeholder="Contact Number" value="{{ old('contact_number') }}">

                                @error('contact_number')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                    value="{{ old('address') }}">

                                @error('address')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <p class="m-0">Birthdate</p>
                                <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}">

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