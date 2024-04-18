<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps({ products: Array })
</script>

<template>
<AuthenticatedLayout>
   <ul>
    <li v-for="product in products" > {{ product.name }} |{{ product.description }} | {{ product.price }} | {{ product.stock }}</li>
   </ul>
</AuthenticatedLayout>
</template>
