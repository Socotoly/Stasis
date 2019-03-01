<template>
    <form @submit.prevent="addReply">
        <div class="form-group">
            <textarea class="form-control"
                      name="body"
                      v-model="reply.body"
                      :rows="rows"
                      @focus="editing"
                      placeholder="Add you comment here.">

            </textarea>
        </div>
        <button class="btn btn-success" v-show="edit" :disabled="empty">Post</button>
        <button class="btn btn-link" type="button" @click="cancel" v-show="edit">Cancel</button>
    </form>
</template>
<script>
    export default {
        props: ['url'],
        data() {
            return {
                reply: {
                    body: "",
                },
                rows: 2,
                edit: false,
            }
        },
        computed: {
          empty(){
              return ! this.reply.body
          }
        },
        methods: {
            addReply() {
                axios.post(this.url, this.reply).then((res) => {
                    this.reply.body = "";
                    this.cancel();
                    this.$emit('newReply', res.data);
                    this.$notify.success('Your reply has been submitted');
                }).catch((res) => {
                    console.log(res)
                })
            },
            cancel() {
                this.edit = false;
                this.rows = 2
            },
            editing() {
                this.edit = true;
                this.rows = 5
            }
        }
    }
</script>