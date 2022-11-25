<template>
    <div class = "w-full h-full">
        <div class = "w-100 h-8 p-20">
            <div class ="float-left w-1/4 h-full p-20"></div>
            <div class ="float-left w-2/4 h-full p-20">상세페이지</div>
            <div class ="float-left w-1/4 h-full p-20"></div>
            <div class = clear-both></div>
        </div>
        <div id="productImg" class="w-full">
            <img class = "w-full h-fit " src="/img/classic_medium_bag.jpg">
        </div>
    </div>
</template>

<script>

// import '/public/common/css/tailwindcss.css'

export default {
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

