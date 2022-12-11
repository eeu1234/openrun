<template>
    <!--타임라인,로그 박스-->
    <div id="logBox" class="w-full">
        <!--타임라인-->
        <div id="timelineBox" class="w-full">
            <div class = "w-4/5 m-auto mb-6">
                  <div class = "float-left w-1/5 ">
                    <div class = "w-full h-12 text-4xl text-gray-500 text-center m-auto">AUG</div>
                    <div class = "w-full h-36 mx-0.5 content-center text-left items-left bg-black rounded-2xl align-middle pt-12">
                        <p class="w-full h-full text-5xl font-sans font-bold text-white text-center align-middle">27</p>
                    </div>
                 </div>
                  <div class = "float-left w-4/5 h-full">
                    <div class = "w-full h-12  m-auto"></div>
                        <div class="h-16 text-6xl text-gray-800 text-left pl-4" >현대백화점</div>
                        <div class="h-16 text-3xl text-gray-500 text-left pl-5">압구정현대점</div>
                  </div>
            <div class = "clear-both"></div>
            </div>
            <div class = "w-4/5 m-auto mb-6">
                  <div class = "float-left w-1/5 ">
                    <div class = "w-full h-12 text-4xl text-gray-500 text-center m-auto">AUG</div>
                    <div class = "w-full h-36 mx-0.5 content-center text-left items-left bg-black rounded-2xl align-middle pt-12">
                        <p class="w-full h-full text-5xl font-sans font-bold text-white text-center align-middle">26</p>
                    </div>
                 </div>
                  <div class = "float-left w-4/5 h-full">
                    <div class = "w-full h-12  m-auto"></div>
                        <div class="h-16 text-6xl text-gray-800 text-left pl-4" >롯데백화점</div>
                        <div class="h-16 text-3xl text-gray-500 text-left pl-5">명동본점</div>
                  </div>
            <div class = "clear-both"></div>
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


    },


}
</script>

