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
                <p class=" items-center m-auto text-base font-sans font-semibold">상세페이지</p></div>
            <div class ="flex float-left w-1/4">
                <a href="/" class="m-auto ml-32 w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                        <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class = "clear-both"></div>
        </div>
        <div id="productImg" class="w-full h-fit">
            <swiper :modules="[EffectFade]" effect="fade">
                <swiper-slide> <img class = "w-full h-fit " src="/img/classic_medium_bag.jpg"></swiper-slide>
                <swiper-slide><img class = "w-full h-fit " src="/img/boy_medium.PNG"></swiper-slide>
                <swiper-slide><img class = "w-full h-fit " src="/img/woc.PNG"></swiper-slide>
            </swiper>
        </div>
        <div class = "w-100 h-12 content-center text-center items-center py-2">
            <p class=" items-center m-auto text-xs font-sans font-light">최근 판매정보 : 2022-08-09 수요일 / 신세계 본점</p>
        </div>

        <div class = "relative w-100 h-45 content-center text-center items-center pt-1">
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-base font-sans font-bold pt-3 pl-8">Chanel</p>
            </div>
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-base font-sans font-medium pb-1 pl-8"> 클래식 미디움</p>
            </div>
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-sm font-sans font-semilight pb-1 pl-8 text-slate-600">블랙 / 캐비어 / 금장</p>
            </div>
            <div class = "absolute right-0 top-0 flex  content-center align-middle mt-4 mr-4 ">
                <div class = "relative flex w-full h-full content-center text-left items-left bg-black rounded-xl align-middle py-4 px-5 ">
                    <p class="text-3xl font-sans font-bold text-white text-center align-middle  m-auto">+1</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { EffectFade } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue';

import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

import 'swiper/css';
import 'swiper/css/effect-fade';

export default {
    name: "productView",
    components: {
        datepicker,
        Swiper,
        SwiperSlide,
        vSelect
    },

    setup() {
        return {
            EffectFade,
        };
    },
    props: ['no'],

    data: () => ({
        finalProductCode : '',
        data : '',
        books: [
                { title: "Old Man's War" },
                { title: "The Lock Artist" },
                { title: "HTML5" },
                { title: "Right Ho Jeeves" },
                { title: "The Code of the Wooster" },
                { title: "Thank You Jeeves" }
            ],
        list_temp_str : [],
        category : ["1","2","3"],
        hello : "",
        format:"dd/MM/yyy",
        //startDate:date_week,
        //endDate:date_today,
        selectTerm : "",
        dateSelect : [{title : "", value : "i18n.myoffice.Select"},
            {title : "today", value : "i18n.search.today"},
            {title : "week", value : "i18n.search.week"},
            {title : "current_month", value : "i18n.search.thisMonth"},
            {title : "before_1month", value : "i18n.search.before1month"},
            {title : "before_2month", value : "i18n.search.before2month"},
            {title : "before_3month", value : "i18n.search.before3month"},
            {title : "all_date", value : "i18n.search.allday"}],
        date_type_list : [],
        date_type_list1 : [{title : "register", value : "i18n.myoffice.RegistrationDate"},
            {title : "update", value : "i18n.myoffice.UpdateDate"}],
        date_type_list2 : [{title : "order", value : "i18n.myoffice.Order.orderDate"},
            {title : "accept", value : "i18n.myoffice.Order.depositdate"}],

    }),

    watch : {
        startDate(s_date){
            this.set_s_date(s_date);
        },
        endDate(e_date){
            this.set_e_date(e_date);
        },
        date_type(date_type){
            this.set_date_type(date_type);
        },
        selectTerm : function (){
            //console.log(this.selectTerm);
            if(this.selectTerm == "today"){
                this.today();
            }
            if(this.selectTerm == "week"){
                this.week();
            }
            if(this.selectTerm == "current_month"){
                this.current_month();
            }
            if(this.selectTerm == "before_1month"){
                this.before_1month();
            }
            if(this.selectTerm == "before_2month"){
                this.before_2month();
            }
            if(this.selectTerm == "before_3month"){
                this.before_3month();
            }
            if(this.selectTerm == "all_date"){
                this.all_date();
            }
        }
    },

    created() {
        console.log(this.no);


    },
    mounted(){
        this.sendInfoPage ();
    },
    methods: {
        back : function(){
            history.back();
        },
        sendInfoPage:function() {
            //console.log(this.productCode);
            axios({
                method: 'post',
                url: '/productView/loadData',
                data: {
                    finalProductCode: this.productCode,
                }
            }).then(function (response) {

            });
        },


    },


}
</script>

