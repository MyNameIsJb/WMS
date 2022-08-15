@if (auth()->user()->level_of_access == 'Administrator')
<x-layout>
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Order Product</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/incoming-product" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/incoming-product/create" novalidate autocomplete="off">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <select id="staff" class="form-select" name="staff" value="{{ old('staff') }}">
                                    <option value="" disabled selected>Select staff</option>
                                    @unless(count($users) == 0)
                                    @foreach ($users as $user)
                                    @if($user->level_of_access == 'Staff')
                                    <option value="{{ $user->name }}" @if (old('staff')=="{{ $user->name }}" )
                                        {{ 'selected' }} @endif>{{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <p>No staff found</p>
                                    @endunless
                                </select>

                                @error('staff')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
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
                                <input type="text" name="model" class="form-control" placeholder="Model"
                                    value="{{ old('model') }}">

                                @error('model')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select id="color" class="form-select" name="color" value="{{ old('color') }}">
                                    <option value="" disabled selected>Select color</option>
                                    <option value="White" @if (old('color')=="White" ) {{ 'selected' }} @endif>White
                                    </option>
                                    <option value="Black" @if (old('color')=="Black" ) {{ 'selected' }} @endif>Black
                                    </option>
                                    <option value="Gray" @if (old('color')=="Gray" ) {{ 'selected' }} @endif>Gray
                                    </option>
                                    <option value="Pink" @if (old('color')=="Pink" ) {{ 'selected' }} @endif>Pink
                                    </option>
                                    <option value="Green" @if (old('color')=="Green" ) {{ 'selected' }} @endif>Green
                                    </option>
                                    <option value="Yellow" @if (old('color')=="Yellow" ) {{ 'selected' }} @endif>Yellow
                                    </option>
                                    <option value="Blue" @if (old('color')=="Blue" ) {{ 'selected' }} @endif>Blue
                                    </option>
                                    <option value="Gold" @if (old('color')=="Gold" ) {{ 'selected' }} @endif>Gold
                                    </option>
                                    <option value="Silver" @if (old('color')=="Silver" ) {{ 'selected' }} @endif>Silver
                                    </option>
                                </select>

                                @error('color')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity"
                                    value="{{ old('quantity') }}">

                                @error('quantity')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="price" class="form-control" placeholder="Price"
                                    value="{{ old('price') }}">

                                @error('price')
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