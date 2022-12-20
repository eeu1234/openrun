<template>
    <div id="logBox" class="w-full mt-14 my-20" v-if="toggleLogType">
        <!--타임라인-->
        <div id="timelineBox" class="w-full mt-14 ml-2">
            <div class = "w-4/5 h-12 m-auto mb-12">
                  <div class = "float-left w-1/5 ">
                    <div class = "w-full h-6 text-base text-gray-500 text-center m-auto">AUG</div>
                    <div class = "w-full h-14 mx-0.5 content-center text-left items-left bg-black rounded-xl align-middle pt-3">
                        <p class="w-full h-full text-xl font-sans font-bold text-white text-center align-middle">27</p>
                    </div>
                 </div>
                  <div class = "float-left w-4/5 pl-1">
                    <div class = "w-full h-6 m-auto"></div>
                        <div class="h-6 text-xl text-gray-800 text-left pl-5" >현대백화점</div>
                        <div class="h-6 text-2xl text-gray-500 text-left pl-5">압구정현대점</div>
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
        type : false,

    }),
    props:{
        props: ['toggleLogType'],
    },
    watch : {
        toggleLogType(){
            this.type = this.toggleLogType();
            console.log(this.type);
        },
    },

    created() {


    },

    methods: {

        main : function(){
            location.href='/productView'
        },
        back : function(){
            history.back();
        },
        goTimeline : function(){
           location.href='./salesTimeline'
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

