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
        <div class="flex justify-center mt-12">
            <v-avatar color="grey lighten-2" size="175">
                <v-img :src="'/img/defaultIcon.jpeg'"></v-img>
            </v-avatar>
            <v-list-item class="text-dimgray">
                <v-list-item-content>
                    <v-list-item-title>Marcus Obrien</v-list-item-title>
                    <v-list-item-subtitle
                        >渋谷のIT企業でWebエンジニアをしております。<br />最近はTypeScript,Reactの勉強をしていることが多いです。</v-list-item-subtitle
                    >
                </v-list-item-content>
            </v-list-item>
        </div>

        <!-- ボディ -->
        <Body>投稿した企画の一覧をここに配置</Body>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Body from "@/OwnComponents/Organisms/Body.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Body,
    },
};
</script>
