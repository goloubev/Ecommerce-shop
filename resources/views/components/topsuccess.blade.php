@if (session()->has('success'))
    <div class="alert alert-success">
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('success') }}
    </div>
@endif
