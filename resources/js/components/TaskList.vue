<template>
    <div class="mb-2">
        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light flex-row justify-content-start">
            <button class="btn btn-default btn-sm mr-2" type="button" @click="toggle" v-text="expandBtn"></button>
            <h4 v-text="data.title"></h4>

        </nav>
        <p v-text="data.description"></p>
        <!--<div class="collapse" >-->
            <!--<div class="card card-body">-->
                <!--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.-->
            <!--</div>-->
        <!--</div>-->
        <div v-show="expanded" class="ml-5 my-3">
            <div v-if="show">
                <div v-for="(task, index) in data.tasks" :key="task.data.id">
                    <task :task="task">

                    </task>
                </div>
            </div>

            <div v-else class="justify-content-center text-center">
                <p>There's no Active Tasks in this list.</p>
                <button class="btn btn-primary btn-sm">Add Task</button>
            </div>
        </div>

    </div>
</template>

<script>
    import Task from "./Task";

    export default {
        components: {Task},
        props: ['list','index'],

        data(){
            return {
                data: this.list.data,
                meta: this.list.meta,
                expanded: true,
                expandBtn: '+',
                show: false
            }
        },
        created() {
            this.hasTasks();
            this.shouldExpand()
        },
        methods: {
            hasTasks(){
                return this.show = this.data.tasks.length !== 0
            },
            shouldExpand(){
                this.expanded = (this.index <= 3);
                this.expandBtn = (this.expanded) ? '-' : '+'
            },
            toggle(){
                this.expanded = !this.expanded;
                this.expandBtn = (this.expanded) ? '-' : '+'
            }
        }
    }
</script>