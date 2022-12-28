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
                        사이즈
                    </p>
                </div>
            </th>
            <th class ="border-black border-2 w-1/6">
                <div className="w-full flex justify-center">
                    <p className=" text-base font-medium text-center text-gray-800 " >
                        색상
                    </p>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="info in productInfos" class = "border-black border-2">
            <td class="text-center border-black border-2 w-1/6 "><p>{{info.FINALPRODUCTNAME}}</p></td>
            <td class="text-center border-black border-2 w-1/6"><p>{{info.SOLDDATE}}</p></td>
            <td class="text-center border-black border-2 w-2/6"><p>{{info.STORELOCATION}} {{info.STORENAME}}</p></td>
            <td class="text-center border-black border-2 w-1/6">{{info.SIZE}}</td>
            <td class="text-center border-black border-2 w-1/6">{{info.COLOR}} {{info.COLOR2}}</td>
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
    }
}
</script>

