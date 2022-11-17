<template>
    <div class = "bg-black text-white text-center text-5xl" >
        <div class="float-left w-full">
            <img class = "h-40 m-auto" src="/img/chanel_logo.png">
        </div>
        <div id = "menu_button" class = "absolute right-0">
            <img class = "h-40 py-10" src="/img/menu.png">
        </div>
        <div class = "clear-both"></div>
    </div>
</template>

<script>
$(document).ready(function(){
    $('#menu_button').click(function(){
        $("#test").css("display","block");
        $("#test").css("background-color","black");
        console.log("hi");
    });
});
</script>

