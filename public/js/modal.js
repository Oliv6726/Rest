$('#model_edit').click(function(event){
    openModal(2);
    return false;
});
function openModal(id){
    var modal_content = `
    <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    `
    $('.modal-edit').append(modal_content);
    $('.modal').modal('show');
    $('.modal').on('hidden.bs.modal', function () {
        $('.modal-edit').html('');
      })
}