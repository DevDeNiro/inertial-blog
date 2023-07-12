<template>
    <div>
        <h1>Login</h1>

        <section>
            <form @submit.prevent="submit">
                <div>
                    <label for="email">Email</label>
                    <input type="email" v-model="form.email" id="email" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input
                        type="password"
                        v-model="form.password"
                        id="password"
                    />
                </div>

                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </section>
    </div>
</template>

<script>
export default {
    name: "Login",
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    email: "",
    password: "",
});

let submit = () => {
    form.post("/login");
};
</script>
