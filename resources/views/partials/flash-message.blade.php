@if (session('success'))
    <div class="alert alert-success">
        <span><strong>Success!</strong> {{ session('success') }}</span>
        <button type="button" class="alert-close">&times;</button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <span><strong>Error!</strong> {{ session('error') }}</span>
        <button type="button" class="alert-close">&times;</button>
    </div>
@endif
