// Delete Tasks
$('.delTask').click(function() {
    var $this = $(this);
    $.ajax({
        type: 'GET',
        url: $this.attr('href'),

        success: function(results){
            $this.parent().parent().fadeOut('slow');
        }
    });
    return false;
});

$('.updateTask').click(function () {
    var $this =$(this);
    $.ajax({
        type: 'POST',
        url: '../php/updateTask.php',
        data: 'done = 1',

        success: function(results){
            $this.parent().fadeOut('slow');
        }
    });
    return false;
});