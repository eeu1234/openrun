<template>
    <div class = "w-full h-full">
        <div class = "w-100 h-28 content-center text-center items-center">
            <div class ="flex float-left w-1/4 h-full text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto mr-32 w-16 h-16">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class ="flex float-left w-2/4 h-full items-center content-center text-center">
                <p class=" items-center m-auto text-4xl font-sans font-semibold">상세페이지</p></div>
            <div class ="flex float-left w-1/4 h-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto ml-32 w-16 h-16">
                    <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class = "clear-both"></div>
        </div>
        <div id="productImg" class="w-full">
            <img class = "w-full h-fit " src="/img/classic_medium_bag.jpg">
        </div>
        <div class = "w-100 h-34 content-center text-center items-center py-4">
            <p class=" items-center m-auto text-3xl font-sans font-light">최근 판매정보 : 2022-08-09 수요일 / 신세계 본점</p>
        </div>

        <div class = "w-100 h-40 content-center text-center items-center py-4">
            <div class = "flex w-3/4 h-fit content-center text-left items-left">
                <p class="w-full h-fit text-4xl font-sans font-bold py-5 pl-16">Chanel</p>
                <p class="w-full h-fit text-4xl font-sans font-bold py-5 pl-16">Classic Medium Handbag</p>
            </div>
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

