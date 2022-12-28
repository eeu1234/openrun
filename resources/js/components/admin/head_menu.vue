<template>
    <div class = "bg-black text-white text-center text-xl" >
        <div class="w-full pt-2 h-28 px-14 relative">
            <div class = "float-left w-full" >
                <img class = "h-14 m-auto" src="/img/chanel_logo.png" @click="main">
                <div class="font-sans font-extrabold pb-3">
                    NO WHERE
                </div>
                <div class = "absolute top-9 right-4 w-2/12">
                    admin
                </div>
            </div>
        </div>
    </div><!--logo-->
<!--menu-->
    <div class = "w-full bg-black text-white font-medium">
        <span @click = "goShowPage" class="float-left p-4">판매기록조회</span>
        <span @click = "goEditPage" class="float-left p-4">판매기록관리</span>
        <div class = "clear-both"></div>
    </div>
</template>

<script>
export default {
    data: () =>({
    }),
    methods:{
        goEditPage:function (){
            location.href='/admin/edit';
        },
        goShowPage:function (){
            location.href='/admin';
        }
    }
}
</script>

<style scoped>

</style>
