<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control @error('title')is-invalid @enderror" type="text" name="title"
        value="{{ old('title' , $story->title) }}">

    @error('title')
    <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" class="form-control @error('body')is-invalid @enderror" name="body"
        rows="3">{{ old('body' , $story->body) }}</textarea>

    @error('body')
    <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="type">Type</label>
    <select id="type" class="form-control @error('type')is-invalid @enderror" name="type">
        <option value="">--select--</option>
        <option value="short" {{'short'==old('type' , $story->type ) ? 'selected' : '' }}>Short
        </option>
        <option value="long" {{'long'==old('type' , $story->type ) ? 'selected' : '' }}>Long
        </option>
    </select>
    @error('type')
    <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <legend>
        <h6>Status</h6>
    </legend>
    <div class="form-check">
        <input id="yes" class="form-check-input @error('status')is-invalid @enderror" type="radio" name="status"
            value="1" {{'1'==old('status' , $story->status ) ?
        'checked' : '' }}>
        <label for="yes" class="form-check-label">Yes</label>
    </div>
    <div class="form-check">
        <input id="no" class="form-check-input @error('status')is-invalid @enderror" type="radio" name="status"
            value="0" {{'0'==old('status' , $story->status ) ?
        'checked' : '' }}>
        <label for="no" class="form-check-label">No</label>
    </div>

    @error('status')
    <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
