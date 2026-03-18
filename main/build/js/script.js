function show_universal_modal($title, $link, $size = '') {
    // Checking if link is empty then return false
    if ($link == '') {
        alert("Content Link is null");
        return false;
    }
    $('#universal_modal').find('.modal-dialog').removeClass('modal-sm')
    $('#universal_modal').find('.modal-dialog').removeClass('modal-lg')
    $('#universal_modal').find('.modal-dialog').removeClass('modal-xl')
    $('#universal_modal').find('.modal-dialog').addClass($size)
    $('#universal_modal').find('.modal-body').html("<center>Loading data. Please wait ...</center>")
    $('#universal_modal').find('.modal-title').html($title)
    $('#universal_modal').modal('show')
 
    // Fetching content via Ajax
    $.ajax({
        url: $link,
        error: err => {
            console.log(err)
            $('#universal_modal').find('.modal-body').html("<div class='alert alert-danger'>Error fetching content.</div>")
        },
        success: function(resp) {
            var container = $('<div class="container-fluid">')
            container.html(resp)
            $('#universal_modal').find('.modal-body').html(container)
        }
    })
 
 
}
 
$(function() {
    // Modal button click action
    $('.modal-button').click(function(e) {
        e.preventDefault()
        var size = $(this).attr('data-modal-size') !== undefined ? $(this).attr('data-modal-size') : '';
        show_universal_modal($(this).attr('data-title'), $(this).attr('href'), size)
    })
 
})