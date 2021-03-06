

<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
	<form method="post" action="/edit">
		@csrf
        <input type="hidden" id="rangeStart" name="range_start" required />
        <input type="hidden" id="rangeEnd" name="range_end" required />
        <input type="hidden" id="rowIndex" name="row_index" required />
        <div class="modal-header p-0">
            <h5 class="modal-title p-0 m-2">Edit Data</h5>
         </div>
      <div class="modal-body">
            <div class="mb-1 row">
				<label class="col-3 form-label">No</label>
				<div class="col-9">
                	<input class="form-control" id="no" name="no" type="number" maxlength="4" required readonly/>
				</div>
            </div>
			<div class="mb-1 row">
				<label class="col-3 form-label">First Name</label>
				<div class="col-9">
                	<input class="form-control" id="firstname" name="firstname" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Last Name</label>
				<div class="col-9">
                	<input class="form-control" id="lastname" name="lastname" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Email</label>
				<div class="col-9">
                	<input class="form-control" id="email" name="email" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Gender</label>
				<div class="col-9">
                <select class="custom-select" name="gender" id="gender">
                  <option selected disabled>Pilih Jenis Kelamin</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Genderqueer">Genderqueer</option>
                  <option value="Agender">Agender</option>
                  <option value="Genderfluid">Genderfluid</option>
                  <option value="Polygender">Polygender</option>
                  <option value="Non-binary">Non-binary</option>
                </select>
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Ip Address</label>
				<div class="col-9">
                	<input class="form-control" id="ip" name="ip"  type="text" />
				</div>
            </div>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Update</button>
      </div>
	</form>
    </div>
  </div>
</div>


<script>
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var no = button.data('no');
  var firstname = button.data('firstname');
  var lastname = button.data('lastname');
  var email = button.data('email');
  var gender = button.data('gender');
  var ip = button.data('ip');
  var rangeStart = button.data('range_start');
  var rangeEnd = button.data('range_end');
  var rowIndex = button.data('row_index');
  $('#no').val(no);
  $('#firstname').val(firstname);
  $('#lastname').val(lastname);
  $('#email').val(email);
  $('#gender').val(gender);
  $('#ip').val(ip);
  $('#rangeStart').val(rangeStart);
  $('#rangeEnd').val(rangeEnd);
  $('#rowIndex').val(rowIndex);
})
</script>