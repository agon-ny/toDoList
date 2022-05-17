$(document).ready(function(){

    $('#addToListForm').submit(function(e){
        toDo = $("input[name=toDo]").val();
        action = "addToList";
        $.ajax({
            url: 'ajax/realTime.php',
            method: 'post',
            dataType: 'json',
            data: {'toDo':toDo,'action':action},
            success: function(response){
                console.log(response);
            }
        });
        e.preventDefault();
    });

});