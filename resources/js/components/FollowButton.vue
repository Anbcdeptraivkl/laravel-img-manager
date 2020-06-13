<template>
    <div>
        <!--Updating Text based on Follwoing Status of User-Profile-->
        <button type="button" class="btn btn-success mr-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: [
            'userId',
            'followed'
        ],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.followed
            }
        },

        methods: {
            followUser() {
                axios.post("/follow/" + this.userId)
                    .then(response => {
                        // Toggle Follow Status
                        this.status = !this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        // Handling authenticating Errors
                        if (errors.response.status == 401) {
                            // Redirect if the Viewer is currently not Logging in but is trying to follow:
                            window.location = '/login';
                        }
                    });
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>
