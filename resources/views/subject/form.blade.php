@csrf
<div class="form-group row">
    <label for="name" class="col-md-10 offset-1">Subject Name</label>

    <div class="col-md-10 offset-1">

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ $subject->name ?? old('name') }}" autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>