import { createApp } from 'vue'
import '@/bootstrap.js';
// import '@/css/app.css'
import header_search from "@/components/user/search/header_search.vue";
import sideMenu from "@/components/user/search/sideMenu.vue";
import search_main from "@/components/user/search/search_main.vue";


createApp(header_search).mount("#header");
createApp(search_main).mount("#searchMain");
createApp(sideMenu).mount("#sideMenu");


