$(document).ready(function() {
    $('.myForm').on('submit',function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url:"../php/addTask.php",
            type:'POST',
            data:data
        }).done({
            'add':$('.todo').append('<li class="list-group-item item">'+$("#addtask").val()+'<button type="button" name="del" class="btn btn-danger btn-xs pull-right margin-left delTask"><i class="fa fa-trash-o"></i></button><button type="button" name="del" class="btn btn-success btn-xs pull-right updateTask margin-left"><i class="fa fa-check"></i></button><div class="pull-right">Prioridade:</div></li>')
        })


    });

    $('.delTask').on('click',function (e) {
        e.preventDefault();
        var id = $(this).parent().attr('id');
        $.ajax({
            url:"../php/delTask.php",
            type:"GET",
            data:{'id':id}
        }).done({
            'done':$(this).parent().hide()
        })
    });

    $('.updateTask').on('click',function (e) {
        e.preventDefault();
        var id = $(this).parent().attr('id');
        var done=$(this).parent().attr('done');
        console.log(done);

        $.ajax({
            url:"../php/updateTask.php",
            type:"GET",
            data:{'id':id,'done':done}
        }).done({

        })
    });

});