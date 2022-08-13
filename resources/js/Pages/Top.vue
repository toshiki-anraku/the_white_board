<template>
    <!-- ページタイトル -->
    <Head title="The whitE boarD" />

    <!-- ヘッダー・フッター -->
    <BeforeAuth :can-login="canLogin" :can-register="canRegister">
        <!-- ページヘッダー -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                夢あふれる企画たち
            </h2>
        </template>

        <!-- ボディ -->
        <Body>企画一覧をここに配置</Body>
    </BeforeAuth>
</template>

<script>
import BeforeAuth from "@/Layouts/BeforeAuthentication.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Body from "@/OwnComponents/Organisms/Body.vue";

export default {
    components: {
        BeforeAuth,
        Head,
        Body,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
