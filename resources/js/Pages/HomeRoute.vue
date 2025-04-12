<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/HOME"> Take me to Test page </router-link>
        <button @click.prevent="tiggerEndpoint">Trigger Endpoint</button>
        <p v-if="response">{{ response.data }}</p>
    </div>
</template>