<template>
    <div>
        <h1>Liste des utilisateurs</h1>
        <ul>
            <li v-for="user in users" :key="user.id">
                <router-link
                    :to="{ name: 'admin.users.show', params: { id: user.id } }"
                >
                    {{ user.name }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        users: Array,
    },
};
</script>
