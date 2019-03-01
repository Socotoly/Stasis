<template>
    <div>
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <span v-text="data.title"></span>
    </div>
</template>

<script>
    export default {
        props: ['task'],
        data() {
            return {
                data: this.task.data,
                meta: this.task.meta
            }
        }
    }
</script>