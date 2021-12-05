<script>
import _ from 'lodash';
import Quill from 'quill';

import 'quill/dist/quill.snow.css';
import hljs from 'highlight.js'
import 'highlight.js/styles/idea.css'  //这里有多个样式，自己可以根据需要切换

export default {
  components: {},

  props: {
    value: {
      type: String,
      default: '',
      modelValue: String
    }
  },

  data () {
    return {
      editor: null,
      editorBody: this.body
    }
  },


  mounted () {
    this.editor = this.createEditor();

    this.handleEditorValue();

    this.editor.setContents([
      { insert: 'Hello ' },
      { insert: 'World!', attributes: { bold: true } },
      { insert: '\n' }
    ]);
  },


  /**
   * Clean after the component is destroyed.
   */
  destroyed () {
  },


  methods: {
    /**
     * Create an instance of the editor.
     */
    createEditor () {
      return new Quill(this.$refs.editor, {
        modules: {
          syntax: true,
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // 切换按钮
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // 用户自定义按钮值
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],      // 上标/下标
            [{ 'indent': '-1' }, { 'indent': '+1' }],          // 减少缩进/缩进
            [{ 'direction': 'rtl' }],                         // 文本下划线

            [{ 'size': ['small', false, 'large', 'huge'] }],  // 用户自定义下拉
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // 主题默认下拉，使用主题提供的值
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // 清除格式
          ],
        },
        theme: 'snow',
        scrollingContainer: 'html, body'
      });
    },


    /**
     * Handle the editor value.
     */
    handleEditorValue () {
      this.editor.root.innerHTML = this.value || 'Write something...';

      this.editor.on('text-change', () => {
        this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
      });
    }
  }
}
</script>

<template>
  <div class="relative">
    <div ref="editor"></div>
  </div>
</template>

<style scoped>
.ql-container {
  font-size: inherit;
}
</style>
