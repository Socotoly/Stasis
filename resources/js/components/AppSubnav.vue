<template>
    <div class="mb-4">
        <div class="text-center">
            <a :href="this.url"><h3 class="text-center" v-text="this.name"></h3></a>
            <span class="text-center" v-text="this.type"></span>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="#">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">People</a>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: ['name', 'type', 'url']
    }
</script>