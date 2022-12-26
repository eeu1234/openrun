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
        storeList: {
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
        toggleLogType(){
            this.type = this.toggleLogType();
        },
        storeList(){
            this.getSalesData(this.storeList);
        },


    },

    created() {
        this.getSalesData(this.storeList);

    },
    mounted() {
    },


    methods: {
        getSalesData : function(storeArrData){

            const data = {
                "no" : this.no,
            };

            axios.post('/getSalesTimelineData', data
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
        back : function(){
            history.back();
        },
        goSalesLog : function(){
            location.href='./salesList'
        },


    },


}
</script>

