@csrf
<div class="form-group row">
    <label for="name" class="col-md-10 offset-1">Name</label>

    <div class="col-md-10 offset-1">

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ $teacher->user->name ?? old('name') }}" autocomplete="name" autofocus>

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
            value="{{ $teacher->user->email ?? old('email') }}" autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

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

<div class="form-group row">
    <label for="address" class="col-md-10 offset-1">Address</label>

    <div class="col-md-10 offset-1">

        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
            value="{{ $teacher->address ?? old('address') }}" autocomplete="address" autofocus>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="classes" class="col-md-10 offset-1">Classes</label>

    <div class="col-md-10 offset-1">
        <div class="d-flex flex-wrap">

            @foreach ($classes as $class)
            <div class="w-25">
                <input type="checkbox" name="classes[]" id="classes" value="{{ $class->id ?? old('classes') }}"
                    @foreach($teacher->classes as $teacherClass)
                @if ($teacherClass->id == $class->id)
                checked
                @endif
                @endforeach
                >
                <label>{{ $class->name }}</label> <br>
            </div>
            @endforeach
        </div>

        @error('classes')
        <p class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </p>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="subjects" class="col-md-10 offset-1">Subjects</label>

    <div class="col-md-10 offset-1">
        <div class="d-flex flex-wrap">
            @foreach ($subjects as $subject)
            <div class="w-50">
                <input type="checkbox" name="subjects[]" id="subjects" value="{{ $subject->id ?? old('subjects') }}"
                    @foreach($teacher->subjects as $teacherSubject)
                @if ($teacherSubject->id == $subject->id)
                checked
                @endif
                @endforeach
                >
                <label>{{ $subject->name }}</label> <br>
            </div>
            @endforeach
        </div>

        @error('subjects')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>