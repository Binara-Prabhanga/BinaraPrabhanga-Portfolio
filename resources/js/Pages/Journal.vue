<template>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Reflective Journal</h1>

        <!-- Create Form -->
        <form
            @submit.prevent="saveEntry"
            class="space-y-4 bg-white p-4 rounded shadow"
        >
            <input
                v-model="form.title"
                type="text"
                placeholder="Title"
                class="w-full border p-2 rounded"
            />
            <textarea
                v-model="form.content"
                placeholder="Write your thoughts..."
                class="w-full border p-2 rounded"
            ></textarea>
            <input v-model="form.date" type="date" class="border p-2 rounded" />
            <button
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                type="submit"
            >
                {{ editingId ? "Update" : "Add" }} Entry
            </button>
        </form>

        <!-- Journal List -->
        <div
            v-for="entry in entries"
            :key="entry.id"
            class="mt-6 p-4 border rounded bg-gray-50 shadow"
        >
            <h2 class="font-bold text-xl">{{ entry.title }}</h2>
            <p class="text-sm text-gray-600">{{ entry.date }}</p>
            <p class="mt-2">{{ entry.content }}</p>
            <div class="mt-2 space-x-2">
                <button @click="editEntry(entry)" class="text-blue-600">
                    Edit
                </button>
                <button @click="deleteEntry(entry.id)" class="text-red-600">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const entries = ref([]);
const form = ref({
    title: "",
    content: "",
    date: "",
});
const editingId = ref(null);

const loadEntries = async () => {
    const res = await axios.get("/api/journals");
    entries.value = res.data;
};

const saveEntry = async () => {
    if (editingId.value) {
        await axios.put(`/api/journals/${editingId.value}`, form.value);
    } else {
        await axios.post("/api/journals", form.value);
    }
    resetForm();
    loadEntries();
};

const editEntry = (entry) => {
    form.value = { ...entry };
    editingId.value = entry.id;
};

const deleteEntry = async (id) => {
    await axios.delete(`/api/journals/${id}`);
    loadEntries();
};

const resetForm = () => {
    form.value = { title: "", content: "", date: "" };
    editingId.value = null;
};

onMounted(loadEntries);
</script>
