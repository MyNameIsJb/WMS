@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Edit Image</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/gallery" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/gallery/update/{{ $gallery->id }}" novalidate autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <select id="brand_name" class="form-select" name="brand_name"
                                    value="{{ $gallery->brand_name }}">
                                    <option value="" disabled>Select brand name</option>
                                    <option value="Panasonic" {{$gallery->brand_name == 'Panasonic' ? 'selected' : ''
                                        }}>Panasonic</option>
                                    <option value="Samsung" {{$gallery->brand_name == 'Samsung' ? 'selected' : ''
                                        }}>Samsung</option>
                                    <option value="TLC" {{$gallery->brand_name == 'TLC' ? 'selected' : ''
                                        }}>TLC</option>
                                    <option value="Union" {{$gallery->brand_name == 'Union' ? 'selected' : ''
                                        }}>Union</option>
                                    <option value="Sharp" {{$gallery->brand_name == 'Sharp' ? 'selected' : ''
                                        }}>Sharp</option>
                                    <option value="Hanabishi" {{$gallery->brand_name == 'Hanabishi' ? 'selected' : ''
                                        }}>Hanabishi</option>
                                    <option value="Whirlpool" {{$gallery->brand_name == 'Whirlpool' ? 'selected' : ''
                                        }}>Whirlpool</option>
                                    <option value="Amana" {{$gallery->brand_name == 'Amana' ? 'selected' : ''
                                        }}>Amana</option>
                                    <option value="LG" {{$gallery->brand_name == 'LG' ? 'selected' : ''
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
                                    placeholder="Item Description" value="{{ $gallery->item_description }}">

                                @error('item_description')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="price_per_unit" class="form-control"
                                    placeholder="Price Per Unit" value="{{ $gallery->price_per_unit }}">

                                @error('price_per_unit')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gallery_image" class="col-sm-3 col-form-label">Gallery Image</label>
                                <input class="form-control" type="file" id="gallery_image" name="gallery_image"
                                    value="{{ asset('storage/' . $gallery->gallery_image) }}">

                                @error('gallery_image')
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