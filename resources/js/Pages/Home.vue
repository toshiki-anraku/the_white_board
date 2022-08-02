<template>
    <div>
        <h1>サンプルページ</h1>
        <P>{{time}}</P>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    export default defineComponent({
        components: {
            ActionMessage,
        },
        props: {
            time: String,
        }
    })
</script>
