<template>
    <!-- ページタイトル -->
    <Head title="The whitE boarD" />

    <!-- ヘッダー・フッター -->
    <TopLayout :can-login="canLogin" :can-register="canRegister">
        <!-- ボディタイトル -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topページ
            </h2>
        </template>

        <!-- ボディ -->
        <Body>トップページです</Body>
    </TopLayout>
</template>

<script>
import TopLayout from "@/Layouts/TopLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Body from "@/OwnComponents/Organisms/Body.vue";

export default {
    components: {
        TopLayout,
        Head,
        Body,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
