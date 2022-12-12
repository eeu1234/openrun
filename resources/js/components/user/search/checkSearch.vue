<template>
    <div class="pt-40">
        <form v-on:submit.prevent="submitForm">
            <div id = "selectperiodButton"  class = "w-4/5 text-4xl border-b-4 mt-14 mb-7 m-auto py-2" @click="slideUpDown('period')">
                <div class = "w-48 float-left">검색기간</div>
                <img class = "h-10 float-right mr-5" src="/img/down.png">
                <div class = "clear-both"></div>
            </div>
            <div class = "w-4/5 h-16 m-auto">
                <Datepicker v-model="date" :value="date" @update:modelValue="handleDate"  class="w-full bg-gray-200" range ></Datepicker>
            </div>
            <div id = "selectperiod" class = "w-4/5 m-auto text-center text-3xl mt-5">
                <div class = "float-left w-1/4">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6">당월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6">1개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6">3개월</div>
                </div>
                <div class = "float-left w-1/4 h-10">
                    <div class = "w-11/12 m-auto border-2 rounded-xl py-6">직접입력</div>
                </div>
                <div class = "clear-both"></div>
            </div>
            <div class = "w-4/5 text-4xl border-b-4 my-14 m-auto py-2" @click="slideUpDown('place')">
                <div class = "w-48 float-left">장소</div>
                <img class = "h-10 float-right mr-5" src="/img/down.png">
                <div class = "clear-both"></div>
            </div>
            <div id="selectPlace" class="w-full">
                <div class = "w-4/5 h-16 bg-gray-200 m-auto mb-3 py-4 pl-4">
                    <input type = "checkbox" class = "w-7 h-7 float-left mr-2" name = "allchk" id = "allchk" @click="allChk"/>
                    <span class = "text-xl float-left">전체선택</span>
                    <div class =  "clear-both"></div>
                </div>
                <div v-for ="store in storeList" class = "w-4/5 my-3 m-auto pl-4" >
                    <div>
                        <input type = "checkbox" v-bind:value= "store.STORECODE" class = "w-7 h-7 float-left mr-2 chk" />
                        <span class = "text-xl float-left">{{store.STORENAME}}({{store.STORELOCATION}})</span>
                        <div class =  "clear-both"></div>
                    </div>
                </div>
            </div>
            <div class="w-4/5 m-auto h-fit text-center py-12 ">
                <button class="w-full h-20 bg-gray-700  text-white m-auto rounded-2xl text-4xl font-sans" @click="goSalesList">
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
            date: null,
        }),
        created() {
            this.loadData();
        },
        methods: {
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
                location.href='./salesList'
            },
            submitForm: function() {
                axios.post('./checkSearch/searchData', data
                ).then(response => {
                    console.log(response.data);
                });
            },
            loadData(){
                axios.post('/checkSearch/loadData', {}
                ).then(response => {
                    console.log(response.data);
                    this.storeList = response.data;
                });
            },
        }
    }
</script>
