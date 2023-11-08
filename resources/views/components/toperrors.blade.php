@if ($errors->any())
    <div class="alert alert-danger">
        <h5><i class="icon fas fa-ban"></i> Error!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <h5><i class="icon fas fa-check"></i> Error!</h5>
        {{ session('error') }}
    </div>
@endif
