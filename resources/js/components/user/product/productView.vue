<template>
    <div class = "w-full h-full">
        <div class = "w-100 h-28 content-center text-center items-center">
            <div class ="flex float-left w-1/4 h-full text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto mr-32 w-16 h-16">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class ="flex float-left w-2/4 h-full items-center content-center text-center">
                <p class=" items-center m-auto text-4xl font-sans font-semibold">상세페이지</p></div>
            <div class ="flex float-left w-1/4 h-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="m-auto ml-32 w-16 h-16">
                    <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class = "clear-both"></div>
        </div>
        <div id="productImg" class="w-full">
            <swiper :modules="[EffectFade]" effect="fade">
                <swiper-slide> <img class = "w-full h-fit " src="/img/classic_medium_bag.jpg"></swiper-slide>
                <swiper-slide><img class = "w-full h-fit " src="/img/boy_medium.PNG"></swiper-slide>
                <swiper-slide><img class = "w-full h-fit " src="/img/woc.PNG"></swiper-slide>
            </swiper>
        </div>
        <div class = "w-100 h-34 content-center text-center items-center py-4">
            <p class=" items-center m-auto text-3xl font-sans font-light">최근 판매정보 : 2022-08-09 수요일 / 신세계 본점</p>
        </div>

        <div class = "relative w-100 h-45 content-center text-center items-center pt-4">
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-4xl font-sans font-bold pt-5 pl-24">Chanel</p>
            </div>
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-4xl font-sans font-medium pb-5 pl-24">Classic Medium Handbag</p>
            </div>
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-4xl font-sans font-semilight pb-5 pl-24 text-slate-600">블랙 / 캐비어 / 금장</p>
            </div>
            <div class = "absolute right-0 top-0 flex w-2/5 h-full content-center align-middle py-6 px-28">
                <div class = "relative flex w-full h-full content-center text-left items-left bg-black rounded-2xl align-middle pt-12">
                    <p class="w-full h-full text-5xl font-sans font-bold text-white text-center align-middle">+1</p>
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
    data: () => ({
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
    props:{
        s_date : "",
        e_date : "",
        is_view: false,
        date_type: "",
        start_plusday : "",
        title_hide : false,
    },
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


    },

    methods: {
        list_temp_str : [1,2,3]

    },


}
</script>

