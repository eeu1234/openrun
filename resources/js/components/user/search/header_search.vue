<template>
    <div class = "bg-black text-white text-center text-xl" >
        <div class="w-full pt-2 h-28 px-14 relative">
            <div class = "float-left w-full" >
                <img class = "h-14 m-auto" src="/img/chanel_logo.png" @click="main">
                <div class="font-sans font-extrabold pb-3">
                    NO WHERE
                </div>
<!--                <button id = "menu_button" class = "absolute top-0 right-0 w-2/12 pt-8 mr-2" @click="toggleSideMenu = !toggleSideMenu">
                    <img class = "h-8" src="/img/menu.png">
                </button>-->
                <button id = "menu_button" class = "absolute top-0 right-0 w-2/12 pl-4 pt-8" @click="goSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class = "clear-both"></div>
        </div>

    </div>

    <div id = "sideBar" class =  "w-40 h-full absolute z-50 bg-gray-200 top-0 right-0" v-if="toggleSideMenu">
        <div id = "topArae" class = "w-full text-lg mt-4 ml-4">
            <button id = "closeButton" class = "mt-5 mb-5 " @click="toggleSideMenu = !toggleSideMenu">
                <img class = "h-8" src="/img/exit.png">
            </button>

            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans "><a href="/" class="">메인페이지</a></div>
            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans"><a href="./searchMain" class="">검색</a></div>
<!--            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans"><a href="./productView" class="">상세페이지</a></div>-->

        </div>

    </div>
</template>

<script>

export default {
    setup: () => ({
        hello: '안녕하세요!!'
    }),
    data: () => ({
        toggleSideMenu: false,
    }),
    created() {
    },
    methods: {
        main : function(){
            location.href='/';
        },
        goSearch : function(){
            location.href='/searchMain';
        },
    }
}
</script>

