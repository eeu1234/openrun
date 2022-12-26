<template>
    <div id="logBox" class="w-full mt-14 my-20">
        <div class="w-4/5 font-bold bg-white mt-10 p-2 m-auto text-gray-800 border-b-2">
            <p class="w-full  text-xl">총 {{this.totalCnt}}회</p>
        </div>
        <div class="w-4/5 p-2 m-auto">
            <div class="w-full bg-white p-2" v-for="salesData in salesArr">
                <div class="w-full">
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
        totalCnt : 0,

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





            });
        },


        main : function(){
            location.href='/productView/'+this.no;
        },


    },


}
</script>

