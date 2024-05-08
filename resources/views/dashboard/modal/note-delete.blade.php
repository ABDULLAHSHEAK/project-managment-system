  <!-- Modal -->
  <div class="modal fade" id="NoteDelete{{$note->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <h5>Are You Sure To Delete</h5>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a href="{{ url('dashboard/note/'.$note->id.'/delete') }}" type="button" class="btn btn-danger">Delete</a>
              </div>
          </div>
      </div>
  </div>
