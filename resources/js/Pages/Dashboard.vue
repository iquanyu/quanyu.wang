<template>
  <app-layout title="仪表盘">

    <!-- <header>
      <img src="https://tailwindui.com/img/components/page-headings.07-with-banner-image-xl.jpg"
           alt="">
    </header> -->

    <div>
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">页面：<span>仪表盘</span></p>
      </div>

      <div>
        <div class="flex items-center justify-start border-b-2 border-gray-200 space-x-4">
          <div class="inline-flex items-center  px-2 pt-1 pb-4 cursor-pointer border-b-2 text-orange-600 border-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6 mr-2"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>个人信息</span>
          </div>

          <div class="inline-flex items-center text-gray-600 px-2 pt-1 pb-4 cursor-pointer hover:text-orange-600 hover:border-b-2 border-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6 mr-2"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <span>My Apple</span>
          </div>
        </div>

        <div class="h-auto py-10">
          <div v-if="$page.props.jetstream.canUpdateProfileInformation">
            <update-profile-information-form :user="$page.props.user" />

            <jet-section-border />
          </div>

          <div v-if="$page.props.jetstream.canUpdatePassword">
            <update-password-form class="mt-10 sm:mt-0" />

            <jet-section-border />
          </div>
          <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
            <jet-section-border />

            <delete-user-form class="mt-10 sm:mt-10" />
          </template>
        </div>
      </div>
    </div>
    <!-- <header>
      <div class="h-36 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500">
      </div>

      <div class="max-w-5xl mx-auto lg:px-24 px-12 bg-white">
        <div class="flex items-center justify-between">
          <div class="flex">
            <img :src="$page.props.user.profile_photo_url"
                 alt=""
                 class="w-24 rounded-full transform -translate-y-1/2 border-4 border-white">
            <p class="text-lg px-4 py-2 font-bold">{{ $page.props.user.name }}</p>
          </div>
        </div>

        <div>
          <div class="flex items-center justify-start border-b-2 border-gray-200 space-x-4">
            <div class="inline-flex items-center px-2 pt-1 pb-4 cursor-pointer hover:text-orange-600 hover:border-b-2 border-orange-600">My Apple</div>
            <div class="inline-flex items-center px-2 pt-1 pb-4 cursor-pointer border-b-2 text-orange-600 border-orange-600">My Ipad</div>
          </div>

          <div class="h-24"></div>
        </div>
      </div>
    </header> -->
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'

export default defineComponent({
  components: {
    AppLayout,
    DeleteUserForm,
    UpdateProfileInformationForm,
    UpdatePasswordForm
  },
})
</script>
