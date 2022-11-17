import { createApp } from 'vue'
import '@/bootstrap.js';
// import '@/../css/app.css'
import header_search from "@/components/user/search/header_search.vue";
import sideMenu from "@/components/user/search/sideMenu.vue";

createApp(header_search).mount("#app");
createApp(sideMenu).mount("#app1");


