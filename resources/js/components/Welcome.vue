<template>
    <h1 class="text-gray-500 flex justify-center items-center">{{ hello }}</h1>
    <div class="flex justify-center items-center ">
        <h1>Awesome Tailwind!!</h1>
    </div>

    <div v-for="store in stores" class="flex justify-center items-center">
        <div class=" ">{{store.STORECODE}}</div>
        <div class="">{{store.STORENAME}}</div>
    </div>
</template>
<script>

// import '/public/common/css/tailwindcss.css'

export default {
    setup: () => ({
        hello: '안녕하세요!!'
    }),
    data: () => ({
        stores: [],
    }),
    created() {
        this.getStoreList();
        console.log(this.getStoreList());
    },
    methods: {
        getStoreList() {
            axios.post('./store', {}
            ).then(response => {
                console.log(response.data);
                this.stores = response.data;

            });

        },

    }
}

</script>
