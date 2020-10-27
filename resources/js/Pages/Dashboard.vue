<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-center flex-wrap">
                        <a href="/" class="bg-orange-500 text-white p-20 m-5 rounded-lg">
                            صفحه اصلی
                        </a>

                        <a href="/categories/create" class="bg-green-500 text-white p-20 m-5 rounded-lg">
                          افزودن دسته بندی
                        </a>

                        <a href="/cards/create" class="bg-teal-500 text-white p-20 m-5 rounded-lg">
                          افزودن کارت
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import Welcome from './../Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
