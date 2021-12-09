<template>
  <app-layout title="仪表盘">

    <!-- <header>
      <img src="https://tailwindui.com/img/components/page-headings.07-with-banner-image-xl.jpg"
           alt="">
    </header> -->

    <div>
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">页面：<span>文章管理</span></p>
      </div>

      <manage-nav></manage-nav>

      <div class="py-8 w-full">
        <div>
          <!-- <div>
            <label for="search"
                   class="block text-sm font-medium text-gray-700">Quick search</label>
            <div class="mt-1 relative flex items-center">
              <input type="text"
                     name="search"
                     id="search"
                     class="shadow-sm focus:ring-orange-500 focus:border-orange-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md" />
              <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                  ⌘K
                </kbd>
              </div>
            </div>
          </div> -->

          <div class="mb-6 flex justify-between items-center">
            <!-- <search-filter v-model="form.search"
                           class="w-full max-w-md mr-4"
                           @reset="reset">
            </search-filter> -->

            <!-- <input type="text"
                   placeholder="Search…"
                   v-model="form.search"
                   class="mt-1 focus:ring-orange-500 focus:border-orange-500 block w-1/4 shadow-sm sm:text-sm border-gray-300 rounded-md"> -->

            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center">
                <label for="state"
                       class="sr-only">状态</label>
                <select id="state"
                        name="state"
                        v-model="form.state"
                        class="focus:ring-orange-500 focus:border-orange-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                  <option value="all">全部</option>
                  <option value="publish">发表</option>
                  <option value="draft">草稿</option>
                  <option value="trash">回收站</option>
                  <option value="future">定时</option>
                  <option value="private">私有</option>

                </select>
              </div>
              <input type="text"
                     name="price"
                     id="price"
                     class="focus:ring-orange-500 focus:border-orange-500 block w-full pl-24 pr-12 sm:text-sm border-gray-300 rounded-md"
                     placeholder="搜索文章标题……"
                     v-model="form.search" />

            </div>

            <!-- <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">
                  $
                </span>
              </div>
              <input type="text"
                     name="price"
                     id="price"
                     class="focus:ring-orange-500 focus:border-orange-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                     placeholder="Search…"
                     v-model="form.search" />
              <div class="absolute inset-y-0 right-0 flex items-center">
                <label for="currency"
                       class="sr-only">Currency</label>
                <select id="currency"
                        name="currency"
                        class="focus:ring-orange-500 focus:border-orange-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                  <option>USD</option>
                  <option>CAD</option>
                  <option>EUR</option>
                </select>
              </div>
            </div> -->

          </div>

        </div>
        <ul role="list"
            class="divide-y divide-gray-200 space-y-8">
          <li class="bg-white px-4 py-4 sm:px-6 max-w-5xl mx-auto space-y-2 divide-y-2 divide-gray-100"
              v-for="(article,key) in articles.data"
              :key="key">
            <div class="flex space-x-3">
              <div class="min-w-0 flex-1">
                <p class="text-xs font-base text-gray-600 flex items-center">
                  <span v-if="article.state == 'publish'"
                        class="hover:underline">公开</span>

                  <span v-else-if="article.state == 'draft'"
                        class="hover:underline">草稿</span>
                  <span v-else-if="article.state == 'trash'"
                        class="hover:underline">回收站</span>
                  <span v-else-if="article.state == 'future'"
                        class="hover:underline">定时发布</span>
                  <span v-if="article.state == 'future'"
                        class="bg-orange-200 text-white ml-2 rounded-md px-1">{{ article.futured_at }}</span>
                  <span v-else-if="article.state == 'private'"
                        class="hover:underline">私有</span>
                </p>
              </div>
              <div class="flex-shrink-0 self-center flex">
                <Menu as="div"
                      class="relative z-30 inline-block text-left">
                  <div>
                    <MenuButton class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600">
                      <span class="sr-only">Open options</span>
                      <!-- <DotsVerticalIcon class="h-5 w-5"
                                    aria-hidden="true" /> -->

                      <ChevronDownIcon class="h-5 w-5"
                                       aria-hidden="true" />
                    </MenuButton>
                  </div>

                  <transition enter-active-class="transition ease-out duration-100"
                              enter-from-class="transform opacity-0 scale-95"
                              enter-to-class="transform opacity-100 scale-100"
                              leave-active-class="transition ease-in duration-75"
                              leave-from-class="transform opacity-100 scale-100"
                              leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <div class="py-1">
                        <MenuItem v-slot="{ active }">
                        <a href="#"
                           :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                          <StarIcon class="mr-3 h-5 w-5 text-gray-400"
                                    aria-hidden="true" />
                          <span>收藏文章</span>
                        </a>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                        <Link :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']"
                              :href="route('articles.edit', article.id)">
                        <PencilAltIcon class="mr-3 h-5 w-5 text-gray-400"
                                       aria-hidden="true" />
                        <span>编辑文章</span>
                        </Link>
                        </MenuItem>
                        <MenuItem v-slot="{ active }"
                                  v-if="article.state !== 'trash'">
                        <button type="a"
                                class="w-full block"
                                @click="confirmArticleDeletion(article)"
                                :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                          <TrashIcon class="mr-3 h-5 w-5 text-gray-400"
                                     aria-hidden="true" />
                          <span>移至回收站</span>
                        </button>
                        </MenuItem>
                        <MenuItem v-slot="{ active }"
                                  v-if="article.state == 'trash'">

                        <Link :href="route('articles.restore', article.id)"
                              method="post"
                              as="button"
                              type="button"
                              class="w-full block"
                              :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                        <SwitchHorizontalIcon class="mr-3 h-5 w-5 text-gray-400"
                                              aria-hidden="true" />
                        <span>还原</span>
                        </Link>

                        </MenuItem>

                        <MenuItem v-slot="{ active }"
                                  v-if="article.state == 'trash'">

                        <Link :href="route('articles.force_delete', article.id)"
                              method="delete"
                              as="button"
                              type="button"
                              class="w-full block"
                              :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'flex px-4 py-2 text-sm']">
                        <TrashIcon class="mr-3 h-5 w-5 text-gray-400"
                                   aria-hidden="true" />
                        <span>永久删除</span>
                        </Link>
                        </MenuItem>

                      </div>
                    </MenuItems>
                  </transition>
                </Menu>
              </div>
            </div>
            <div class="py-2">
              <h2 class=" text-lg font-medium text-gray-900 truncate">{{ article.title }}</h2>
              <p class="text-sm text-gray-500 truncate">
                {{ article.description }}
              </p>
            </div>

          </li>
        </ul>

        <Pagination :links="articles.links" />
      </div>

    </div>

    <!-- Delete Account Confirmation Modal -->
    <jet-dialog-modal :show="confirmingArticleDeletion"
                      maxWidth="xl"
                      @close="closeModal">
      <template #title>
        删除文章
      </template>

      <template #content>
        您确定要删除 <span class=" text-black font-semibold text-lg">{{ currentArticle.title }}</span> 吗？
      </template>

      <template #footer>
        <jet-secondary-button @click="closeModal">
          取消
        </jet-secondary-button>

        <jet-danger-button class="ml-2"
                           @click="deleteArticle">
          删除文章
        </jet-danger-button>
      </template>
    </jet-dialog-modal>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
