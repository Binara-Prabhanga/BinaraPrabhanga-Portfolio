<template>
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded">
        <h2 class="text-xl font-bold mb-4">Upload Certificate</h2>
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <input v-model="form.title" type="text" placeholder="Certificate Title"
                class="w-full border p-2 mb-2 rounded" />
            <input type="file" @change="onFileChange" class="mb-2" />
            <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Upload</button>
        </form>
        <p v-if="message" class="text-green-600 mt-2">{{ message }}</p>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const form = ref({ title: '' })
const file = ref(null)
const message = ref('')

const onFileChange = (e) => {
    file.value = e.target.files[0]
}

const submit = () => {
    const formData = new FormData()
    formData.append('title', form.value.title)
    formData.append('file', file.value)

    router.post('/upload-certificate', formData, {
        onSuccess: () => {
            message.value = 'Certificate uploaded!'
            form.value.title = ''
        }
    })
}
</script>
