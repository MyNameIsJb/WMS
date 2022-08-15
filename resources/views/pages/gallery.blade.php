<x-layout>
    <!-- Main content -->
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Gallery</h5>
                        </div>
                        @if (auth()->user()->level_of_access == 'Administrator')
                        <div class="col-6 d-flex justify-content-end">
                            <a class="btn btn-primary" href="/add-image" role="button">
                                <i class="fa-solid fa-file-import"></i>
                                <span class="button-text">Upload Image</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    @unless(count($galleries) == 0)
                    <div class="card-body">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($galleries as $gallery)
                                @if ($loop->first)
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="{{ asset('storage/' . $gallery->gallery_image) }}" class="d-block w-100"
                                        alt="...">
                                    <div class="bg-transparent text-center">
                                        <h1>{{ $gallery->brand_name }}</h1>
                                        <p class="m-0">{{ $gallery->item_description }}</p>
                                        <p>{{ $gallery->price_per_unit }}</p>
                                    </div>
                                    @if (auth()->user()->level_of_access == 'Administrator')
                                    <div class="col-12 d-flex justify-content-center">
                                        <a class="mr-3 btn btn-secondary" href="/edit-gallery/{{ $gallery->id }}"
                                            role="button">
                                            <i class="fa-solid fa-pencil"></i>
                                            <span class="button-text">Edit</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            <span class="button-text">Delete</span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                @else
                                <div class="carousel-item" data-bs-interval="10000">
                                    <img src="{{ asset('storage/' . $gallery->gallery_image) }}" class="d-block w-100"
                                        alt="...">
                                    <div class="bg-transparent text-center">
                                        <h1>{{ $gallery->brand_name }}</h1>
                                        <p class="m-0">{{ $gallery->item_description }}</p>
                                        <p>{{ $gallery->price_per_unit }}</p>
                                    </div>
                                    @if (auth()->user()->level_of_access == 'Administrator')
                                    <div class="col-12 d-flex justify-content-center">
                                        <a class="mr-3 btn btn-secondary" href="/edit-gallery/{{ $gallery->id }}"
                                            role="button">
                                            <i class="fa-solid fa-pencil"></i>
                                            <span class="button-text">Edit</span>
                                        </a>
                                        <form action="/gallery/delete/{{ $gallery->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                                <span class="button-text">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @endforeach
                                @endunless
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-layout>