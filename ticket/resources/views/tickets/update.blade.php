@extends('layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tickets</h1>

    </div>
    <form id="updateForm" method="post" action="/updateAdmin/{{$tickets['id']}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="summary">Summary</label>
            <input type="text" id="summary" name="summary" class="form-control {{ $errors->has('summary')?'is-invalid':'' }}" value="{{$tickets['tname']}}" />
        </div>
        @if($errors->has('summary'))
        <span class="help-block">
            <strong>
                {{ $errors->first('summary') }}
            </strong>
        </span>
        @endif
        <br>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control {{ $errors->has('description')?'is-invalid':'' }}" value="{{$tickets['summary']}}" />
        </div>
        @if($errors->has('description'))
        <span class="help-block">
            <strong>
                {{ $errors->first('description') }}
            </strong>
        </span>
        @endif
        <br>
        @include('layouts.partials._statuses', ['selectedStatus' => isset($tickets['status']) ? $tickets['status'] : null])
        <br>
        <button class=" btn btn-primary" type="submit">Update</button>
        <button class="btn btn-secondary" id="backButton">Back</button>

        <script>
            document.getElementById('backButton').addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = "/admin";
            });
        </script>
    </form>
</main>
@endsection