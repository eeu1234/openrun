<template>
    <!--타임라인,로그 박스-->
    <div class = "w-100 h-28 content-center text-center items-center">
        <div class ="flex float-left w-1/4 h-full text-center">
            <button class='ml-8' @click="main" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto mr-32 w-16 h-16">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class ="flex float-left w-2/4 h-full items-center content-center text-center">
            <div class="relative m-auto">
                <button class='ml-8' @click="selectType" type="button">
                        <span class="float-left text-4xl font-sans font-semibold">타임라인</span>
                        <span class="float-left h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-1 ml-2 w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span class = "clear-both"></span>
                </button>
                <div id='selectTypeBox' class="absolute top-14 bg-gray-50 w-full border-2 hidden ">
                    <p class="text-2xl pt-4 pb-4" @click="goSalesLog">판매기록</p>
                </div>
            </div>
        </div>
        <div class = "clear-both"></div>
    </div>
    <div id="logBox" class="w-full mt-14 my-20">
        <div class="w-4/5 bg-gray-200 rounded-2xl p-4 m-auto text-gray-500">
            <p class="w-full mb-2 text-xl">검색 기간 2022-02-04 ~ 2022-03-08</p>
            <p class="w-full text-xl ">선택 장소 : 전체선택</p>
        </div>
        <div class="w-4/5 font-bold bg-white mt-10 p-2 m-auto text-gray-800 border-b-2">
            <p class="w-full  text-xl">총 50회</p>
        </div>
        <div class="w-4/5 p-2 m-auto">

            <div class="w-full bg-white p-2">
                <div class="w-full">
                    <div class="float-left text-gray-800 text-xl">신세계백화점 강남점</div>
                    <div class="float-right w-1/10 text-gray-800 text-xl">7회</div>
                    <div class = "clear-both"></div>
                </div>
            </div>

            <div class="w-full bg-white p-2">
                <div class="w-full">
                    <div class="float-left text-gray-800 text-xl">신세계백화점 본점</div>
                    <div class="float-right w-1/10 text-gray-800 text-xl">5회</div>
                    <div class = "clear-both"></div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>


export default {
    components: {

    },

    setup() {
        return {

        };
    },
    data: () => ({

        radioCondition : "1",

    }),
    props:{

    },
    watch : {

    },

    created() {


    },

    methods: {

        slideUpDown : function(){// 슬라이드업다운
                if ($('#logBox').is(':hidden')){
                    $('#logBox').slideDown();
                } else{
                    $('#logBox').slideUp();
                }

        },
        main : function(){
            location.href='/productView'
        },
        back : function(){
            history.back();
        },
        goSalesLog : function(){
           location.href='./salesList'
        },
        selectType : function(){
            if ($('#selectTypeBox').is(':hidden')){
                $('#selectTypeBox').slideDown();
            } else{
                $('#selectTypeBox').slideUp();
            }
        },


    },


}
</script>

