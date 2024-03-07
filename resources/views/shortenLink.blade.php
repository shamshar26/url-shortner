
  @extends('layouts.app')

  @section('content')

  <div class="container">
    <div class="justify-content-center">
        <h1 class="mt-5 text-center">Linkify</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="card mt-5">
    <div class="card-body">
        <form method="post" action="{{ route('generate-shorten-link.post') }}">
            @csrf 
            <div class="input-group">
                <input type="text" name="link" class="form-control" placeholder="Enter URL">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">
                        Generate Link
                    </button>
                </div>
            </div>
            @error('link') 
            <div class="text-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </form>
    </div>
</div>


    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Orginal Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shortLinks as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                    <td><a href="{{ $row->link }}">{{ $row->link }}</a></td>
                    <td>
                        <a href="{{ route('shorten.link.edit', $row->id) }}" class="btn btn-primary">Edit</a>

                        <form method="POST" action="{{ route('shorten.link.delete', $row->id) }}" style="display: inline;" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
