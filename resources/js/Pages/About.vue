<template>
  <app-layout title="About">
    <div class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">页面：<span>关于博主</span></p>
      </div>
      <div class="xl:py-12 py-6">
        <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20">
          <div class="pb-6">
            <h2 class="pb-2 text-orange-600">关于博主</h2>
            <p class="text-sm">他太懒了，什么都没有留下</p>
          </div>
          <div class="xl:pb-0 xl:col-span-3 xl:row-span-2">
            <h2 class="text-xl leading-8 tracking-tight py-2">简介</h2>
            <div class="text-gray-600 prose">
              <p>网名可乐，无任何特殊含义。</p>
              <p>坐标黑龙江-黑河</p>
              <p>将代码当作爱好的老师一名</p>
            </div>

            <h2 class="text-xl leading-8 tracking-tight py-2">联系</h2>
            <div class="w-full rounded-md bg-gray-50 text-gray-600 p-8">

              <p>邮箱：***************</p>
              <p>微信：*************</p>
              <p>金钱往往能够提高效率，节省你我宝贵时间</p>
            </div>
          </div>
          <!-- <footer class="text-sm font-medium xl:col-start-1 xl:row-start-2">
            <div class="pt-24">
              <a class="text-orange-600 hover:text-orange-700"
                 href="/">← Back to the blog</a>
            </div>
          </footer> -->
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
  components: {
    AppLayout,
  },
})
</script>
