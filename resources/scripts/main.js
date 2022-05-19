$(document).ready(function(){
    
    $('.seeList').click(function(){
        $('.addToList').fadeOut();
        $('.btns').css("margin-top","0");
        $('.list').css("bottom","50px");

        $('.completedList').css("bottom","-500px");
    });

    $('.addToListBtn').click(function(){
        $('.addToList').fadeIn();
        $('.btns').css("margin-top","10rem");
        $('.list').css("bottom","-500px");
        $('.completedList').css("bottom","-500px");
    });

    $('.doneTasksBtn').click(function(){
        $('.addToList').fadeOut();
        $('.btns').css("margin-top","0");
        $('.completedList').css("bottom","50px");

        $('.list').css("bottom","-500px");
    });

})