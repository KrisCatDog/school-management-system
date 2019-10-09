@csrf
<div class="form-group row">
    <label for="name" class="col-md-10 offset-1">Name</label>

    <div class="col-md-10 offset-1">

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ $student->user->name ?? old('name') }}" autocomplete="name" autofocus>

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
            value="{{ $student->user->email ?? old('email') }}" autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@if (url()->current() == url('students/create'))

<div class="form-group row">
    <label for="password" class="col-md-10 offset-1">{{ __('Password') }}</label>

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
    <label for="password_confirmation" class="col-md-10 offset-1">Confirm Password</label>

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
@endif

<div class="form-group row">
    <label for="address" class="col-md-10 offset-1">Address</label>

    <div class="col-md-10 offset-1">

        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
            value="{{ $student->address ?? old('address') }}" autocomplete="address" autofocus>

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
            <option value="{{ $class->id }}" autocomplete="class_id" @if ($student->class_id == $class->id)
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