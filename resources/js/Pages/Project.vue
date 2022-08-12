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
            <div class="flex">
                <p class="text-h6 mt-3 mb-1 mx-3">飼育日誌システム化企画</p>
                <p class="text-subtitle-1 mt-3 mb-1 mx-3">ー 動物 ー</p>
            </div>
            <div class="flex">
                <p class="text-subtitle-2 mt-1 mx-3">いいね 1345</p>
                <p class="text-subtitle-2 mt-1 mx-3">お気に入り 136</p>
                <p class="text-subtitle-2 mt-1 mx-3">コメント 136</p>
                <v-avatar
                    class="ml-3 mt-1"
                    color="grey lighten-2"
                    size="16"
                ></v-avatar>
            </div>
            <v-container>
                <v-row>
                    <v-col cols="3"
                        ><v-card outlined tile height="100">img1</v-card></v-col
                    >
                    <v-col cols="3"
                        ><v-card outlined tile height="100">img2</v-card></v-col
                    >
                    <v-col cols="3"
                        ><v-card outlined tile height="100">img3</v-card></v-col
                    >
                    <v-col cols="3"
                        ><v-card outlined tile height="100">img4</v-card></v-col
                    >
                </v-row>
            </v-container>
            <p class="text-subtitle-1 mt-3 mx-3">詳細</p>
            <v-container>
                <v-row>
                    <v-col cols="12">
                        <v-card outlined tile body-1 height="300" class="pa-8">
                            サファリパークでの日々の記録は紙媒体で管理している園館が多いのが現状となっている。
                            紙媒体での管理だと保管場所が圧迫されてきてしまうのと情報を見直したい場合に探し出すのに膨大な時間が掛かってしまう。
                            そこで飼育日誌をシステム化し、情報の活用がしやすくするために本企画を投稿致します。...
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-container>
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
