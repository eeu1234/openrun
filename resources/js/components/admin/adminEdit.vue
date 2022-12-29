<template>
<!--    <div @click = "test" class = "w-3/12 py-2 text-center float-right border-2 border-black m-3 rounded-2xl ">상품검색</div>-->
<!--    <div class = "clear-both"></div>-->
    <div class = "border-2 border-black w-11/12 m-auto z-50 mb-10 py-4 px-2 mt-4">
        <div class = "w-full text-xs text-center my-4"></div>
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
                    <img class = "h-full" src="/img/classic_medium_bag.jpg">
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
            </div>
        </div>
    </div>
    <div class = "border-2 border-black w-full py-4 z-1">
        <p v-if="selectedProduct.length == 0" id ="notice" class = "text-center">추가된 상품이 없습니다.</p>
        <div v-if="selectedProduct.length > 0" class = "repeatComponent w-full border " >
            <div v-for="(item,index) in selectedProduct">
                <div class = "w-full  mt-4 my-2">
                    <div class = "float-left w-1/4">
                        <img class = "h-full" src="/img/classic_medium_bag.jpg">
                    </div>
                    <div id="productInfo" class = "float-left pl-4 w-3/4 text-left">
                        <div class=" w-full text-xs tracking-wide font-medium">Chanel</div>
                        <div class=" w-full text-base tracking-wide font-medium">가브리엘 스트랩 호보 클래식 미디움</div>
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
                                    <select v-model = "insertData[index][0]" class = "w-full float-left my-1 bg-slate-200 rounded">
                                        <option v-for="item in  store">{{item}}</option>
                                    </select>
                                </td>
                                <td class = "px-1 border">
                                    <select v-model = "insertData[index][1]" class = "float-left my-1 w-full bg-slate-200 rounded">
                                        <option v-for="item in  storeLocation">{{item}}</option>
                                    </select>

                                </td>
                                <td class = "px-1 border">
                                    <datepicker  v-model = "insertData[index][2]" class="float-left my-1 w-full"></datepicker>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div @click="delProduct(item)" class = "w-12 mx-3 my-4 h-10 float-left bg-slate-200 border-slate-300 p-2 rounded-xl">제거</div>
                        <div class = "clear-both"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "float-right px-5 py-1 mx-4 mt-4 border rounded bg-slate-200 border-slate-300">등록</div>
        <div class="clear-both"></div>
    </div>




</template>

<script>
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { ref, onMounted } from 'vue';
import dayjs from "dayjs";
// import vSelect from 'vue-select'
// import 'vue-select/dist/vue-select.css';


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
        store:['갤러리아백화점','롯데백화점','샤넬플러그쉽','신세계백화점','현대백화점'],
        storeLocation:['강남점','대구점','명동본점','센텀시티','압구정점','잠실월드몰점','청담점']
    }),
    watch: {
        // sendData: {
        //     handler() {
        //         this.loadCategory();
        //         console.log('test');
        //     },
        //     deep: true
        // }
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
        }
    },

    created() {
        this.loadClassify();
    },
    mounted(){
    },
    methods:{
        test:function(){
            console.log(this.insertData);
            console.log(this.selectedProduct);

        },
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
            this.insertData.push([]);
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
            axios.post('/admin/insertData', this.insertData
            ).then(response => {

            });
        }
    }
}
</script>

