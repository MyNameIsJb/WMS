@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Upload Image</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/gallery" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/gallery/add" novalidate autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <select id="brand_name" class="form-select" name="brand_name"
                                    value="{{ old('brand_name') }}">
                                    <option value="" disabled selected>Select brand name</option>
                                    <option value="Panasonic" @if (old('brand_name')=="Panasonic" ) {{ 'selected' }}
                                        @endif>Panasonic</option>
                                    <option value="Samsung" @if (old('brand_name')=="Samsung" ) {{ 'selected' }} @endif>
                                        Samsung</option>
                                    <option value="TLC" @if (old('brand_name')=="TLC" ) {{ 'selected' }} @endif>TLC
                                    </option>
                                    <option value="Union" @if (old('brand_name')=="Union" ) {{ 'selected' }} @endif>
                                        Union</option>
                                    <option value="Sharp" @if (old('brand_name')=="Sharp" ) {{ 'selected' }} @endif>
                                        Sharp</option>
                                    <option value="Hanabishi" @if (old('brand_name')=="Hanabishi" ) {{ 'selected' }}
                                        @endif>Hanabishi</option>
                                    <option value="Whirlpool" @if (old('brand_name')=="Whirlpool" ) {{ 'selected' }}
                                        @endif>Whirlpool</option>
                                    <option value="Amana" @if (old('brand_name')=="Amana" ) {{ 'selected' }} @endif>
                                        Amana</option>
                                    <option value="LG" @if (old('brand_name')=="LG" ) {{ 'selected' }} @endif>LG
                                    </option>
                                </select>

                                @error('brand_name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="item_description" class="form-control"
                                    placeholder="Item Description" value="{{ old('item_description') }}">

                                @error('item_description')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="price_per_unit" class="form-control"
                                    placeholder="Price Per Unit" value="{{ old('price_per_unit') }}">

                                @error('price_per_unit')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gallery_image" class="col-sm-3 col-form-label">Gallery Image</label>
                                <input class="form-control" type="file" id="gallery_image" name="gallery_image"
                                    value="{{ old('gallery_image') }}">

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