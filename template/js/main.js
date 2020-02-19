$('document').ready(function() {
    $('.table').DataTable({
        "order": [[0, "desc" ]]
    });

    $('body').on('click', '.edit', function() {
    $('.ajax').html($('.ajax input').val());
    $('.ajax').removeClass('ajax');
    $(this).addClass('ajax');
    $(this).parent().html('<textarea id="editbox" name="editbox" rows="3">' + $(this).parent().text() + '</textarea> <br> <button type="button" class="btn btn-success btn-sm mt-2 save">Save</button>');
    
    $('#editbox').focus();
    });

    $('body').on('click', '.save', function() {
        let idTask = $(this).closest('tr').attr('id');
        let editTask = $('#editbox').val();
        $.post(
            'edit',
            {
                'idTask': idTask,
                'editTask': editTask
            },
            function () {
                location.reload();
            }
        )
    })

    $('body').on('click', '.complete', function() {
        let idTask = $(this).closest('tr').attr('id');
        $.post(
            'complete',
            {
                'idTask': idTask
            },
            function () {
                location.reload();
            }
        )
    })
})