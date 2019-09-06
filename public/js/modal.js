$("[id^='modal_edit']").on('click', function(event){
    console.log(event);
    title = $(this).attr('title');
    openModal(2, title);
    return false;
});
function openModal(id, title){
    var modal_content = `
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Editing ${title}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
            <form action="{{ route('admin/category/edit/${id}) }}>
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    `
    $('.modal-edit').append(modal_content);
    $('#modal-edit').modal('show');
    $('.modal-edit').on('hidden.bs.modal', function () {
        $('.modal-edit').empty();
      })
}