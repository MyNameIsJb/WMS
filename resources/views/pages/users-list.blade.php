@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <!-- Main content -->
    <div class="content pt-5">
        <div class="container-fluid">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Users List</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="btn btn-primary" href="/add-user" role="button">
                                <i class="fa-solid fa-plus"></i>
                                <span class="button-text">Add User</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/user/lists">
                            <div class="input-group mb-3 pl-2 pr-2">
                                <input type="search" class="form-control rounded" placeholder="Search" name="search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-primary">search</button>
                            </div>
                        </form>
                        @unless(count($users) == 0)
                        <div class="table-responsive" id="no-more-tables">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Birthdate</th>
                                        <th>Contact #</th>
                                        <th>Address</th>
                                        <th>Store</th>
                                        <th>LOA</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td data-title="#">{{ $user->id }}</td>
                                        <td data-title="Name">{{ $user->name }}</td>
                                        <td data-title="Email">{{ $user->email }}</td>
                                        <td data-title="Birthdate">{{ date('M j, Y', strtotime($user->birthdate)) }}
                                        </td>
                                        <td data-title="Contact #">{{ $user->contact_number }}</td>
                                        <td data-title="Address">{{ $user->address }}</td>
                                        <td data-title="Store">{{ $user->store == null ? "N/A" : $user->store }}</td>
                                        <td data-title="LOA">{{ $user->level_of_access }}</td>
                                        <td data-title="Edit">
                                            <a class="btn btn-secondary" href="/edit-user/{{ $user->id }}"
                                                role="button">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td data-title="Delete">
                                            <form action="/user/delete/{{ $user->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-row-reverse mt-3">
                            {!! $users->links() !!}
                        </div>
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
@else
<x-layout>
    <script>
        window.location = "/profile";
    </script>
</x-layout>
@endif