<template>
    <div class = "w-100 h-full p-20">
        <div id = "searchArea" class = "w-full  pb-20">
                <input v-model="searchWord" @keyup.enter="searchResultData" type = "text" placeholder="검색어를 입력하세요" autofocus required class = "h-20 w-10/12 float-left border-2 rounded-2xl text-black text-3xl pl-10 outline-none" >
                <button @click="searchResultData" class = "float-right w-28 h-20 text-4xl py-2 px-0.5 border-2 rounded-2xl bg-slate-300 content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 m-auto">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class = clear-both></div>

        </div>
        <div id = "resultArea" class = "w-full">
            <div id = "headInfo" class = "border-b-2">
                <span>검색결과: 총 {{totalCnt}}건</span>
            </div>

                <div v-for = "result in results" class="w-full">
                    <form action="./productView" method="get">
                        <input type="hidden" name='productCode' v-bind:value="result.FINALPRODUCTCODE">
                        <button class = "repeatComponent mx-5">
                            <div class = "w-full h-44 my-4" @click="submit">
                                <div class = "float-left w-1/4 h-full">
                                    <img class = "h-full" src="/img/classic_medium_bag.jpg">
                                </div>
                                <div id="productInfo" class = "float-left pl-12 w-3/4 h-full">
                                    <div class="h-1/5 w-full text-xl tracking-wide font-medium">Chanel</div>
                                    <div class="h-2/5 w-full text-4xl tracking-wide font-medium" style = "line-height:4rem;">{{result.product_name.PRODUCTNAME}} {{result.FINALPRODUCTNAME}} {{result.SIZE}} </div>
                                    <div class="h-1/5 w-full text-xl tracking-wide text-slate-400">{{result.COLOR}} {{result.MATERIAL}}</div>
                                    <div class="h-1/5 w-full text-xl tracking-wide text-slate-400">{{result.COLOR2}}</div>
                                </div>
                            </div>
                        </button>
                    </form>
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
        sendInfoPage:function(productCode, event) {
            //console.log(productCode);
            axios.post('/productView/loadData',
            ).then(response => {
            });
        },




    }
}
</script>


