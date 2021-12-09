  <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
  <template>
  <app-layout title="编辑文章">
    <div>
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">
          页面：
          <span>编辑文章</span>
        </p>
      </div>
      <div class>
        <div class="mt-5 md:mt-0">
          <form @submit.prevent="update">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-1">
                    <label for="category"
                           class="block text-sm font-medium text-gray-700">文章分类</label>
                    <select id="category"
                            name="category"
                            v-model="form.category"
                            autocomplete="category-name"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                      <option v-for="(category,key) in categories"
                              :value="category.id"
                              :key="key">{{ category.name }}</option>
                    </select>
                  </div>
                  <div class="col-span-3 sm:col-span-2">
                    <label for="company-website"
                           class="block text-sm font-medium text-gray-700">文章标题</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input type="text"
                             name="company-website"
                             id="company-website"
                             class="focus:ring-orange-500 focus:border-orange-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                             placeholder="文章标题"
                             v-model="form.title" />
                    </div>
                    <p class="mt-2 text-sm text-red-500"
                       v-if="form.errors.title">
                      {{ form.errors.title }}
                    </p>
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700">文章封面</label>
                  <div class="mt-1 flex justify-center flex-col items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="mb-4 w-full"
                         v-show="coverPreview || form.cover">

                      <div class="block rounded w-full h-64 bg-cover bg-no-repeat bg-center"
                           v-show="coverPreview"
                           :style="'background-image: url(\'' + coverPreview + '\');'"></div>
                      <div class="block rounded w-full h-64 bg-cover bg-no-repeat bg-center"
                           v-show="!coverPreview"
                           :style="'background-image: url(\'' + form.cover + '\');'"></div>
                    </div>
                    <div class="space-y-1 text-center flex-shrink-0">
                      <svg v-show="!coverPreview"
                           class="mx-auto h-12 w-12 text-gray-400"
                           stroke="currentColor"
                           fill="none"
                           viewBox="0 0 48 48"
                           aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round" />
                      </svg>
                      <div class="flex text-sm text-gray-600">
                        <label for="cover-upload"
                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus:outline-none">
                          <span>上传图片</span>
                          <input type="file"
                                 id="cover-upload"
                                 @input="cform.cover = $event.target.files[0]"
                                 @change="updateCoverPreview"
                                 ref="cover"
                                 class="sr-only" />
                        </label>
                        <p class="pl-1">
                          or
                          <button @click.prevent="deleteCover">删除图片</button>
                        </p>
                      </div>
                      <p class="text-xs text-gray-500">PNG, JPG, GIF 不大于 10MB</p>
                    </div>
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="description"
                         class="block text-sm font-medium text-gray-700">文章摘要</label>
                  <textarea name="description"
                            id="description"
                            class="mt-1 focus:ring-orange-500 focus:border-orange-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                            cols="30"
                            rows="3"
                            placeholder="文章摘要"
                            v-model="form.description"></textarea>
                  <!-- <input type="text"
                         id="description"
                         class="mt-1 focus:ring-orange-500 focus:border-orange-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                         placeholder="文章摘要"
                         v-model="form.description"> -->

                  <p class="mt-2 text-sm text-gray-500">
                    文章摘要请控制在 100 字以内
                  </p>
                </div>

                <div id="editor">
                  <label for="markdown-editor"
                         class="block text-sm font-medium text-gray-700">内容</label>
                  <div class="mt-1">
                    <!-- <textarea id="about"
                              name="markdown"
                              class="h-64 shadow-sm focus:ring-orange-500 focus:border-orange-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                              placeholder="you@example.com"
                              :value="form.markdown"
                    @input="update" />-->
                    <textarea id="markdown-editor"
                              spellcheck="false"
                              class="w-full font-mono text-sm leading-loose outline-none resize-none shadow-sm focus:ring-orange-500 focus:border-orange-500 border border-gray-300 rounded-md"
                              cols="30"
                              rows="10"
                              v-model="form.markdown"
                              placeholder="写点什么……"></textarea>
                  </div>
                  <!-- <div v-html="compiledMarkdown"></div> -->
                  <p class="mt-2 text-sm text-gray-500 flex justify-between items-center">
                    <span class="text-xs sm:text-sm">请使用 markdown 来输入您的内容，点击右侧小眼睛来预览您的内容</span>
                    <button type="button"
                            @click="open = true"
                            class="inline-flex">
                      <svg xmlns="http://www.w3.org/2000/svg"
                           class="h-5 w-5"
                           fill="none"
                           viewBox="0 0 24 24"
                           stroke="currentColor"
                           title="预览">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                  </p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <!-- <label for="top"
                  class="block text-sm font-medium text-gray-700">是否置顶</label>-->

                  <div class="flex items-start mt-2">
                    <div class="flex items-center h-5">
                      <jet-checkbox name="is_top"
                                    v-model:checked="form.is_top"
                                    class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 rounded" />
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="comments"
                             class="font-medium text-gray-700">设为置顶</label>
                      <p class="text-gray-500">置顶会显示在文章列表的最上方</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <TransitionRoot as="template"
                    :show="open">
      <Dialog as="div"
              class="fixed inset-0 overflow-hidden"
              @close="open = false">
        <div class="absolute inset-0 overflow-hidden">
          <TransitionChild as="template"
                           enter="ease-in-out duration-500"
                           enter-from="opacity-0"
                           enter-to="opacity-100"
                           leave="ease-in-out duration-500"
                           leave-from="opacity-100"
                           leave-to="opacity-0">
            <DialogOverlay class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
          </TransitionChild>
          <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
            <TransitionChild as="template"
                             enter="transform transition ease-in-out duration-500 sm:duration-700"
                             enter-from="translate-x-full"
                             enter-to="translate-x-0"
                             leave="transform transition ease-in-out duration-500 sm:duration-700"
                             leave-from="translate-x-0"
                             leave-to="translate-x-full">
              <div class="relative w-screen max-w-3xl">
                <TransitionChild as="template"
                                 enter="ease-in-out duration-500"
                                 enter-from="opacity-0"
                                 enter-to="opacity-100"
                                 leave="ease-in-out duration-500"
                                 leave-from="opacity-100"
                                 leave-to="opacity-0">
                  <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
                    <button type="button"
                            class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                            @click="open = false">
                      <span class="sr-only">Close panel</span>
                      <XIcon class="h-6 w-6"
                             aria-hidden="true" />
                    </button>
                  </div>
                </TransitionChild>
                <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
                  <div class="px-4 sm:px-6">
                    <DialogTitle class="text-2xl font-medium text-gray-900">{{ form.title }}</DialogTitle>
                  </div>
                  <div class="mt-6 relative flex-1 px-4 sm:px-6">
                    <!-- Replace with your content -->
                    <div class="absolute inset-0 px-4 sm:px-6">
                      <div class="h-full prose prose-orange"
                           aria-hidden="true"
                           v-html="compiledMarkdown" />
                    </div>
                    <!-- /End replace -->
                  </div>
                </div>
              </div>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </app-layout>
