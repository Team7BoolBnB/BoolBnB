<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Address</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accommodations as $sponsorship)
            <tr>
                <th scope="row">{{ $sponsorship->title }}</th>
                <td>{{ $sponsorship->address }}</td>
                <td>{{ $sponsorship->description }}</td>
                <td>
                    <a href="{{ route('admin.accommodation.show', $sponsorship->slug) }}" class="btn btn-secondary py-0 px-1">
                        <i class="fa-solid fa-eye fa-xs"></i>
                    </a>
                    <a href="{{ route('admin.accommodation.edit', $sponsorship->slug) }}" class="btn btn-primary py-0 px-1">
                        <i class="fa-solid fa-pencil fa-xs"></i>
                    </a>
                    {{-- <form action="{{ route('admin.accommodation.destroy', $accommodation->id) }}" method="POST"
                        class="form-delete d-inline">
                        @csrf
                        @method('DELETE')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Sponsorships</h2>
        </div>
    </div>

    <div class="container pt-5">
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.sponsorship.create') }}" class="btn btn-secondary py-0 px-1">
                <i class="fa-solid fa-eye fa-xs"></i>
                Aggiungi
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Accommodation title</th>
                    <th scope="col">Accommodation Address</th>
                    <th scope="col">Type</th>
                    <th scope="col">Period</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Ends on</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($accommodations as $accommodation)
                    @foreach ($accommodation->sponsorship as $sponsorship)
                        <tr>
                            <td scope="col">{{ $accommodation->title }}</td>
                            <td scope="col">{{ $accommodation->address }}</td>
                            <td scope="col">{{ $sponsorship->name }}</td>
                            <td scope="col">{{ $sponsorship->period }}</td>
                            <td scope="col">{{ $sponsorship->price }}</td>
                            <td scope="col">{{ $sponsorship->created_at }}</td>
                            {{-- <td scope="col">{{ $sponsorship->endTime }}</td> --}}
                        </tr>
                    @endforeach
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
                        <button type="submit" class="btn btn-danger py-0 px-1">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
