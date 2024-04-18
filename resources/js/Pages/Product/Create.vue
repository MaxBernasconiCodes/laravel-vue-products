<script setup>

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form =  useForm({
  name: null,
  description: null,
  price: null,
  stock: null,
})

function submit() {
  router.post('/products', form)
}
</script>

<template>
<AuthenticatedLayout>
<form  @submit.prevent="submit" class="my-6 mx-auto w-64 p-4 flex flex-col justify-center items-center rounded-xl shadow-md gap-2" >
    <div>
        <InputLabel >Nombre</InputLabel>
        <TextInput id="name" name="name" required autofocus v-model="form.name" />
        <div v-if="form.errors.name">{{ form.errors.name }}</div>
    </div>
    <div>
        <InputLabel >Descripcion</InputLabel>
        <TextInput id="description"  name="description" required v-model="form.description" />
        <div v-if="form.errors.description">{{ form.errors.description }}</div>
    </div>
    <div>
        <InputLabel >Precio</InputLabel>
        <TextInput id="price" name="price"  type="number" min="0" required v-model="form.price"></TextInput>
        <div v-if="form.errors.price">{{ form.errors.price }}</div>
    </div>
    <div>
        <InputLabel >Stock Inicial</InputLabel>
        <TextInput id="stock" name="stock" type="number" min="0"   required v-model="form.stock"></TextInput>
        <div v-if="form.errors.stock">{{ form.errors.stock }}</div>
    </div>

    <button class="rounded border border-gray-400 p-2 hover:bg-slate-200 bg-slate-300"  type="submit" :disabled="form.processing">Guardar</button>
</form>
</AuthenticatedLayout>
</template>
