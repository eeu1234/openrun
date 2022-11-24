<template>
    <div class = "bg-black text-white text-center text-5xl" >
        <div class="float-left w-full">
            <img class = "h-40 m-auto" src="/img/chanel_logo.png">
            <div class="font-sans pb-5">
                NO WHERE
            </div>
        </div>
        <div id = "menu_button" class = "absolute right-0">
            <img class = "h-40 py-10" src="/img/menu.png">
        </div>

        <div class = "clear-both"></div>
    </div>


<!--    <div id = "testQurey" v-for="store in stores" class="flex justify-center items-center">-->
<!--        <div style = "background-color:red;">{{store.STORECODE}}</div>-->
<!--        <div style = "background-color:yellow;">{{store.STORENAME}}</div>-->
<!--        <div v-if="store.sales_log != null"> &lt;!&ndash;값이 널이면 출력할때 오류가 생긴다. 따라서 v-if로 분기를 처리해야함&ndash;&gt;-->
<!--            <div style = "background-color:yellowgreen;">{{store.sales_log.FINALPRODUCTCODE}}</div>-->
<!--        </div>-->
<!--    </div>-->

    <div if = "scheduleQureyTest">

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
    $("#sideMenu").css("width","20%");
    $("#sideMenu").css("height","100%");
    console.log("hi");

}
function closeSideMenu(){
    $("#sideBar").css("display","none");
    $("#sideMenu").css("width",'');
    $("#sideMenu").css("height",'');
}

export default {
    setup: () => ({
        hello: '안녕하세요!!'
    }),
    data: () => ({
        stores: [],
    }),
    created() {
        this.getStoreList();
        console.log(this.getStoreList());
    },
    methods: {
        getStoreList() {
            axios.post('./store', {}
            ).then(response => {
                console.log(response.data);
                this.stores = response.data;

            });

        },

    }
}
</script>

