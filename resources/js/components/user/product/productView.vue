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

        <div class = "relative w-100 h-42 content-center text-center items-center mt-3 pt-1 pl-10" v-for="product in productInfo" >
            <div class = "flex w-3/5 h-15 content-center text-left items-left">
                <p class="w-full h-fit text-base font-sans font-bold pt-3 ">Chanel</p>
            </div>
            <div class = "flex w-3/5 h-6 content-center text-left items-left">
                <p class="w-full h-fit text-base font-sans font-medium pb-1 "> {{product.product_name.PRODUCTNAME}} {{product.FINALPRODUCTNAME}} {{product.SIZE}}</p>
            </div>
            <div class = "flex w-3/5 h-10 content-center text-left items-left">
                <p class="w-full h-fit text-xs font-sans font-semilight pb-1  text-slate-600">{{product.COLOR}} / {{product.MATERIAL}} / {{product.COLOR2}}</p>
            </div>
            <div class = "absolute right-0 top-0 flex  content-center align-middle mt-4 mr-10 ">
                <div class = "relative flex w-full h-full content-center text-left items-left bg-black rounded-xl align-middle pt-3 pb-4 px-4">
                    <p class="text-3xl font-sans font-bold text-white text-center align-middle  m-auto">+1</p>
                </div>
            </div>
        </div>
        <div class="w-4/5 m-auto h-fit text-center mt-6 py-2 ">
            <button class="w-full h-10 bg-gray-700  text-white m-auto rounded-2xl text-base font-sans" @click="goSalesData(no)">
                기록조회
            </button>
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

import {reactive} from 'vue'

export default {
    name: "productView",
    components: {
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
        productInfo : [],


    }),

    watch : {

    },

    created() {
        console.log(this.no);
        this.sendInfoPage();
    },
    mounted(){
    },
    methods: {
        back : function(){
            history.back();
        },
        sendInfoPage:function() {
            axios.post('/loadData',
                {finalProductCode: this.no}
            ).then(response => {
                this.productInfo = response.data;

                console.log(this.productInfo);
            });
        },
        goSalesData:function(finalProductCode) {
            location.href='/salesData/'+finalProductCode;
        },


    },


}
</script>

