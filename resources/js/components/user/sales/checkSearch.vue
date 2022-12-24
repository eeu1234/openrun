<template>
    <div class = "w-full ">
        <div class = "w-100 h-18 content-center text-center items-center mt-3 mb-1">
            <div class ="flex float-left w-1/4  text-center ">
                <button class='ml-8' @click="back" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto mr-28 w-6 h-6">
                        <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class ="flex float-left w-2/4  items-center content-center text-center">
                <div class="relative m-auto">
                    <button class='ml-4' @click="salesDataToggleVar = !salesDataToggleVar" type="button">
                        <span class="float-left text-base font-sans font-semibold m-auto" v-show="!toggleLogTypeVar">타임라인</span>
                        <span class="float-left text-base font-sans font-semibold m-auto" v-show="toggleLogTypeVar">판매기록</span>
                        <span class="float-left h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-1 ml-2 w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span class = "clear-both"></span>
                    </button>
                    <div class="absolute top-6 left-2 bg-gray-50 w-full border-2" v-show="salesDataToggleVar">
                        <p class="text-base pt-2 pb-2" @click="toggleLogTypeFn" v-show="toggleLogTypeVar">타임라인</p>
                        <p class="text-base pt-2 pb-2" @click="toggleLogTypeFn" v-show="!toggleLogTypeVar">판매기록</p>
                    </div>
                </div>
            </div>
            <div class ="flex float-left w-1/4">
                <a href="/public" class="m-auto ml-32 w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                        <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class = "clear-both"></div>
        </div>
    </div>
    <div class="pt-4">
        <div class = "w-4/5 text-sm border-b-4 mt-4 mb-2 m-auto py-2" @click="hideAndShow_1 =!hideAndShow_1">
            <div class = "w-14 float-left">검색기간</div>
            <img class = "h-4 float-right mr-5" src="/img/down.png">
            <div class = "clear-both"></div>
        </div>
        <div class="" v-show="hideAndShow_1">
            <div class = "w-4/5 h-14 m-auto">
                <Datepicker ref="datepicker" v-model="dateRange" type="date" range placeholder="Select date range" class="w-full bg-gray-200"
                            default-value="defaultValue"></Datepicker>
            </div>
            <div  class = "w-4/5 m-auto text-center text-base">
                <div class = "float-left w-1/4">
                    <div class = "w-11/12 m-auto border-2 rounded-base py-2" @click = "clickperiod_1">당월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-base py-2" @click = "clickperiod_2">1개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-base py-2" @click = "clickperiod_3">3개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-base py-2" @click = "clickperiod_4">직접입력</div>
                </div>
                <div class = "clear-both"></div>
            </div>
        </div>
        <div>
            <div class = "w-4/5 text-sm border-b-4 mt-6 mb-2 m-auto py-2" @click="hideAndShow_2 =!hideAndShow_2">
                <div class = "w-14 float-left">장소</div>
                <img class = "h-4 float-right mr-5" src="/img/down.png">
                <div class = "clear-both"></div>
            </div>
            <div class="w-full" v-show="hideAndShow_2">
                <div class = "w-4/5 h-fit bg-gray-200 m-auto py-2 pl-4">
                    <input type = "checkbox" class = "w-4 h-4 float-left mr-2" name = "allchk" id = "allchk" @click="allChk" checked/>
                    <span class = "text-xs float-left">전체선택</span>{{this.chkStoreList}}
                    <div class =  "clear-both"></div>
                </div>
                <div v-for ="store in storeList" class = "w-4/5 mt-2 m-auto pl-4" >
                    <div>
                        <input type = "checkbox" v-bind:value= "store.STORECODE" class = "w-4 h-4 float-left mr-2 chk" v-model="chkStoreList"  />
                        <span class = "text-xs float-left">{{store.STORENAME}}({{store.STORELOCATION}})</span>
                        <div class =  "clear-both"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <salesLog v-show="toggleLogTypeVar" :no="this.no" @storeList="this.chkStoreList"/>
    <salesTimeline v-show="!toggleLogTypeVar" :no="this.no" @storeList="this.chkStoreList"/>
</template>

<script>
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { ref } from 'vue';



export default {
        setup: () => ({

        }),
        components: { Datepicker },
        data: () => ({
            hideAndShow_1 : false,
            hideAndShow_2 : false,
            toggleLogTypeVar : false,
            salesDataToggleVar : false,
            storeList: [],
            dateRange: [],
            chkStoreList:[],
            // datepicker:'',
        }),
        created() {
            this.getStoreList();
            this.clickperiod_1();


        },
        mounted(){
            const datepicker = this.$refs.datepicker;
            // this.datepicker = datepicker;
        },
        watch(){
            hideAndShow_1;
            hideAndShow_2;
            this.toggleLogTypeVar;
            salesDataToggleVar;
            this.chkStoreList;

        },
        props:['no'],
        methods: {
            toggleLogTypeFn : function(){
                this.toggleLogTypeVar = !this.toggleLogTypeVar;
                this.salesDataToggleVar = !this.salesDataToggleVar;
            },

            clickperiod_1:function(){
                var endDay = new Date();
                var startDay = new Date();
                startDay.setDate(1);
                this.dateRange = [startDay,endDay];
            },
            clickperiod_2:function(){
                var now = new Date();
                var endDay = new Date();
                var startDay = new Date(now.setMonth(now.getMonth() - 1));
                this.dateRange = [startDay,endDay];
            },
            clickperiod_3:function(){
                var now = new Date();
                var endDay = new Date();
                var startDay = new Date(now.setMonth(now.getMonth() - 3));
                this.dateRange = [startDay,endDay];
            },
            clickperiod_4:function(){
                this.dateRange=[];
                console.log(this.datepicker);
                this.datepicker.openMenu();
            },

        getStoreList(){
            axios.post('/checkSearch/getStoreList', {
                }
            ).then(response => {
                // console.log(response.data);
                this.storeList = response.data;
                for(var i=0;i < response.data.length;i++){
                    this.chkStoreList[i] = response.data[i].STORECODE;//전체리스트 선택
                }
                //console.log(this.chkStoreList);

            });
        },
        allChk : function(){//전체선택 체크
            this.getStoreList();
        },


        main : function(){
            location.href='/productView'
        },
        back : function(){
            location.href='/productView/'+this.no;
        },



    }
}
</script>
