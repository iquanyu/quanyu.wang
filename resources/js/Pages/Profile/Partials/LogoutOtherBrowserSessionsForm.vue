<template>
  <jet-action-section>
    <template #title>
      浏览器会话
    </template>

    <template #description>
      管理并注销其他浏览器和设备上的活动会话。
    </template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        如有必要，您可以在所有设备上注销所有其他浏览器会话。下面列出了您最近的一些会话；但是，该列表可能并不详尽。如果您觉得您的帐户已被泄露，您还应该更新您的密码。
      </div>

      <!-- Other Browser Sessions -->
      <div class="mt-5 space-y-6"
           v-if="sessions.length > 0">
        <div class="flex items-center"
             v-for="(session, i) in sessions"
             :key="i">
          <div>
            <svg fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 class="w-8 h-8 text-gray-500"
                 v-if="session.agent.is_desktop">
              <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 stroke-width="2"
                 stroke="currentColor"
                 fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 class="w-8 h-8 text-gray-500"
                 v-else>
              <path d="M0 0h24v24H0z"
                    stroke="none"></path>
              <rect x="7"
                    y="4"
                    width="10"
                    height="16"
                    rx="1"></rect>
              <path d="M11 5h2M12 17v.01"></path>
            </svg>
          </div>

          <div class="ml-3">
            <div class="text-sm text-gray-600">
              {{ session.agent.platform }} - {{ session.agent.browser }}
            </div>

            <div>
              <div class="text-xs text-gray-500">
                {{ session.ip_address }},

                <span class="text-green-500 font-semibold"
                      v-if="session.is_current_device">当前设备</span>
                <span v-else>上次活动 {{ session.last_active }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex items-center mt-5">
        <jet-button @click="confirmLogout">
          注销其他浏览器会话
        </jet-button>

        <jet-action-message :on="form.recentlySuccessful"
                            class="ml-3">
          完成.
        </jet-action-message>
      </div>

      <!-- Log Out Other Devices Confirmation Modal -->
      <jet-dialog-modal :show="confirmingLogout"
                        @close="closeModal">
        <template #title>
          注销其他浏览器会话
        </template>

        <template #content>
          请输入密码以确认是否要在所有设备上注销其他浏览器会话。

          <div class="mt-4">
            <jet-input type="password"
                       class="mt-1 block w-3/4"
                       placeholder="密码"
                       ref="password"
                       v-model="form.password"
                       @keyup.enter="logoutOtherBrowserSessions" />

            <jet-input-error :message="form.errors.password"
                             class="mt-2" />
          </div>
        </template>

        <template #footer>
          <jet-secondary-button @click="closeModal">
            取消
          </jet-secondary-button>

          <jet-button class="ml-2"
                      @click="logoutOtherBrowserSessions"
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing">
            注销其他浏览器会话
          </jet-button>
        </template>
      </jet-dialog-modal>
    </template>
  </jet-action-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetActionSection from '@/Jetstream/ActionSection.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default defineComponent({
  props: ['sessions'],

  components: {
    JetActionMessage,
    JetActionSection,
    JetButton,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetSecondaryButton,
  },

  data () {
    return {
      confirmingLogout: false,

      form: this.$inertia.form({
        password: '',
      })
    }
  },

  methods: {
    confirmLogout () {
      this.confirmingLogout = true

      setTimeout(() => this.$refs.password.focus(), 250)
    },

    logoutOtherBrowserSessions () {
      this.form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => this.$refs.password.focus(),
        onFinish: () => this.form.reset(),
      })
    },

    closeModal () {
      this.confirmingLogout = false

      this.form.reset()
    },
  },
})
</script>
