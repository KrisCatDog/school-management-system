<div class="form-group row">
    <label for="name" class="col-md-10 offset-1">Name</label>

    <div class="col-md-10 offset-1">

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ $user->name ?? old('name') }}" autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-10 offset-1">Email</label>

    <div class="col-md-10 offset-1">

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ $user->email ?? old('email') }}" autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-10 offset-1">Password <i class="text-success">(Optional)</i>
    </label>

    <div class="col-md-10 offset-1">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password_confirmation" class="col-md-10 offset-1">Confirm Password <i
            class="text-success">(Optional)</i></label>

    <div class="col-md-10 offset-1">
        <input id="password_confirmation" type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
            autocomplete="current-password_confirmation">

        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-md-10 offset-1">Address</label>

    <div class="col-md-10 offset-1">

        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
            value="{{ $user->student->address ?? old('address') }}" autocomplete="address" autofocus>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="class_id" class="col-md-10 offset-1">Class</label>

    <div class="col-md-10 offset-1">
        <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror">
            @foreach ($classes as $class)
            <option value="{{ $class->id }}" autocomplete="class_id" @if ($user->student->class_id ==
                $class->id)
                selected
                @endif >{{ $class->name }}</option>
            @endforeach
        </select>

        @error('class_id')
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="photo" class="col-md-10 offset-1">Photo <i class="text-success">(Optional)</i></label>

    <div class="col-md-10 offset-1 mb-1">
        <img src="{{ $user->student->photo }}" width="300">
    </div>

    <div class="col-md-10 offset-1">
        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
            value="{{ old('photo') }}" autocomplete="photo" autofocus>

        @error('photo')
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="phone_number" class="col-md-10 offset-1">Phone Number</label>

    <div class="col-md-10 offset-1">

        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
            name="phone_number" value="{{ $user->student->phone_number ?? old('phone_number') }}"
            autocomplete="phone_number" autofocus>

        @error('phone_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="instagram_username" class="col-md-10 offset-1">Instagram Username</label>

    <div class="col-md-10 offset-1">
        <input id="instagram_username" type="text"
            class="form-control @error('instagram_username') is-invalid @enderror" name="instagram_username"
            value="{{ $user->student->instagram_username ?? old('instagram_username') }}"
            autocomplete="instagram_username" autofocus>

        @error('instagram_username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>