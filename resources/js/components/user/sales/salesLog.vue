<template>

    <div id="logBox" class="w-full mt-14 my-20">
        <div class="w-4/5 bg-white  px-2 m-auto">
            <div class="w-full font-medium text-center" v-if="this.salesArr.length == 0">
                데이터가 없습니다.
            </div>
            <p class="w-full font-bold text-xl text-gray-800 border-b-2" v-if="this.salesArr.length != 0">총 {{this.totalCnt}}회</p>
        </div>
        <div class="w-4/5 p-2 m-auto">
            <div class="w-full bg-white p-2" v-for="salesData in salesArr">
                <div class="w-full" v-if="salesData != null">
                    <div class="float-left text-gray-800 text-base">{{salesData.STORENAME}} {{salesData.STORELOCATION}}</div>
                    <div class="float-right w-1/10 text-gray-800 text-base">{{salesData.STORECNT}}회</div>
                    <div class = "clear-both"></div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>


import dayjs from "dayjs";
import Loading from 'vue3-loading-overlay';

export default {
    components: {
        Loading,
    },

    setup() {
        return {

        };
    },
    data: () => ({
        type : false,
        salesArr : [],
        totalCnt : 0,
        loading : false,

    }),

    props: {
        dateRange : {//검색기간
          type: Array,
        },
        storeList: {//체크된 백화점 목록
            type: Array,
        },
        toggleLogType: {
            type: Boolean,
        },
        no: {
            type: String,
        },
    },

    watch : {
        storeList(){
            this.getSalesData(this.storeList,this.dateRange);
        },
        dateRange(){//검색기간 선택시
            this.getSalesData(this.storeList,this.dateRange);
        },

    },

    created() {


    },
    mounted() {
    },


    methods: {
        getSalesData : function(storeArrData,periodArrData){
            this.loading = true;
            const data = {
                "no" : this.no,
                "startDate" : dayjs(new Date(this.dateRange[0])).format('YYYY-MM-DD'),
                "endDate" : dayjs(new Date(this.dateRange[1])).format('YYYY-MM-DD'),
            };

            axios.post('/getSalesData', data
            ).then(response => {
                const storeInfoArr = [];
                for (let i = 0; i < response.data.length; i++) {
                    for(let j =0; j<storeArrData.length;j++){
                        if(response.data[i].STORECODE == storeArrData[j]){
                                storeInfoArr.push(response.data[i]);
                        }
                    }

                }
                this.salesArr = storeInfoArr;
                this.totalCnt = 0;//총 판매횟수 초기화
                this.salesArr.forEach((item) => {
                    this.totalCnt += parseInt(item.STORECNT);//총 판매횟수 합계
                });

                this.loading = false;



            });
        },


        main : function(){
            location.href='/productView/'+this.no;
        },


    },


}
</script>

