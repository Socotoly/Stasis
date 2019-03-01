<template>
    <div>
        <app-subnav name="56" type="jkhk" :url="url"></app-subnav>
        <hr/>
        <h3 v-text="task.title"></h3>
        <br/>
        <p class="pl-5" v-if="task.description" v-text="task.description"></p>
        <p v-else >No description</p>
        <br/>
        <br/>
        <hr/>
        <br/>
        <replies :parent="task"></replies>
    </div>
</template>
<script>
    import Replies from '../components/Replies';
    export default {
        props: ['item'],
        components: {
            Replies
        },
        data() {
            return {
                task: this.item
            }
        },
        computed: {
            url(){
                return "/"+this.task.top_parent.type.toLowerCase()+"s/"+this.task.top_parent.id
            }
        }
    }
</script>c