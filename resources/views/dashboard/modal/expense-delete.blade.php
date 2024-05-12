  <!-- Modal -->
  <div class="modal fade" id="expenseDelete{{ $expense->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Are You Sure To Delete
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a href="{{ url('/dashboard/expense/'.$expense->id.'/delete') }}" type="button"
                      class="btn btn-danger">Delete</a>
              </div>
          </div>
      </div>
  </div>
