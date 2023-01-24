<template>
    <div class = "h-96 border-2 border-black w-11/12 m-auto z-50 mb-10 py-4 px-2 mt-4 overflow-y-scroll">
        <div class = "w-full text-xs text-center my-4 "></div>
        <table class = "m-auto">
            <thead>
            <tr>
                <td class = "w-1/3 text-center border ">종류</td>
                <td class = "w-1/3 text-center border">상품분류</td>
                <td class = "w-1/3 text-center border">상품명</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class = "px-1 py-1 border">
                    <input v-model="sendData.classify" type="text" list="classify" class = " w-full bg-slate-200 rounded"/>
                    <datalist id = "classify"  >
                        <option v-for="item in classify">{{item}}</option>
                    </datalist>
                </td>
                <td class = "px-1 border">
                    <input v-model="sendData.category" type="text" list="category" class = " w-full bg-slate-200 rounded"/>
                    <datalist id = "category"  >
                        <option v-for="item in category">{{item}}</option>
                    </datalist>

                </td>
                <td class = "px-1 border">
                    <input v-model="sendData.productName" type="text" list="productName" class = "w-full bg-slate-200 rounded"/>
                    <datalist id = "productName">
                        <option v-for="item in productName">{{item}}</option>
                    </datalist>
                </td>
            </tr>
            </tbody>
        </table>
        <div @click = "searchData" class = "rounded-xl bg-slate-200 border-slate-300 block w-12 text-center py-1 float-right border mx-4 my-4">검색</div>
        <div class = "clear-both"></div>
        <div v-for="item in productInfos" class = "repeatComponent w-full border " @click = "pushProduct(item)" >
            <div class = "w-full mt-4 my-2">
                <div class = "float-left w-1/4">
                    <img class = "w-full" src="/img/classic_medium_bag.jpg">
                </div>
                <div id="productInfo" class = "float-left pl-4 w-3/4 text-left">
                    <div class=" w-full text-xs tracking-wide font-medium">Chanel</div>
                    <div class=" w-full text-base tracking-wide font-medium">{{item.PRODUCTNAME}} {{item.FINALPRODUCTNAME}} {{item.SIZE}} {{item.MATERIAL}}</div>
                    <div class=" w-full text-xs tracking-wide text-slate-400">{{item.COLOR}} {{item.COLOR2}}</div>
                    <div class=" w-full text-xs tracking-wide text-slate-400">{{item.PATTERN}}</div>
                    <div class=" w-full text-xs tracking-wide text-slate-400"></div>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>

    <div class = "border-2 border-black w-11/12 mt-4 py-4 z-1 m-auto overflow-y-scroll h-72 ">
        <p v-if="selectedProduct.length == 0" id ="notice" class = "text-center">추가된 상품이 없습니다.</p>
        <div v-if="selectedProduct.length > 0" class = "repeatComponent w-full border " >
            <div v-for="(item,index) in selectedProduct">
                <div class = "w-full  mt-4 my-2">
                    <div class = "float-left w-1/4">
                        <img class = "w-full" src="/img/classic_medium_bag.jpg">
                    </div>
                    <div id="productInfo" class = "float-left pl-4 w-3/4 text-left">
                        <div class=" w-full text-xs tracking-wide font-medium">Chanel</div>
                        <div class=" w-full text-base tracking-wide font-medium">{{item.FINALPRODUCTNAME}}</div>
                        <div class=" w-full text-xs tracking-wide text-slate-400">{{item.COLOR}} {{item.COLOR2}}</div>
                        <div class=" w-full text-xs tracking-wide text-slate-400">{{item.PATTERN}}</div>
                        <div class=" w-full text-xs tracking-wide text-slate-400">{{item.SIZE}}</div>
                        <div class=" w-full text-xs tracking-wide text-slate-400">{{item.MATTRIAL}}</div>
                    </div>
                    <div class="clear-both"></div>
                    <div class = "w-full text-left">
                        <table class = "float-left w-10/12">
                            <thead>
                            <tr>
                                <td class = "w-1/3 text-center border ">백화점</td>
                                <td class = "w-1/3 text-center border">지점</td>
                                <td class = "w-1/3 text-center border">판매일자</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class = "px-1 py-1 border">
                                    <select v-model = "insertData[index][1]" class = "w-full float-left my-1 bg-slate-200 rounded" @change="loadStoreLocationList($event)">
                                        <option v-for="item in  store" :value="item.STORENAME">{{item.STORENAME}}</option>
                                    </select>
                                </td>
                                <td class = "px-1 border">
                                    <select v-model = "insertData[index][2]" class = "float-left my-1 w-full bg-slate-200 rounded">
                                        <option v-for="item in  storeLocation" :value="item.STORECODE">{{item.STORELOCATION}}</option>
                                    </select>

                                </td>
                                <td class = "px-1 border">
                                    <datepicker v-model="insertData[index][3]" class="float-left my-1 w-full" :format="'yyyy.mm.dd'"></datepicker>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div @click="delProduct(item)" class = "w-12 mx-2 my-4 h-10 float-left bg-slate-200 border-slate-300 p-2 rounded-xl">제거</div>
                        <div class = "clear-both"></div>
                    </div>
                </div>
            </div>
        </div>
        <div @click = "insertDB" class = "float-right px-5 py-1 mx-4 mt-4 border rounded bg-slate-200 border-slate-300">등록</div>
        <div class="clear-both"></div>
    </div>






