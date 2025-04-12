<template>
    <div>
        <h2>Islam</h2>
        <router-link to="/test">Take me to Test page</router-link>
        <button @click.prevent="triggerEndpoint">Trigger Endpoint</button>
        <p v-if="response">{{ response.data }}</p>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";

export default {
    setup() {
        // Define a reactive variable for the response
        const response = ref(null);

        // Function to trigger the API call
        const triggerEndpoint = async () => {
            try {
                response.value = await axios.get("/api/test-me");
                alert('API call successful!');
            } catch (error) {
                console.error("Error triggering endpoint:", error);
            }
        };

        // Expose the reactive variables and methods to the template
        return {
            response,
            triggerEndpoint,
        };
    },
};
</script>