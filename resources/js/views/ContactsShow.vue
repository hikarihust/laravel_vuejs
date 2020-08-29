<template>

</template>

<script>
    export default {
        name: "ContactsShow",

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response => {
                    this.contact = response.data.data;
                })
                .catch(error => {
                    if (error.response.status === 404) {
                        this.$router.push('/contacts');
                    }
                });
        },

        data: function () {
            return {
                contact: null,
            }
        },
    }
</script>

<style scoped>

</style>
