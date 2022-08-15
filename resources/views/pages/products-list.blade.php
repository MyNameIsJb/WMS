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
                            <h5 class="m-0">Products List</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/add-product" role="button">
                                <i class="fa-solid fa-plus"></i>
                                <span class="button-text">Add Product</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/product/lists">
                            <div class="input-group mb-3 pl-2 pr-2">
                                <input type="search" class="form-control rounded" placeholder="Search" name="search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-primary">search</button>
                            </div>
                        </form>
                        @unless(count($products) == 0)
                        <div class="table-responsive" id="no-more-tables">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Product ID</th>
                                        <th>Brand Name</th>
                                        <th>Item Description</th>
                                        <th>Model</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Price Per Unit</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td data-title="#">{{ $product->id }}</td>
                                        <td data-title="Product ID">{{ $product->product_id }}</td>
                                        <td data-title="Brand Name">{{ $product->brand_name }}</td>
                                        <td data-title="Item Description">{{ $product->item_description }}</td>
                                        <td data-title="Model">{{ $product->model }}</td>
                                        <td data-title="Color">{{ $product->color }}</td>
                                        <td data-title="Quantity">{{ $product->quantity }}</td>
                                        <td data-title="Price Per Unit">{{ $product->price_per_unit }}</td>
                                        <td data-title="Edit"><a class="btn btn-secondary"
                                                href="/edit-product/{{ $product->id }}" role="button">
                                                <i class="fa-solid fa-pencil"></i></i>
                                            </a></td>
                                        <td data-title="Delete">
                                            <form action="/product/delete/{{ $product->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" id="product_id"
                                                    value="{{ $product->id }}">
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
                            {!! $products->links() !!}
                        </div>
                        @else
                        <p>No products found</p>
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