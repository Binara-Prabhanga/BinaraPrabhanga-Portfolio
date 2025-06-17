<template>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">My Certificates</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div v-for="cert in certificates" :key="cert.id" class="bg-white p-4 rounded shadow">
                <h2 class="font-semibold mb-2">{{ cert.title }}</h2>
                <a :href="`/certificates/file/${cert.filename}`" target="_blank">
                    <div class="border rounded p-2 hover:shadow">
                        <p v-if="cert.filename.endsWith('.pdf')">📄 View PDF</p>
                        <img v-else :src="`/storage/certificates/${cert.filename}`" alt="Certificate"
                            class="w-full max-h-48 object-contain" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ certificates: Array })
</script>
