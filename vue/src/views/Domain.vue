<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <PageComponent title="Dashboard">
        <div class=" rounded-lg border-4 border-dashed border-gray-200">

            <div class="grid mx-10" v-for="item in history">
                <!-- Question Listing Item Card -->
                <div class="bg-white rounded-lg shadow-sm hover:shadow-lg duration-500 px-2 sm:px-6 md:px-2 py-4 my-6">
                    <div class="grid grid-cols-8 gap-3">
                        <!-- Meta Column -->
                        <div class="col-span-0 sm:col-span-2 text-center hidden sm:block">
                            <!-- Vote Counts -->
                            <div class="grid grid-rows-2">
                                <div class="inline-block font-medium text-xl">
                                    0
                                </div>

                                <div class="inline-block font-medium text-sm">
                                    Alerts
                                </div>
                            </div>

                            <!-- Answer Counts -->
                            <a href="#"
                                class="grid grid-rows-2 mx-auto mb-3 py-1 w-4/5 2lg:w-3/5 rounded-md bg-green-400">
                                <div class="inline-block font-medium text-2xl text-white">
                                    DNS
                                </div>

                                <div class="inline-block font-medium text-white mx-1 text-sm lg:text-md">
                                    Connected
                                </div>
                            </a>

                            <!-- View Counts -->
                            <div class="grid my-3">
                                <span class="inline-block font-bold text-xs">
                                    Locked
                                </span>
                            </div>
                        </div>

                        <!-- Summary Column -->
                        <div class="col-span-6 sm:col-start-3 sm:col-end-8 px-3 sm:px-0">
                            <div class="grid block sm:hidden">
                                <div class="flex flex-wrap">
                                    <div class="mr-2">
                                        <div class="inline-block font-light capitalize">
                                            <i class="uil uil-arrow-circle-up mr-1"></i>
                                            <span class="text-sm">
                                                0 Alerts
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mr-2">
                                        <div class="inline-block font-light capitalize">
                                            <i class="uil uil-check-circle mr-1"></i>
                                            <span class="text-sm">
                                                DNS Connected
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mr-2">
                                        <div class="inline-block">
                                            <i class="uil uil-eye mr-1"></i>
                                            <span class="text-sm capitalize font-light">
                                                Locked
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mr-2">
                                        <div class="inline-block">
                                            <i class="uil uil-clock mr-1"></i>
                                            <span class="text-sm font-light">
                                                {{ item.status.created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center hidden sm:block">
                                <span class="font-light text-gray-600">
                                    {{ item.status.created_at }}
                                </span>
                            </div>

                            <div class="mt-2">
                                <a href="#"
                                    class="sm:text-sm md:text-md lg:text-lg text-gray-700 font-bold hover:underline">
                                    {{ item.status.domain }}
                                </a>

                                <p class="mt-2 text-gray-600 text-sm md:text-md">
                                    Nameservers:
                                    <font-awesome-icon icon="fa-solid fa-shuffle" />
                                <ul class="ml-10">
                                    <li v-for="nameserver in item.nameserver.name">
                                        {{ nameserver.item }}
                                    </li>
                                </ul>
                                <br />
                                Statuses:
                                <ul class="ml-10">
                                    <li v-for="status in item.status.name">
                                        {{ status.item }}
                                    </li>
                                </ul>
                                </p>
                            </div>

                            <!-- Question Labels -->
                            <div class="grid grid-cols-2 mt-4 my-auto">
                                <!-- Categories  -->
                                <div class="col-span-12 lg:col-span-8">
                                    <a href="#" class="inline-block rounded-full text-white 
                            bg-red-400 hover:bg-red-500 duration-300 
                            text-xs font-bold 
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                            opacity-90 hover:opacity-100">
                                        Caching
                                    </a>
                                    <a href="#" class="inline-block rounded-full text-white 
                            bg-yellow-400 hover:bg-yellow-500 duration-300 
                            text-xs font-bold 
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                            opacity-90 hover:opacity-100">
                                        RabbitMQ
                                    </a>
                                    <a href="#" class="inline-block rounded-full text-white 
                            bg-green-400 hover:bg-green-500 duration-300 
                            text-xs font-bold 
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                            opacity-90 hover:opacity-100">
                                        Memcached
                                    </a>
                                    <a href="#" class="inline-block rounded-full text-white 
                            bg-blue-400 hover:bg-blue-500 duration-300 
                            text-xs font-bold 
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                            opacity-90 hover:opacity-100">
                                        Redis
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </PageComponent>
</template>

<script setup>
import PageComponent from '../components/PageComponent.vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import { off } from 'process';

const route = useRoute()
//console.log(route.params)

const domains = await axios.get(`http://localhost:8000/api/join_domain_data/${route.params.id}`)
    .then(response => response.data)
    .catch(err => console.log(err))

//console.log(domains)

const statusHistory = []
const nameserverHistory = []

domains[0].forEach(item => {
    var existing = statusHistory.filter(function (v, i) {
        return v.created_at == item.created_at
        //return v.name == item.name
    })
    if (existing.length) {
        var existingIndex = statusHistory.indexOf(existing[0])
        statusHistory[existingIndex].name.push({ 'item': item.name })

        //statusHistory[existingIndex].name = statusHistory[existingIndex].name.concat(item.name)
    } else {
        if (typeof item.name == 'string')
            item.name = [{ 'item': item.name }]
        statusHistory.push(item)
    }
})

domains[1].forEach(item => {
    var existing = nameserverHistory.filter(function (v, i) {
        return v.created_at == item.created_at
    });
    if (existing.length) {
        var existingIndex = nameserverHistory.indexOf(existing[0])
        nameserverHistory[existingIndex].name.push({ 'item': item.name })

        //nameserverHistory[existingIndex].name = nameserverHistory[existingIndex].name.concat(item.name)
    } else {
        if (typeof item.name == 'string')
            item.name = [{ 'item': item.name }]
        //item.name = [item.name]
        nameserverHistory.push(item)
    }
})

//console.log(statusHistory)
//console.log(nameserverHistory)

var history = []

statusHistory.forEach((item, index) => {

    // Datetime treatment //
    if (item !== undefined)
        item.created_at = item.created_at.replace(/T/, ' ').replace(/\..+/, '')

    if (nameserverHistory[index] !== undefined)
        nameserverHistory[index].created_at = nameserverHistory[index].created_at.replace(/T/, ' ').replace(/\..+/, '')

    var element = {
        status: item,
        nameserver: nameserverHistory[index]
    }
    history.unshift(element)
})

console.log(history)

</script>