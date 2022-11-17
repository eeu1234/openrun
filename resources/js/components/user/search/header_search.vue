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
       slideSideMenu();
    });
    $('#closeButton').click(function(){
        closeSideMenu();
    });
});
function slideSideMenu(){
    $("#sideBar").css("display","block");
    $("#sideMenu").css("width","17%");
    $("#sideMenu").css("height","100%");
    console.log("hi");

}
function closeSideMenu(){
    $("#sideBar").css("display","none");
    $("#sideMenu").css("width",'');
    $("#sideMenu").css("height",'');
}
</script>

