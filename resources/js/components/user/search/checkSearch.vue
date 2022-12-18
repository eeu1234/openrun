<template>
    <div class="pt-4">
        <form v-on:submit.prevent="submitForm">
            <div id = "selectperiodButton"  class = "w-4/5 text-sm border-b-4 mt-4 mb-2 m-auto py-2" @click="slideUpDown('period')">
                <div class = "w-14 float-left">검색기간</div>
                <img class = "h-4 float-right mr-5" src="/img/down.png">
                <div class = "clear-both"></div>
            </div>
            <div class = "w-4/5 h-16 m-auto">
                <Datepicker ref="datepicker" v-model="dateRange" type="date" range placeholder="Select date range" class="w-full bg-gray-200"
                            default-value="defaultValue"></Datepicker>
            </div>
            <div id = "selectperiod" class = "w-4/5 m-auto text-center text-3xl mt-5">
                <div class = "float-left w-1/4">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6" @click = "clickperiod_1">당월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6" @click = "clickperiod_2">1개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6" @click = "clickperiod_3">3개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6" @click = "clickperiod_4">직접입력</div>
                </div>
                <div class = "clear-both"></div>
            </div>
            <div class = "w-4/5 text-sm border-b-4 mt-6 mb-2 m-auto py-2"  @click="slideUpDown('place')">
                <div class = "w-14 float-left">장소</div>
                <img class = "h-4 float-right mr-5" src="/img/down.png">
                <div class = "clear-both"></div>
            </div>
            <div id="selectPlace" class="w-full">
                <div class = "w-4/5 h-fit bg-gray-200 m-auto py-2 pl-4">
                    <input type = "checkbox" class = "w-4 h-4 float-left mr-2" name = "allchk" id = "allchk" @click="allChk" checked/>
                    <span class = "text-xs float-left">전체선택</span>
                    <div class =  "clear-both"></div>
                </div>
                <div v-for ="store in storeList" class = "w-4/5 mt-2 m-auto pl-4" >
                    <div>
                        <input type = "checkbox" v-bind:value= "store.STORECODE" class = "w-4 h-4 float-left mr-2 chk" checked />
                        <span class = "text-xs float-left">{{store.STORENAME}}({{store.STORELOCATION}})</span>
                        <div class =  "clear-both"></div>
                    </div>
                </div>
            </div>
            <div class="w-4/5 m-auto h-fit text-center mt-6 py-2 ">
                <button class="w-full h-10 bg-gray-700  text-white m-auto rounded-2xl text-base font-sans" @click="goSalesList">
                    기록조회
                </button>
            </div>
        </form>
    </div>

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
            storeList: [],
            dateRange: [],
            // datepicker:'',
        }),
        created() {
            this.loadData();
            this.clickperiod_1();
        },
        mounted(){
            const datepicker = this.$refs.datepicker;
            // this.datepicker = datepicker;
        },
        methods: {
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
            slideUpDown : function(type){//달력 슬라이드업다운
                if(type =='period'){
                    if ($('#selectperiod').is(':hidden')){
                        $('#selectperiod').slideDown();
                    } else{
                        $('#selectperiod').slideUp();
                    }
                }else if(type == 'place'){
                    if ($('#selectPlace').is(':hidden')){
                        $('#selectPlace').slideDown();
                    } else{
                        $('#selectPlace').slideUp();
                    }
                }

            },
            allChk : function(){//전체선택 체크
                if($('input[name=allchk]').is(':checked')){
                    $(".chk").prop("checked", true);
                }
                else{
                    $(".chk").prop("checked", false);
                }
            },
            goSalesList : function(){//전체선택 체크
                location.href='/salesList'
            },
            submitForm: function() {
                axios.post('/checkSearch/searchData', data
                ).then(response => {
                    console.log(response.data);
                });
            },
            loadData(){
                axios.post('/checkSearch/loadData', {
                    }
                ).then(response => {
                    console.log(response.data);
                    this.storeList = response.data;
                });
            },
        }
    }
</script>
