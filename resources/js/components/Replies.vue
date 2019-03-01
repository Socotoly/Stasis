<template>
    <div>
        <div v-for="(reply, index) in replies" :key="reply.data.id">
            <reply :reply="reply" :url="url()" @destroyed="slice(index)"></reply>
        </div>
        <new-reply @newReply="push" :url="url()"></new-reply>
    </div>
</template>
<script>
    import Reply from './Reply'
    import NewReply from './NewReply'
    export default {
        components: {Reply, NewReply},
        props: ['parent'],
        data() {
            return {
                replies: {}
            }
        },
        methods: {
            fetch() {
                axios.get(this.url()).then( (response)=>
                    this.replies = response.data.data
                )
            },
            push(reply){
                this.replies.push(reply)
            },
            slice(index){
                this.replies.splice(index, 1)
            },
            url(){
                return "/api/" + this.parent.type.toLowerCase() + "s/" + this.parent.id + "/replies"
            }
        },
        mounted(){
            this.fetch();
        }
    }

</script>