</template>

<script>
import _ from "lodash";
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { marked } from 'marked';
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XIcon } from '@heroicons/vue/outline'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import { useForm } from '@inertiajs/inertia-vue3'

export default defineComponent({
  props: {
    article: Object,
    categories: Array
  },
  components: {
    AppLayout,
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
    JetCheckbox
  },
  data () {
    return {
      ready: false,
      status: '',

      coverPreview: null,

      errors: [],

      form: this.$inertia.form({
        title: this.article.title,
        slug: this.article.slug,
        markdown: this.article.markdown,
        description: this.article.description,
        category: this.article.category_id,
        is_top: this.article.is_top ? true : false,
        cover: this.article.cover,
        content: this.article.content,
      }),
    };
  },
  created () {
    this.form.content = this.compiledMarkdown
  },
  computed: {
    //渲染markdown
    compiledMarkdown () {
      return marked(this.form.markdown, {
        langPrefix: 'hljs language-', // highlight.js css expects a top-level 'hljs' class.
        pedantic: false,
        gfm: true,
        breaks: false,
        sanitize: false,
        smartLists: true,
        smartypants: false,
        xhtml: false
      });
    }
  },
  mounted () {
    //markdown 自适应高度
    this.$nextTick(() => {
      this.textarea = document.getElementById("markdown-editor");
      var heightLimit = 2000;

      this.textarea.style.height =
        Math.min(this.textarea.scrollHeight, heightLimit) + "px";

      if (this.textarea) {
        this.textarea.style.height =
          Math.min(this.textarea.scrollHeight, heightLimit) + "px";

        this.textarea.oninput = () => {
          this.textarea.style.height = "";
          this.textarea.style.height =
            Math.min(this.textarea.scrollHeight, heightLimit) +
            "px";
        };

        this.textarea.addEventListener("paste", this.onPaste);
      }
    });
  },

  destroyed () {
    if (this.textarea) {
      this.textarea.removeEventListener("paste", this.onPaste);
    }
  },
  methods: {
    //删除文章封面预览
    deleteCover () {
      this.coverPreview = null;
      if (this.$refs.cover?.value) {
        this.$refs.cover.value = null;
      }
    },
    //更新文章封面预览
    updateCoverPreview () {
      const cover = this.$refs.cover.files[0];

      if (!cover) return;

      const reader = new FileReader();

      reader.onload = (e) => {
        this.coverPreview = e.target.result;
      };

      reader.readAsDataURL(cover);
    },
    //提交表单
    update () {

      this.form.content = this.compiledMarkdown

      if (this.coverPreview) {
        this.form.cover = this.$refs.cover.files[0]
      }

      console.log(this.form);

      this.form.post(this.route('articles.update', this.article.id))

    },
    // update: _.debounce(function (e) {
    //   this.form.markdown = e.target.value;
    // }, 300),
    onPaste (e) {
      if (e.clipboardData && e.clipboardData.items) {
        var items = e.clipboardData.items;
        for (var i = 0; i < items.length; i++) {
          if (items[i].type.indexOf("image") !== -1) {
            const image = items[i].getAsFile();
            this.uploadPastedImage(image);
            e.preventDefault();
          }
        }
      }
    },

    uploadPastedImage (image) {
      let formData = new FormData();

      formData.append("image", image, image.name);

      const placeholder = `![Uploading ${image.name}…]()`;

      this.insertAtCursor(placeholder);

      this.http()
        .post("/update/image/markdown", formData, {
          onUploadProgress: progressEvent => {
            this.uploadProgress = Math.round(
              (progressEvent.loaded * 100) / progressEvent.total
            );
          }
        })
        .then(({ data }) => {
          this.insertImage(placeholder, data.url);
        })
        .catch(error => {
          console.log(error);
        });
    },


    insertAtCursor (text) {
      var isSuccessful;
      this.textarea.focus();

      isSuccessful = document.execCommand(
        "insertText",
        false,
        text
      );

      // Firefox (non-standard method)
      if (!isSuccessful && typeof input.setRangeText === "function") {
        const start = input.selectionStart;
        input.setRangeText(text);
        // update cursor to be at the end of insertion
        input.selectionStart = input.selectionEnd = start + text.length;

        // Notify any possible listeners of the change
        const e = document.createEvent("UIEvent");
        e.initEvent("input", true, false);
        input.dispatchEvent(e);
      }
    },


    insertImage (placeholder, url) {
      this.markdown = this.markdown.replace(
        placeholder,
        `![image](${url} "image")`
      );
    }
  },
  setup () {
    const open = ref(false)
    const cform = useForm({
      cover: null,
    })

    function uploadCover () {
      console.log(111111)
      cform.post('/update/image/cover', {
        preserveScroll: true,
        onSuccess: () => console.log(222),
      })
    }
    return {
      cform,
      open,
      uploadCover
    }
  }
})
</script>