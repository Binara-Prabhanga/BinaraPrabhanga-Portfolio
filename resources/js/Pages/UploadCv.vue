<template>
  <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Upload Your CV (PDF)</h1>

    <form @submit.prevent="submit" enctype="multipart/form-data">
      <input type="file" @change="onFileChange" accept=".pdf" class="mb-4" />
      <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Upload CV</button>
    </form>

    <p v-if="successMessage" class="mt-4 text-green-600">{{ successMessage }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const file = ref(null)
const successMessage = ref('')

const onFileChange = (e) => {
  file.value = e.target.files[0]
}

const submit = () => {
  const formData = new FormData()
  formData.append('cv', file.value)

  router.post('/upload-cv', formData, {
    onSuccess: () => {
      successMessage.value = 'CV uploaded successfully!'
    },
  })
}
</script>
