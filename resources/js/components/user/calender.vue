<template>
    <body className="bg-white min-h-screen dark:bg-gray-900">
    <div  className="flex items-center justify-center py-8 px-4">
        <div className="w-11/12 shadow-lg m-auto">
            <div className="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
                <div className="px-4 flex items-center justify-between">
            <span tabIndex="0" className=" focus:outline-none text-xl font-bold dark:text-gray-100 text-gray-800">{{ dayData.year}} {{shortMonth[dayData.month%12]}}</span>
                    <div className="flex items-center">
                        <button @click = "preMonth" aria-label="calendar backward" className="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <polyline points="15 6 9 12 15 18"/>
                            </svg>
                        </button>
                        <button @click = "nextMonth" aria-label="calendar forward" className="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <polyline points="9 6 15 12 9 18"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div className="max-w-sm flex items-center justify-between pt-12 overflow-x-auto" >
                    <table className="w-full ">
                        <thead>
                        <tr>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        Mo
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className=" text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        Tu
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        We
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class ="w-full flex justify-center">
                                    <p className="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        Th
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className=" text-base font-medium text-center text-gray-800 dark:text-gray-100" >
                                        Fr
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        Sa
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div className="w-full flex justify-center">
                                    <p className="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                        Su
                                    </p>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="calender in calenders">
                            <td v-for="day in calender">
                                <div v-if="day != 0 && day != dayData.day" className="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p v-bind:id="day" @click = "setSendDate($event)" className="text-base text-gray-500 dark:text-gray-100 font-medium" >
                                        {{day}}
                                    </p>
                                </div>
                                <div v-if="day != 0 && day == dayData.day" className="flex items-center justify-center w-full rounded-full cursor-pointer">
                                    <p v-bind:id= "day" @click = "setSendDate($event)" role="link"  className="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">{{day}}</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div className="dark:bg-gray-700 bg-gray-50 rounded-b pb-2" v-for="salesInfo in salesList">
                <div className="px-4">
                    <div className="h-14 border-b py-2 border-gray-400 border-dashed">
                        <div class="w-24 h-10 pr-4 pt-1 float-left border-r-2 border-r-blue-600">
                            <p className=" text-xs font-light leading-3 text-gray-500 dark:text-gray-300">
                                {{salesInfo.storeInfo.STORENAME}}
                            </p>
                            <a tabIndex="0" className="h-10 focus:outline-none text-sm font-medium leading-5 text-gray-800 dark:text-gray-100 mt-2">{{salesInfo.storeInfo.STORELOCATION}}</a>
                        </div>
                        <div class="w-50 float-left">
                            <p className="pl-4 text-xs pt-2 leading-4 leading-none text-gray-600 dark:text-gray-300" @click="goDetail(salesInfo.productInfo.FINALPRODUCTCODE)">
                                {{salesInfo.productInfo.product_name.PRODUCTNAME}} {{salesInfo.productInfo.SIZE}} {{salesInfo.productInfo.MATERIAL}} {{salesInfo.productInfo.PATTERN}} {{salesInfo.productInfo.COLOR}} {{salesInfo.productInfo.COLOR2}}
                            </p>
                        </div>
                        <div class="clear-both"></div>
                    </div>



                </div>
            </div>


        </div>
    </div>
    </body>
</template>

<script>
export default {
    data: function () {
        return {
            productCode:0,
            dayData:[],
            calenders:[],
            shortMonth:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            sendDate:'',
            salesList:[],
            nowPoint:'',
        };
    },
    created() {
        this.setToday();
        this.setDate();
    },
    methods: {
        changePoint:function(event){
            $('#'+this.nowPoint).removeClass('focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full');
            $('#'+this.nowPoint).addClass('text-base text-gray-500 dark:text-gray-100 font-medium');
            $('#'+this.nowPoint).parent().removeClass('flex items-center justify-center w-full rounded-full cursor-pointer');
            $('#'+this.nowPoint).parent().addClass('px-2 py-2 cursor-pointer flex w-full justify-center');
            this.nowPoint = event.currentTarget.id;
            $('#'+this.nowPoint).removeClass('text-base text-gray-500 dark:text-gray-100 font-medium');
            $('#'+this.nowPoint).addClass('focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full');
            $('#'+this.nowPoint).parent().removeClass('px-2 py-2 cursor-pointer flex w-full justify-center');
            $('#'+this.nowPoint).parent().addClass('flex items-center justify-center w-full rounded-full cursor-pointer');
        },
        setSendDate:function(event){
            let day = event.currentTarget.id;
            this.sendDate = this.dayData.year+'-'+(this.dayData.month+1)+'-'+day;
            console.log(this.sendDate);
            this.changePoint(event);
            axios.post('/getSalesLog',
                {sendDate: this.sendDate}
            ).then(response => {
                this.salesList = response.data;
                console.log(this.salesList);
                this.changePoint(event);


            });
        },
        preMonth:function (){
            this.dayData.month -=1;
            if(this.dayData.month <0){
                this.dayData.month = 11;
                this.dayData.year -= 1;
            }
            this.setDate();
        },
        nextMonth:function (){
            this.dayData.month +=1;
            if(this.dayData.month >11){
                this.dayData.month = 0;
                this.dayData.year += 1;
            }
            this.setDate();
        },
        setToday:function (){
            let nowTime = new Date();
            let timeData = {
                year:nowTime.getFullYear(),
                month:nowTime.getMonth(),
                day:nowTime.getDate(),
                week:nowTime.getDay(),
            };
            this.dayData = timeData;
            this.nowPoint = timeData.day;


        },
        setDate:function(){
            let fristWeek = new Date(this.dayData.year,this.dayData.month,1).getDay(); //해당월 첫날 요일
            let LastDay = new Date(this.dayData.year,this.dayData.month+1,0).getDate(); // 해달월 마지막날.
            let monthData = []
            let startDay = 1;

            for(let j = 0; j<6; j++){
                let temp = []
                for(let i = 0; i<7; i++){
                    if(j == 0){
                        if(fristWeek > i){
                            temp[i] = 0;
                        }
                        else{
                            temp[i] = startDay;
                            startDay++;
                        }
                    }
                    else{
                        temp[i] = startDay;
                        startDay++;
                        if(startDay > LastDay){
                            break;
                        }
                    }

                }
                monthData.push(temp);
                if(startDay > LastDay){
                    break;
                }
            }

            this.calenders = monthData;

        },
        //제품상세페이지로 이동한다.
        goDetail:function(productCode) {
            location.href='./productView/'+productCode;

        },
    },
};
</script>

<style scoped></style>

