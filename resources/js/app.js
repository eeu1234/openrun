import { createApp } from 'vue'

import './bootstrap';
import '../css/app.css'

//DatePicker
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


//검색 관련 뷰파일
import header_search from "./components/user/search/header_search.vue";
import search_main from "./components/user/search/search_main.vue";


//메인페이지
import calender from './components/user/calender.vue';
//상세피이지
import productView from './components/user/product/productView.vue';
import salesLog from './components/user/product/salesLog.vue';
import salesTimeline from './components/user/product/salesTimeline.vue';
//체크박스 검색페이지
import checkSearch from './components/user/search/checkSearch.vue';


// const app = createApp({});
//
// app.component('productView',productView);
//app.component('Datepicker', Datepicker);
/*

createApp(header_search).mount("#header");
createApp(calender).mount("#calender");
createApp(search_main).mount("#searchMain");
createApp(sideMenu).mount("#sideMenu");
createApp(productView).mount("#productView");
createApp(salesLog).mount("#salesLog");
createApp(salesTimeline).mount("#salesTimeline");
createApp(checkSearch).mount("#checkSearch");
*/

const app = createApp({})

// Vue.component('example-component1', require('./components/ExampleComponent1.vue').default);
app.component('header_search', header_search)
app.component('calender', calender)
app.component('search_main', search_main)
app.component('product_view', productView)
app.component('salesLog', salesLog)
app.component('salesTimeline', salesTimeline)
app.component('checkSearch', checkSearch)


app.mount('#app')
