<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold mb-0">Add Instagram Images</h2>
            <br>
            <a href="{{ route('admin.instagram.index') }}" class="btn btn-secondary btn-sm">Back to Gallery</a>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Upload a New Images</h5>
                        <br>
                        <br>

                        <form method="POST" action="{{ route('admin.instagram.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Select Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
<br>
<br>
                            <button type="submit" class="btn btn-success w-100">Save Image</button>
                        </form>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
