@foreach ($accommodations as $accommodation)
    <div class="modal fade" id="{{$accommodation->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sicuro di voler eliminare questa accommodation? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
              <form class="d-inline-block form-delete"  action="{{ route('admin.accommodation.destroy', $accommodation->slug) }}" method="post">
                @csrf
                @method('DELETE')
                <button  type="submit"  class="btn btn-danger">
                    Cancella definitivamente
                </button>
              </form>
            </div>
        </div>
    </div>
    </div>
    @endforeach