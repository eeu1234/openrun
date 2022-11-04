<template>
    <h1 class="text-gray-500">{{ hello }}</h1>
    <div class="flex justify-center items-center ">
        <h1>Awesome Tailwind!!</h1>
    </div>

</template>
<script>

// import '/public/common/css/tailwindcss.css'

export default {
    setup: () => ({
        hello: '안녕하세요!!'
    })
}
</script>
