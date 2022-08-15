@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Edit Product</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/product/lists" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/product/update/{{ $product->id }}" novalidate autocomplete="off">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="text" name="product_id" class="form-control" placeholder="Product ID"
                                    value="{{ $product->product_id }}">

                                @error('product_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select id="brand_name" class="form-select" name="brand_name"
                                    value="{{ $product->brand_name }}">
                                    <option value="" disabled selected>Select brand name</option>
                                    <option value="Panasonic" {{$product->brand_name == 'Panasonic' ? 'selected' : ''
                                        }}>Panasonic</option>
                                    <option value="Samsung" {{$product->brand_name == 'Samsung' ? 'selected' : ''
                                        }}>Samsung</option>
                                    <option value="TLC" {{$product->brand_name == 'TLC' ? 'selected' : ''
                                        }}>TLC</option>
                                    <option value="Union" {{$product->brand_name == 'Union' ? 'selected' : ''
                                        }}>Union</option>
                                    <option value="Sharp" {{$product->brand_name == 'Sharp' ? 'selected' : ''
                                        }}>Sharp</option>
                                    <option value="Hanabishi" {{$product->brand_name == 'Hanabishi' ? 'selected' : ''
                                        }}>Hanabishi</option>
                                    <option value="Whirlpool" {{$product->brand_name == 'Whirlpool' ? 'selected' : ''
                                        }}>Whirlpool</option>
                                    <option value="Amana" {{$product->brand_name == 'Amana' ? 'selected' : ''
                                        }}>Amana</option>
                                    <option value="LG" {{$product->brand_name == 'LG' ? 'selected' : ''
                                        }}>LG</option>
                                </select>

                                @error('brand_name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="item_description" class="form-control"
                                    placeholder="Item Description" value="{{ $product->item_description }}">

                                @error('item_description')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="model" class="form-control" placeholder="Model"
                                    value="{{ $product->model }}">

                                @error('model')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select id="color" class="form-select" name="color" value="{{ $product->color }}">
                                    <option value="" disabled selected>Select color</option>
                                    <option value="White" {{$product->color == 'White' ? 'selected' : ''
                                        }}>White</option>
                                    <option value="Black" {{$product->color == 'Black' ? 'selected' : ''
                                        }}>Black</option>
                                    <option value="Gray" {{$product->color == 'Gray' ? 'selected' : ''
                                        }}>Gray</option>
                                    <option value="Pink" {{$product->color == 'Pink' ? 'selected' : ''
                                        }}>Pink</option>
                                    <option value="Green" {{$product->color == 'Green' ? 'selected' : ''
                                        }}>Green</option>
                                    <option value="Yellow" {{$product->color == 'Yellow' ? 'selected' : ''
                                        }}>Yellow</option>
                                    <option value="Blue" {{$product->color == 'Blue' ? 'selected' : ''
                                        }}>Blue</option>
                                    <option value="Gold" {{$product->color == 'Gold' ? 'selected' : ''
                                        }}>Gold</option>
                                    <option value="Silver" {{$product->color == 'Silver' ? 'selected' : ''
                                        }}>Silver</option>
                                </select>

                                @error('color')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity"
                                    value="{{ $product->quantity }}">

                                @error('quantity')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="price_per_unit" class="form-control"
                                    placeholder="Price Per Unit" value="{{ $product->price_per_unit }}">

                                @error('price_per_unit')
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

    <script type="text/javascript">
        function ShowHideDiv() {
            var levelOfAccess = document.getElementById("levelOfAccess");
            var store = document.getElementById("store");
            store.style.display = levelOfAccess.value == "Store" ? "block" : "none";
        }
    </script>
</x-layout>
@else
<x-layout>
    <script>
        window.location = "/profile";
    </script>
</x-layout>
@endif