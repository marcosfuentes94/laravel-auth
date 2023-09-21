@if ($project->exists)
    {{-- I am in an editing form --}}
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" novalidate>

        @method('PUT')
    @else
        {{-- I am in a creationform --}}
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" novalidate>
@endif
@csrf
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <label for="title" class="form-label">Tiitle</label>
            <input type="text"
                class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                id="title" name="title" value="{{ old('title', $project->title) }}" placeholder="Insert title"
                required>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea class="form-control  @error('description') is-invalid @elseif(old('description')) is-valid @enderror"
                id="description" name="description" rows="10">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="url" class="form-label">Project Link</label>
            <input type="url"
                class="form-control @error('url') is-invalid @elseif(old('url')) is-valid @enderror"
                id="url" name="url" value="{{ $project->url }}">
            @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-11">
        <div class="mb-3">
            <label for="image" class="form-label">Cover Image</label>
            <input type="file"
                class="form-control @error('image') is-invalid @elseif(old('image')) is-valid @enderror"
                id="image" name="image" placeholder="Enter a valid url">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-1">
        <img src="{{ $project->image ? $project->getImagePath() : 'https://marcolanci.it/utils/placeholder.jpg' }}"
            alt="Preview" class="img-fluid" id="image-preview">
    </div>
</div>
<hr>
<div class="d-flex justify-content-end mt-4">
    <button class="btn btn-success">
        <i class="fas fa-floppy-disk me-2"></i>Save
    </button>

</div>
</form>
