<div class="alert alert-danger">
    <strong>Whoops!</strong> .<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>