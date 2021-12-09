<template>
  <app-layout title="仪表盘">

    <div class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">页面：<span>关于博主</span></p>
      </div>

      <div>
        <manage-nav></manage-nav>

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
        <!-- <div class="py-12 w-full">
          <div class="flow-root">
            <ul role="list"
                class="-mb-8">
              <li>
                <div class="relative pb-8">
                  <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                        aria-hidden="true"></span>
                  <div class="relative flex items-start space-x-3">
                    <div class="relative">
                      <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white"
                           src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                           alt="" />

                      <span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                        <svg class="h-5 w-5 text-gray-400"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor"
                             aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd" />
                        </svg>
                      </span>
                    </div>
                    <div class="min-w-0 flex-1">
                      <div>
                        <div class="text-sm">
                          <a href="#"
                             class="font-medium text-gray-900">Eduardo Benz</a>
                        </div>
                        <p class="mt-0.5 text-sm text-gray-500">评论于 1小时之前</p>
                      </div>
                      <div class="mt-2 text-sm text-gray-700">
                        <p>为什么有些方法文档里找不到.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="relative pb-8">
                  <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                        aria-hidden="true"></span>
                  <div class="relative flex items-start space-x-3">
                    <div>
                      <div class="relative px-1">
                        <div class="h-8 w-8 bg-gray-100 rounded-full ring-8 ring-white flex items-center justify-center">
                          <svg class="h-5 w-5 text-gray-500"
                               xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20"
                               fill="currentColor"
                               aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                  clip-rule="evenodd" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="min-w-0 flex-1 py-1.5">
                      <div class="text-sm text-gray-500">
                        <a href="#"
                           class="font-medium text-gray-900">Me</a>
                        发表了文章
                        <a href="#"
                           class="font-medium text-gray-900">Authorization Login</a>
                        <span class="ml-2 whitespace-nowrap">2小时以前</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="relative pb-8">
                  <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200"
                        aria-hidden="true"></span>
                  <div class="relative flex items-start space-x-3">
                    <div>
                      <div class="relative px-1">
                        <div class="h-8 w-8 bg-gray-100 rounded-full ring-8 ring-white flex items-center justify-center">
                          <svg class="h-5 w-5 text-gray-500"
                               xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20"
                               fill="currentColor"
                               aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                  clip-rule="evenodd" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="min-w-0 flex-1 py-0">
                      <div class="text-sm leading-8 text-gray-500">
                        <span class="mr-0.5">
                          <a href="#"
                             class="font-medium text-gray-900">Me</a>
                          新增了分类
                        </span>
                        <span class="mr-0.5">
                          <a href="#"
                             class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                            <span class="absolute flex-shrink-0 flex items-center justify-center">
                              <span class="h-1.5 w-1.5 rounded-full bg-rose-500"
                                    aria-hidden="true"></span>
                            </span>
                            <span class="ml-3.5 font-medium text-gray-900">Laravel</span>
                          </a>
                          <a href="#"
                             class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 text-sm">
                            <span class="absolute flex-shrink-0 flex items-center justify-center">
                              <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"
                                    aria-hidden="true"></span>
                            </span>
                            <span class="ml-3.5 font-medium text-gray-900">Vue</span>
                          </a>
                        </span>
                        <span class="ml-2 whitespace-nowrap">6小时以前</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="relative pb-8">
                  <div class="relative flex items-start space-x-3">
                    <div>
                      <div class="relative px-1">
                        <div class="h-8 w-8 bg-gray-100 rounded-full ring-8 ring-white flex items-center justify-center">
                          <svg class="h-5 w-5 text-gray-500"
                               xmlns="http://www.w3.org/2000/svg"
                               viewBox="0 0 20 20"
                               fill="currentColor"
                               aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                  clip-rule="evenodd"></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="min-w-0 flex-1 py-0">
                      <div class="text-sm leading-8 text-gray-500"><span class="mr-0.5"><a href="#"
                             class="font-medium text-gray-900">Me</a> 新建了网站 </span>
                        <span class="ml-2 whitespace-nowrap">6小时以前</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>
          </div>
        </div> -->
      </div>
    </div>

  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import ManageNav from './Manage/ManageNav.vue'

export default defineComponent({
  components: {
    AppLayout,
    ManageNav
  },
})
</script>
