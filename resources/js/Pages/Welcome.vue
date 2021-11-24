<template>
  <app-layout title="Home">
    <div class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">All the latest Tailwind CSS news, straight from the team.</p>
      </div>
      <ul class="divide-y divide-gray-200">
        <li class="py-12">
          <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
            <dl>
              <dt class="sr-only">发表于</dt>
              <dd class="text-base font-medium text-gray-500"><time datetime="2021-08-11T19:30:00.000Z">一年前</time></dd>
            </dl>
            <div class="space-y-5 xl:col-span-3">
              <div class="space-y-6">
                <h2 class="text-2xl font-bold tracking-tight">
                  <Link :href="route('articles.show', 1)"
                        class="text-gray-900">Introducing Tailwind UI Ecommerce</Link>
                </h2>
                <div class="prose max-w-none text-gray-500">
                  <div class="prose max-w-none">
                    <p>Almost 6 months in the making, we finally released <a href="https://tailwindui.com/#product-ecommerce">Tailwind UI Ecommerce</a> — the first all-new component kit for Tailwind UI since the initial launch back in February 2020.</p>
                  </div>
                </div>
              </div>
              <div class="text-base font-medium">
                <Link :href="route('articles.show', 1)"
                      class="text-orange-600 hover:text-orange-700">阅读更多 →</Link>
              </div>
            </div>
          </article>
        </li>

      </ul>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  components: {
    AppLayout,
    Link
  },
})
</script>
