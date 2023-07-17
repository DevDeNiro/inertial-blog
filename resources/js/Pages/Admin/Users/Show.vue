<template>
    <div>
        <h1>Détails de l'utilisateur</h1>
        <p>Nom : {{ user.name }}</p>
        <p>Email : {{ user.email }}</p>
    </div>
</template>

<script>
export default {
    props: {
        user: Object,
    },
};
</script>
