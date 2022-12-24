<template>
    <div class = "bg-black text-white text-center text-xl" >
        <div class="w-full pt-2 h-28 px-14 relative">
            <div class = "float-left w-72 ">
                <img class = "h-14 m-auto" src="/img/chanel_logo.png">
                <div class="font-sans font-extrabold pb-3">
                    NO WHERE
                </div>
                <button id = "menu_button" class = "absolute top-0 right-0 w-2/12 pt-8 mr-6" @click="toggleSideMenu = !toggleSideMenu">
                    <img class = "h-8" src="/img/menu.png">
                </button>
            </div>

            <div class = "clear-both"></div>
        </div>

    </div>

    <div id = "sideBar" class =  "w-52 h-full absolute z-50 bg-gray-200 top-0 right-0" v-if="toggleSideMenu">
        <div id = "topArae" class = "w-full text-lg mt-4 ml-4">
            <button id = "closeButton" class = "mt-5 mb-5 " @click="toggleSideMenu = !toggleSideMenu">
                <img class = "h-8" src="/img/exit.png">
            </button>

            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans "><a href="/" class="">메인페이지</a></div>
            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans"><a href="./searchMain" class="">검색</a></div>
            <div id = "menuIndex" class = " w-8/12 mb-2 font-sans"><a href="./productView" class="">상세페이지</a></div>

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

    }
}
</script>

