<template>
    <div>
        <app-sidebar>

        </app-sidebar>
        <app-subnav name="fregree" type="wwwww" url="dsf">

        </app-subnav>
        <div class="d-flex flex-row">
            <h3 class="mr-auto">Task Lists</h3>
            <button class="btn btn-success justify-content-end">Add List</button>
        </div>
        <br/>
        <div v-for="(item, index) in items" :key="item.data.id">
            <task-list :list="item" :index="index">
            </task-list>
        </div>
    </div>
</template>
<script>
    import TaskList from "./TaskList";

    export default {
        components: {TaskList},
        data() {
            return {
                items: ''
            }
        },
        created() {
            this.fetch();
        },
        methods: {
            fetch() {
                axios.get(`/api${location.pathname}`).then(this.refresh);
            },
            url() {
                return `/api/${location.pathname}`;
            },
            refresh({data}) {
                this.items = data.data;
            }
        },

    }
</script>
