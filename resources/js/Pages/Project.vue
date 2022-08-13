<template>
    <!-- ページタイトル -->
    <Head title="プロジェクトCRUD" />

    <!-- ヘッダー・フッター -->
    <BeforeAuth :can-login="canLogin" :can-register="canRegister">
        <!-- ページヘッダー -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                プロジェクトCRUDページ
            </h2>
        </template>

        <!-- ボディ -->
        <v-container>
            <!-- タイトル/ジャンル -->
            <TitleGenre />
            <!-- いいね/お気に入り/コメント/鍵付きユーザー -->
            <LikeFavoriteCommentAvatar />
            <!-- 画像リスト -->
            <FourImg />
            <!-- 企画詳細 -->
            <ProjectDetail />
        </v-container>
    </BeforeAuth>
</template>

<script>
import BeforeAuth from "@/Layouts/BeforeAuthentication.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Body from "@/OwnComponents/Organisms/Body.vue";
import FourImg from "@/OwnComponents/Organisms/FourImg.vue";
import ProjectDetail from "../OwnComponents/Organisms/ProjectDetail.vue";
import LikeFavoriteCommentAvatar from "../OwnComponents/Organisms/LikeFavoriteCommentAvatar.vue";
import TitleGenre from "../OwnComponents/Organisms/TitleGenre.vue";

export default {
    components: {
        BeforeAuth,
        Head,
        Body,
        FourImg,
        ProjectDetail,
        LikeFavoriteCommentAvatar,
        TitleGenre,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
