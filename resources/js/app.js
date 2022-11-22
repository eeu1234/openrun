import { createApp } from 'vue'
import Welcome from './components/Welcome.vue';
import productView from './components/user/product/productView.vue';
import test from './components/test.vue';
import './bootstrap';
import '../css/app.css'

//createApp(Welcome).mount("#app");
const app = createApp({});
//createApp(productView).mount("#productView");
app.component('productView',productView);
// $(document).ready(function(){
//     $('#menu_button').click(function(){
//         $("#test").css("display","block");
//         console.log("hi");
//     });
// });
