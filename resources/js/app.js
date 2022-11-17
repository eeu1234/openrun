import { createApp } from 'vue'
import Welcome from './components/Welcome.vue';
import test from './components/test.vue';
import './bootstrap';
import '../css/app.css'

createApp(Welcome).mount("#app");
createApp(test).mount("#app1");

// $(document).ready(function(){
//     $('#menu_button').click(function(){
//         $("#test").css("display","block");
//         console.log("hi");
//     });
// });
