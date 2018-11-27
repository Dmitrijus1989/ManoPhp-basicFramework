
function ajaxLoad(action) {
    $('#loading').show();
    $.ajax({
        method: "POST",
        url: "/day11",
        data: {
            action: action
        }
    })

            .done(function (response) {
                var $pageHtml = $($.parseHTML(response));
                $('#tinder').html($pageHtml.find('#tinder'));
                $('#loading').hide();
            });
}

$(document).ready(function () {
    // Handler for .ready() called.
    ajaxLoad('load');
});

$(document).on('click', 'button.tinder', function () {
    var action = $(this).attr('data-action');
    ajaxLoad(action);
    return false;
});