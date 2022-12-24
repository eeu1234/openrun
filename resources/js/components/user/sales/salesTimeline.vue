
<template>
    <div id="logBox" class="w-full mt-14 my-20">
        <!--타임라인-->
        <div id="timelineBox" class="w-full mt-14 ml-2"  v-for="salesData in salesArr" >
            <div class = "w-4/5 h-12 m-auto mb-12" >
                <div class = "float-left w-1/5 ">
                    <div class = "w-full h-6 text-base text-gray-500 text-center m-auto">{{getMonthOnly(salesData.SOLDDATE)}}</div>
                    <div class = "w-full h-14 mx-0.5 content-center text-left items-left align-middle px-1">
                        <p class="w-full h-full text-xl font-sans font-bold text-white text-center align-middle bg-black rounded-xl pt-3">{{getDateOnly(salesData.SOLDDATE)}}</p>
                    </div>
                </div>
                <div class = "float-left w-4/5 pl-1">
                    <div class = "w-full h-6 m-auto"></div>
                    <div class="h-6 text-xl text-gray-800 text-left pl-5" >{{ salesData.product_last_sales_log.STORENAME }}</div>
                    <div class="h-6 text-2xl text-gray-500 text-left pl-5">{{ salesData.product_last_sales_log.STORELOCATION}}</div>
                </div>
                <div class = "clear-both"></div>
            </div>

        </div>

    </div>

</template>

<script>
import dayjs from "dayjs";

export default {
    components: {

    },

    setup() {
        return {

        };
    },
    data: () => ({
        type : false,
        salesArr : [],

    }),

    props: ['toggleLogType','no','storeList'],

    watch : {
        toggleLogType(){
            this.type = this.toggleLogType();
        },

    },

    created() {
        this.getSalesTimeline();

    },

    methods: {

        getSalesTimeline : function(no,s_date,e_date,placeArr){
            const data = {
                "no" : this.no,
            };
            axios.post('/getSalesData', data
            ).then(response => {
                this.salesArr = response.data;
            });
        },

        main : function(){
            location.href='/productView'
        },
        back : function(){
            history.back();
        },
        goTimeline : function(){
            location.href='./salesTimeline'
        },
        getMonthOnly(date){
            return dayjs(new Date(date)).format('MMM');
        },
        getDateOnly(date){
            return dayjs(new Date(date)).format('DD');
        }



    },
    computed :  {

    }


}
</script>

