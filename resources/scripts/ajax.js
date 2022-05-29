$(document).ready(function(){
    
    $('#addToListForm').submit(function(e){
        toDo = $("input[name=toDo]").val();
        $.ajax({
            url: 'ajax/add.php',
            method: 'post',
            dataType: 'json',
            data: {'toDo':toDo},
            success: function(response){
                console.log(response.case);
                if (response.case == 'success') {
                    $("input[name=toDo]").val('');
                    $(".emptyCheck").remove();
                    //alert("A task wass successfully added!");
                    $(".list").append(
                        "<div taskId="+response.taskId+" class='task'><span>"+response.task+"</span><button class='markAsDone'>Mark as Done!</button><button class='delete'>Delete task</button></div>");
                }
            }
        });
        e.preventDefault();
    });

    $(".list").on("click", ".delete", function() {
        taskId = $(this).parent().attr('taskId');
        task = $(this).parent();
        $.ajax({
            url: 'ajax/remove.php',
            method: 'post',
            dataType: 'json',
            data: {'taskId':taskId},
            success: function(response){
                console.log(response.case);
                if (response.case == 'success') {
                    $(task).remove();
                    //alert('task deleted!');
                }
            }
        });
    });

    $('.list').on('click', ".markAsDone", function (){
        taskId = $(this).parent().attr('taskId');
        task = $(this).parent();
        $.ajax({
            url: 'ajax/completed.php',
            method: 'post',
            dataType: 'json',
            data: {'taskId':taskId},
            success: function(response){
                console.log(response.case);
                if (response.case == 'success') {
                    $(task).remove();
                    $(".emptyCheck").remove();
                    $('.completedList').append(
                        "<div class='doneTasks' completedTaskId='"+response.completedTaskId+"'><span>"+response.task+"</span><button class='deleteCompletedTask'>Delete task</button></div>"
                    );
                    //alert('task deleted!');
                }
            }
        });
    });

    $(".completedList").on("click", ".deleteCompletedTask", function() {
        completedTaskId = $(this).parent().attr('completedTaskId');
        action = "removeCompletedTask";
        task = $(this).parent();
        $.ajax({
            url: 'ajax/remove.php',
            method: 'post',
            dataType: 'json',
            data: {'completedTaskId':completedTaskId,'action':action},
            success: function(response){
                console.log(response.case);
                if (response.case == 'success') {
                    $(task).remove();
                    //alert('task deleted!');
                }
            }
        });
    });


});