File per salvare pezzi di codici fatti per debug
Da eliminare quando tutto funzionerà (cioè mai)


SCSS META (in caso durante il merge si perda)
.available_info {
    padding: 0.5rem;
    border: 1px solid $primaryColor;
    border-radius: 0.50rem;
    z-index: 2;
    background: white;
    position: absolute;
    top: 5%;
    right: 5%;
    backdrop-filter: blur(30px);

    span {
        color: $primaryColor;
    }
}

.accommodation_info {
    padding: 1rem;
    /* border: 1px solid $primaryColor; */
    z-index: 2;
    position: absolute;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: end;
    border-radius: 1rem;
    background-image: linear-gradient(359deg, rgb(6 0 1) 0%, rgb(217 9 99 / 0%) 100%);

    div {
        color: white;
        /* font-size: 1rem; */
    }
}

.card_admin {
    justify-content: center;
    align-items: center!important;
    height: 280px;
	width: 100%;
    border-radius: 1rem;
    padding: 1.5rem;
	background: white;
    position: relative;
    display: flex;
    align-items: flex-end;
    /* box-shadow: 0px 7px 10px rgba(black, 0.5); */

    &:hover{
        &:before{
            opacity: 1;
        }
        .links_card_admin {
            opacity: 1;
            transform: translateY(0px);
        }
        .available_info, .accommodation_info{
            display: none;
        }
    }
    
    &:before{
        content: "";
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		height: 100%;
		border-radius: 15px;
		background: rgba(black, 0.7);
		z-index: 2;
		transition: 0.5s;
		opacity: 0;
    }

    img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
        z-index: 1;
    }

    .links_card_admin {
        position: relative;
		z-index: 3;
		color: white;
		opacity: 0;
		transform: translateY(30px);
		transition: 0.5s;

        a {
            padding: 0.6rem;
			outline: none;
			border: none;
			border-radius: 3px;
			/* background: white; */
			color: white;
			font-weight: bold;
			cursor: pointer;
			transition: 0.4s ease;

            svg {
                height: 1.5rem;
                width: 1.5rem;
            }

			&:hover {
				/* background: $primaryColor; */
				color: $primaryColor;
            }
        }
    }
}


.card_link{
    background-image: linear-gradient(135deg, rgba(255,56,92,1) 0%, rgba(217,9,99,1) 100%);
    height: 280px;
    display: flex;
    justify-content: center;
    align-items: center!important;
    border-radius: 1rem;
    padding: 1rem;
    /* box-shadow: 0px 7px 10px rgba(black, 0.5); */
    text-decoration: none;
    color: white;

    &:hover{
        text-decoration: none;
        color: white;
        cursor: pointer;
    }
}

TABLE DELL'INDEX ACCOMMODATION
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
                        <a href="{{ route('admin.accommodation.show', $sponsorship->id) }}" class="btn btn-secondary py-0 px-1">
                            <i class="fa-solid fa-eye fa-xs"></i>
                        </a>
                        <a href="{{ route('admin.accommodation.edit', $sponsorship->id) }}" class="btn btn-primary py-0 px-1">
                            <i class="fa-solid fa-pencil fa-xs"></i>
                        </a>
                        {{-- <form action="{{ route('admin.accommodation.destroy', $accommodation->id) }}" method="POST"
                            class="form-delete d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger py-0 px-1">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


TABLE INDEX SPONSORSHIPS
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
                            <td scope="col">{{ $sponsorship->endTime }}</td>
                        </tr>
                    @endforeach
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>