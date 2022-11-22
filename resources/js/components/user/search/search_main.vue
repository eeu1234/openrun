<template>
    <div class = "w-100 h-full p-20">
        <div id = "searchArea" class = "w-full  pb-20">
            <input class = "h-20 w-10/12 float-left border-2 rounded-2xl text-black" type = "text" placeholder="    검색어를 입력하세요">
            <div id = "searchButton_with_logo" class = "float-right w-28 h-20 text-4xl py-4 px-0.5 border-2 rounded-2xl bg-slate-300">search</div>
            <div class = clear-both></div>
        </div>
        <div id = "resultArea" class = "w-full">
            <div id = "headInfo" class = "border-b-2">
                <span>검색결과: 총 3건</span>
            </div>
            <div id = "repeatComponent" class = "mx-5">
                <div id = "repeatComponent" class = "w-full h-44 my-4">
                    <div id="productImg" class = "float-left w-1/4 h-full">
                        <img class = "h-full" src="/img/classic_medium_bag.jpg">
                    </div>
                    <div id="productInfo" class = "float-left pl-12 w-3/4 h-full">
                        <div class="h-1/5 w-full text-xl tracking-wide font-medium">chanel</div>
                        <div class="h-2/5 w-full text-4xl tracking-wide font-medium" style = "line-height:4rem;">Classic Medium bag</div>
                        <div class="h-1/5 w-full text-xl tracking-wide text-slate-400">블랙 캐비어</div>
                        <div class="h-1/5 w-full text-xl tracking-wide text-slate-400">금장</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