</template>

<script>
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { ref, onMounted } from 'vue';
import dayjs from "dayjs";
import _ from "lodash";



export default {
    components: {
        Datepicker,
         },
    data: () =>({
        productInfos:[],
        sendData:{
            classify: '',
            category: '',
            productName:'',
        },
        selectedProduct:[],
        classify:[],
        category:[],
        productName:[],
        insertData:[],
        store:[],
        allStoreInfoList:[],
        storeLocation:[]
    }),
    watch: {
        'sendData.classify':function(){
            this.sendData.category = '';
            this.sendData.productName = '';
            this.loadCategory()
        },
        'sendData.category':function(){
            this.loadProductName();
            this.sendData.productName = '';
        },
        'sendData.productName':function(){
        },


    },

    created() {
        this.loadClassify();
        this.loadStoreList();
    },
    mounted(){
        const datepicker = this.$refs.datepicker;
    },
    methods:{

        searchData:function(){
            axios.post('/admin/searchData', this.sendData
            ).then(response => {
                this.productInfos = response.data;
            });
        },
        pushProduct:function (item){
            for(let i = 0; i<this.selectedProduct.length; i++){
                if(item.FINALPRODUCTCODE == this.selectedProduct[i].FINALPRODUCTCODE){
                    alert("이미 추가된 제품입니다.");
                    return;
                }
            }
            this.selectedProduct.push(item);
            this.insertData.push([item.FINALPRODUCTCODE]);
        },
        delProduct:function(item){
            for(let i = 0; i<this.selectedProduct.length; i++){
                if(item.FINALPRODUCTCODE == this.selectedProduct[i].FINALPRODUCTCODE){
                    this.selectedProduct.splice(i, 1);
                    this.insertData.splice(i, 1);
                    return;
                }
            }
        },
        loadStoreList:function (){
            axios.post('/admin/loadStoreList', {}
            ).then(response => {
                this.allStoreInfoList = response.data;
                this.store = _.uniqBy(response.data,'STORENAME');

            });
        },
        loadStoreLocationList:function (event){
            let locationList = [];
            this.allStoreInfoList.forEach(function(value,index){
                if(value.STORENAME == event.target.value){
                    locationList.push(value);
                }
            });
            this.storeLocation = locationList;
        },
        loadClassify:function (){
            axios.post('/admin/loadClassify', {}
            ).then(response => {
                this.classify = [];
                for (var i = 0; i < response.data.length; i++) {this.classify.push(response.data[i].CLASSIFYNAME);}
            });
        },
        loadCategory:function (){
            axios.post('/admin/loadCategory', this.sendData
            ).then(response => {
                this.category = [];
                for (var i = 0; i < response.data.length; i++) {this.category.push(response.data[i].PRODUCTNAME);}
            });
        },
        loadProductName:function (){
            axios.post('/admin/loadProductName', this.sendData
            ).then(response => {
                this.productName = [];
                for (var i = 0; i < response.data.length; i++) {this.productName.push(response.data[i].FINALPRODUCTNAME);}
            });
        },
        insertDB:function (){

            if(this.selectedProduct.length == 0){
                alert('추가된 상품이 없습니다.');
                return;
            }
            for(let i = 0; i<this.insertData.length; i++){
                if(this.insertData[i].length != 4){
                    alert("데이터를 다 입력해주세요");
                    return;
                }
            }//데이터가 다 들어있는지
            for(let i = 0; i<this.insertData.length; i++){
                this.insertData[i][3] = dayjs(this.insertData[i][3]).format('YYYY-MM-DD');
            }

            axios.post('/admin/insertData',{insertDataArr : this.insertData}
            ).then(response => {
                alert('판매기록이 등록되었습니다.');
            });
        }
    }
}
</script>

