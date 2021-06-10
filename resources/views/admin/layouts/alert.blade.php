<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <ul class="list-unstyled">
                        {{session('success')}}
                    </ul>
                </div>
            @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            {{session('error')}}
                        </ul>
                    </div>
                @endif
        </div>
    </div>
</div>
