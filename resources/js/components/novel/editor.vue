<template>
  <div>
    <v-text-field label="Зохиолын гарчиг" :rules="rules" hide-details="auto"></v-text-field>
    <v-text-field label="Зохиолын бүлэг, анги эсвэл нэмэлт нэршил /Хооосон орхиж болно/"></v-text-field>
    <vue-editor class="editor-pack" v-model="content" :editor-toolbar="customToolbar"></vue-editor>
    <v-alert dark type="info">{{content}}</v-alert>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
// Advanced Use - Hook into Quill's API for Custom Functionality
export default {
  components: {
    VueEditor
  },
  data: () => ({
    content: "",
    rules: [
      value => !!value || "Required.",
      value => (value && value.length >= 3) || "Min 3 characters"
    ],
    customToolbar: [
      ["bold", "italic", "underline"],
      [{ list: "ordered" }, { list: "bullet" }],
      ["image", "code-block"]
    ]
  })
};
</script>

<style>
@import "~vue2-editor/dist/vue2-editor.css";
/* Import the Quill styles you want */
@import "~quill/dist/quill.core.css";
@import "~quill/dist/quill.bubble.css";
@import "~quill/dist/quill.snow.css";
.editor-pack {
  height: 50%;
}
</style>
