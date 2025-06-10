document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('sidebarToggle');
  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      document.getElementById('wrapper').classList.toggle('toggled');
    });
  }

  if (window.jQuery && $('#usersTable').length) {
    $('#usersTable').DataTable({
      language: { url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' }
    });

    const userModal = new bootstrap.Modal(document.getElementById('userModal'));

    $('#addUserBtn').on('click', function () {
      $('#userModalLabel').text('Nuevo usuario');
      $('#user-id').val('');
      $('#user-action').val('add');
      $('#user-name').val('');
      $('#user-email').val('');
      $('#user-password').val('');
      userModal.show();
    });

    $('.edit-btn').on('click', function () {
      $('#userModalLabel').text('Editar usuario');
      $('#user-id').val($(this).data('id'));
      $('#user-action').val('edit');
      $('#user-name').val($(this).data('name'));
      $('#user-email').val($(this).data('email'));
      $('#user-password').val('');
      userModal.show();
    });
  }
});
