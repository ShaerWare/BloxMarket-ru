<script setup>

import { Head } from "@inertiajs/vue3";


defineProps(["title", "description", "start_date"]);
</script>

<template>
        <div class="text-center pt-5">
            <h1>{{ title }}</h1>
            <p>{{ description }}</p>
            <p>Start Date: {{ start_date }}</p>
        </div>
</template>
