<template>
    <Head title="The whitE boarD" />
    <TopLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topページ
            </h2>
            <div
                class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
            >
                <div
                    v-if="canLogin"
                    class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
                >
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('mypage')"
                        class="text-sm text-gray-700 underline"
                    >
                        マイページ
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="text-sm text-gray-700 underline"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="ml-4 text-sm text-gray-700 underline"
                        >
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Topページです
                    </div>
                </div>
            </div>
        </div>
    </TopLayout>
</template>

<script>
import TopLayout from "@/Layouts/TopLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        TopLayout,
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
