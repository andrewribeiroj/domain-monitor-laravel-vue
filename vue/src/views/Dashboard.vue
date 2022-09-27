<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <PageComponent title="Dashboard">
        <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">

            <div class="mt-10">
                <div class="px-4 sm:px-8 max-w-5xl m-auto">
                    <h1 class="text-center font-semibold text-sm">Newest</h1>
                    <p class="mt-2 text-center text-xs mb-4 text-gray-500">Latest added domains to the API</p>
                    <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
                        <router-link v-for="item in domains.data" :key="item.value" :to="{path: '/domain/' + item.id}">
                            <li
                                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                                {{ item.domain }}
                            </li>
                        </router-link>
                    </ul>
                </div>
            </div>
        </div>
    </PageComponent>
</template>

<script setup>
import PageComponent from '../components/PageComponent.vue';
import axiosClient from '../axios';

const domains = await axiosClient.get('domains')
    .then(response => response.data)
    .catch(err => console.log(err))

</script>