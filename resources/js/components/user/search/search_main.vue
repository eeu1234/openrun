<template>
    <div class = "w-100  p-10">
        <div id = "searchArea" class = "w-full  pb-10">
                <input v-model="searchWord" @keyup.enter="searchResultData" type = "text" placeholder="검색어를 입력하세요" autofocus required class = "h-10 w-4/5 float-left border-2 rounded-xl text-black text-base pl-3 outline-none" >
                <button @click="searchResultData" class = "float-right w-14 h-10 text-base py-1 px-0.5 border-2 rounded-xl bg-slate-300 content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 m-auto">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class = clear-both></div>

        </div>
        <div id = "resultArea" class = "w-full">
            <div id = "headInfo" class = "border-b-2 text-base">
                <span>검색결과: 총 {{totalCnt}}건</span>
            </div>

                <div v-for = "(result,idx) in results"  :key="idx" class="w-full">
                        <button class = "repeatComponent " v-on:click="goDetail(result.FINALPRODUCTCODE)">
                            <div class = "w-full h-18 mt-4 my-2">
                                <div class = "float-left w-1/4">
                                    <img class = "h-full" src="/img/classic_medium_bag.jpg">
                                </div>
                                <div id="productInfo" class = "float-left pl-4 w-3/4 text-left">
                                    <div class=" w-full text-xs tracking-wide font-medium">Chanel</div>
                                    <div class=" w-full text-base tracking-wide font-medium">{{result.product_name.PRODUCTNAME}} {{result.FINALPRODUCTNAME}} {{result.SIZE}} </div>
                                    <div class=" w-full text-xs tracking-wide text-slate-400">{{result.COLOR}} {{result.MATERIAL}}</div>
                                    <div class=" w-full text-xs tracking-wide text-slate-400">{{result.COLOR2}}</div>
                                </div>
                            </div>
                        </button>
                </div>

        </div>
    </div>
</template>


<script>
import {MagnifyingGlassIcon} from "@heroicons/vue/24/solid";

export default {
    components: { MagnifyingGlassIcon },

    setup: () => ({
        hello: '안녕하세요!!'
    }),
    data: () => ({
        results: [],
        searchWord: '',
        totalCnt: 0,
        productCode: '',
    }),
    created() {
    },
    methods: {
        searchResultData: function() {
            //console.log(this.searchWord)
            var data = {
                searchWord: this.searchWord
            }
            axios.post('./search', data
            ).then(response => {
                console.log(response.data);
                this.results = response.data;
                this.totalCnt = response.data.length;
            });

        },
        goDetail:function(productCode) {
            location.href='./productView/'+productCode;

        },




    }
}
</script>


