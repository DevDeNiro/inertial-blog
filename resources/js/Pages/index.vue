<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Hello {{ name }}</h1>
                <a :href="route('second')">Go to second page</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    props: {
        name: String,
    },
};
</script>
