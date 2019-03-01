<template>
    <div>
        <div class="d-flex flex-row p-2 bd-highlight" @mouseover="icon = true" @mouseleave="icon = false">
            <div class="media mr-auto">
                <img class="mr-3" src="#" width="48" height="48">
                <div class="media-body">
                    <h5 class="my-2" v-text="reply.data.creator.name"></h5>
                    <div class="p-2 bd-highlight" v-if="! editing">
                        <div v-html="form.body"></div>
                    </div>
                    <div v-else>
                        <form @submit.prevent="update">
                            <div class="form-group">
                                <textarea class="form-control"
                                          name="body"
                                          v-model="form.body">
                                </textarea>
                            </div>
                            <button class="btn btn-success" :disabled="empty">Edit</button>
                            <button class="btn btn-link" type="button" @click="cancel">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="d-flex">
                <span v-text="createdDate" class="pr-3"></span>

                <div v-show="icon && !editing">
                    <a href="#" @click.prevent="editing = true" class="pl-1">
                        <Icon type="md-create" size="20"></Icon>
                    </a>
                    <a href="#" @click.prevent="destroy">
                        <Icon type="md-trash" size="20"></Icon>
                    </a>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <hr/>
    </div>
</template>
<script>
    export default {
        props: ['reply'],
        data() {
            return {
                editing: false,
                form: {
                    body: this.reply.data.body
                },
                icon: false,
                meta: this.reply.meta
            }
        },
        computed: {
            createdDate() {
                return moment(this.reply.data.updated_at.date).calendar()
            },
            empty() {
                return !this.form.body
            }
        },
        methods: {
            update() {
                axios.patch(this.meta.links.api, this.form).then((res) => {
                    this.editing = false;
                    this.$notify.success('Your reply has been updated')
                }).catch((err) => {
                    this.$notify.error('Error')
                })
            },
            cancel() {
                this.editing = false;
                this.form.body = this.reply.body
            },
            destroy() {
                axios.delete(this.meta.links.api).then(
                    this.$emit('destroyed', this.reply.id),
                    this.$notify.success('your reply has been deleted')
                ).catch((err) => {
                    this.$notify.error('Error')
                })
            }
        }
    }
</script>