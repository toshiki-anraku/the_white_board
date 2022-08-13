<template>
    <!-- ページタイトル -->
    <Head title="MY PAGE" />

    <!-- ヘッダー・フッター -->
    <BreezeAuthenticatedLayout>
        <!-- ページヘッダー -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                マイページ
            </h2>
        </template>

        <!-- プロフィール表示 -->
        <ProfileCard />

        <!-- ボディ -->
        <Body>投稿した企画の一覧をここに配置</Body>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Body from "@/OwnComponents/Organisms/Body.vue";
import ProfileCard from "@/OwnComponents/Organisms/ProfileCard.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Body,
        ProfileCard,
    },
};
</script>
