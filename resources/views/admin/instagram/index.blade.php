<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold mb-0">Instagram Gallery</h2>
            <a href="{{ route('admin.instagram.create') }}" class="btn btn-primary btn-sm">
                Add New Image
            </a>
        </div>
    </x-slot>

    <br>

    <div class="row g-3">
        @foreach($images as $img)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card shadow-sm border-0 overflow-hidden h-100">
                <div class="position-relative">
                    <img src="{{ asset($img->image) }}"
                        class="card-img-top img-fluid"
                        style="height:200px; object-fit:cover;">

                    <!-- Buttons on top-right -->
                    <div class="position-absolute top-0 end-0 m-2 d-flex gap-1">
                        <a href="{{ route('admin.instagram.edit', $img->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form method="POST" action="{{ route('admin.instagram.destroy', $img->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body text-center p-2">
                    <small class="text-muted">
                        Uploaded: {{ $img->created_at->format('d M Y') }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($images->isEmpty())
    <div class="text-center mt-5">
        <p class="text-muted">
            No images uploaded yet. Click "Add New Image" to start your gallery.
        </p>
    </div>
    @endif
</x-app-layout>
