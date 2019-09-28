@csrf
<div class="form-group row">
    <label for="name" class="col-md-10 offset-1 h5">Kritik Terhadap App Ini</label>

    <div class="col-md-10 offset-1">
        <textarea name="critism" id="" cols="30" rows="10" id="critism" autocomplete="critism"
            class="form-control @error('name') is-invalid @enderror">{{ old('critism') }}</textarea>
        @error('critism')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-10 offset-1 h5">Saran Untuk App Ini</label>

    <div class="col-md-10 offset-1">
        <textarea name="suggestion" id="" cols="30" rows="10" id="suggestion" autocomplete="suggestion"
            class="form-control @error('name') is-invalid @enderror">{{ old('suggestion') }}</textarea>
        @error('suggestion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>