import ManageNav from '../Manage/ManageNav.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { CodeIcon, DotsVerticalIcon, FlagIcon, StarIcon, ChevronDownIcon, TrashIcon, PencilAltIcon, SwitchHorizontalIcon } from '@heroicons/vue/solid'
import Pagination from '@/Shared/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import JetDangerButton from '@/Jetstream/DangerButton.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import SearchFilter from '@/Shared/SearchFilter'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
  props: {
    articles: Object,
    filters: Object
  },
  components: {
    AppLayout,
    DeleteUserForm,
    UpdateProfileInformationForm,
    UpdatePasswordForm,
    ManageNav,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    SwitchHorizontalIcon,
    PencilAltIcon,
    TrashIcon,
    CodeIcon,
    DotsVerticalIcon,
    FlagIcon,
    StarIcon,
    ChevronDownIcon,
    Pagination,
    Link,
    JetDialogModal,
    JetDangerButton,
    JetSecondaryButton,
    JetInput,
    JetInputError,
    SearchFilter
  },
  data () {
    return {
      confirmingArticleDeletion: false,
      currentArticle: null,

      // form: this.$inertia.form({
      //   search: this.filters.search,
      //   trashed: this.filters.trashed,
      // })

      form: {
        search: this.filters.search,
        state: this.filters.state,
      },
    }
  },

  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(this.route('manage.articles'), pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    confirmArticleDeletion (article) {
      this.currentArticle = article;
      this.confirmingArticleDeletion = true;
    },
    deleteArticle () {
      if (!this.currentArticle) {
        return false;
      }
      Inertia.delete(route('articles.destory', this.currentArticle.id), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
      })
    },

    closeModal () {
      this.confirmingArticleDeletion = false
      this.currentArticle = null
    },

    reset () {
      this.form = mapValues(this.form, () => null)
    },
  }
})
</script>
