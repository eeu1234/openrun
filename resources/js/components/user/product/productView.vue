<template>
    <div class = "w-full h-full">
        <div class = "w-100 h-24 content-center text-center items-center">
            <div class ="flex float-left w-1/4 h-full text-center"></div>
            <div class ="flex float-left w-2/4 h-full items-center content-center text-center">
                <p class="text-center items-center m-auto text-3xl font-sans font-semibold">상세페이지</p></div>
            <div class ="flex float-left w-1/4 h-full "></div>
            <div class = "clear-both"></div>
        </div>
        <div id="productImg" class="w-full">
            <img class = "w-full h-fit " src="/img/classic_medium_bag.jpg">
        </div>
    </div>
</template>

<script>



export default {
    components: {

    },

    setup: () => ({
        hello: '안녕하세요!!'
    }),

    data: () => ({
        hello : "",
    }),

    created() {


    },

    methods: {


    },


}
</script>

