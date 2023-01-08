<template>
    <div class = "my-6 w-full">
    <Datepicker ref="datepicker" v-model="dateRange" range type="date"  :max-date="new Date()" class="w-11/12 m-auto bg-gray-200" :enable-time-picker="false"
                default-value="defaultValue" @closed="loadData"></Datepicker>
    </div>
    <table class = "w-full" >
        <thead class = "border-2 border-black">
        <tr>
            <th class ="border-black border-2 w-1/6">
                <div className="w-full flex justify-center">
                    <p className="text-base font-medium text-center text-gray-800 ">
                        상품명
                    </p>
                </div>
            </th>
            <th class ="border-black border-2 w-1/6">
                <div className="w-full flex justify-center">
                    <p className=" text-base font-medium text-center text-gray-800">
                        판매일
                    </p>
                </div>
            </th>
            <th class ="border-black border-2 w-2/6">
                <div className="w-full flex justify-center">
                    <p className="text-base font-medium text-center text-gray-800 ">
                        판매장소
                    </p>
                </div>
            </th>
            <th class ="border-black border-2 w-1/6">
                <div class ="w-full flex justify-center">
                    <p className="text-base font-medium text-center text-gray-800 ">
                        기타
                    </p>
                </div>
            </th>
            <th class ="border-black border-2 w-1/6">
                <div className="w-full flex justify-center">
                    <p className=" text-base font-medium text-center text-gray-800 " >
                        삭제
                    </p>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(info,index) in productInfos" class = "border-black border-2">
            <td class="text-center border-black border-2 w-1/6 text-sm"><p>{{info.FINALPRODUCTNAME}}</p></td>
            <td class="text-center border-black border-2 w-1/6 text-sm"><p>{{info.SOLDDATE}}</p></td>
            <td class="text-center border-black border-2 w-2/6 text-sm"><p>{{info.STORELOCATION}} {{info.STORENAME}}</p></td>
            <td class="text-center border-black border-2 w-1/6 text-sm">
                <div @click="showMoreInfo(index)" class = "m-2 border rounded " >더보기</div>
            </td>
            <td class="text-center border-black border-2 w-1/6 text-sm">
                <div @click = "deleteLog(info)"  class = "m-2 border rounded " >삭제</div>
            </td>
            <div v-bind:id="index" class ="absolute top-1/3 left-1/3 w-60 h-48 hidden rounded-xl bg-slate-200 border-slate-300">
                <div class = 'w-full h-3/12 border-b-2 border-black' >
                    <div @click = "closeInfo(index)" class = "w-2/12 h-full float-right">X</div>
                    <div class = "clear-both"></div>
                </div>
                <div class = "px-3 pt-3">
                    <p>판매일자: {{info.SOLDDATE}}</p>
                    <p>상품명: {{info.FINALPRODUCTNAME}}</p>
                    <p>백화점: {{info.STORENAME}}</p>
                    <p>백화점 지점:{{info.STORELOCATION}}</p>
                    <p>사이즈: {{info.SIZE}}</p>
                    <p>색상: {{info.COLOR}} {{info.COLOR2}}</p>
                </div>
            </div>
        </tr>
        </tbody>
    </table>
</template>

<script>
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { ref, onMounted } from 'vue';
import dayjs from "dayjs";


export default {
    setup() {
        const date = ref();

        // For demo purposes assign range from the current date
        onMounted(() => {
            const startDate = new Date();
            const endDate = new Date(new Date().setDate(startDate.getDate() + 7));
            date.value = [startDate, endDate];
        })
        return {
            date,
        }
    },
    components: { Datepicker },
    data: () =>({
        dateRange: [],
        productInfos: [],
    }),
    watch : {
        dateRange(value){//검색기간 선택시
            if(value[1] == null ){
                value[1] = new Date();//endDate 없으면 오늘날짜로
            }
            this.dateRange = [value[0],value[1]];

        },
    },
    created() {
        this.setDate();
        this.loadData();
    },
    mounted(){
        const datepicker = this.$refs.datepicker;
    },
    methods:{
        setDate:function (){
            let endDay = new Date();
            let startDay = new Date();
            startDay.setDate(1);
            this.dateRange = [startDay,endDay];
        },
        loadData:function(){
            this.calDataRange();
            axios.post('/admin/loadData', this.dateRange
            ).then(response => {
                console.log(response.data);
                this.productInfos = response.data;
                console.log(this.productInfos);
            });
        },
        calDataRange:function (){
            this.dateRange[0] = dayjs(this.dateRange[0]).format('YYYY-MM-DD');
            this.dateRange[1] = dayjs(this.dateRange[1]).format('YYYY-MM-DD');
            console.log(this.dateRange);
        },
        showMoreInfo:function(index){
            $('#'+index).css('display','block');
        },
        closeInfo:function(index){
            console.log(index);
            $('#'+index).css('display','none');
        },
        deleteLog:function(info){
            let data = [info.SALECODE];
            if (confirm('삭제하시겠습니까?')) {
                // Save it!
                axios.post('/admin/deleteLog', data
                ).then(response => {
                    this.loadData();
                });
            }

        },
    }
}
</script>

