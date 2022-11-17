<template>
    <h1 class="text-gray-500 flex justify-center items-center">{{ hello }}</h1>
    <div class="flex justify-center items-center ">
        <h1>Awesome Tailwind!!</h1>
    </div>
    <div id = "test" style = "width:100px; height:100px; display: none; background-color:red;">영광</div>
</template>
<script>

export default {
    setup: () => ({
        hello: '안녕하세요!!'
    })
}
</script>
