$('#deleteUserModal').on('show.bs.modal', function(event){
    var button =$(event.relatedTarget);
    var userId = button.data('id');
    var modal = $(this);
    modal.find('#confirmDeleteUser').attr('href', '/user.delete/'+userId);
});

$('#deleteClientModal').on('show.bs.modal', function(event){
    var button =$(event.relatedTarget);
    var userId = button.data('id');
    var modal = $(this);
    modal.find('#confirmDeleteClient').attr('href', '/client.delete/'+userId);
});
