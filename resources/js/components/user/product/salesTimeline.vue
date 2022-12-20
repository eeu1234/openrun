<template>
    <div id="logBox" class="w-full mt-14 my-20">
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
    mounted() {
        console.log(this.toggleLogType);
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

