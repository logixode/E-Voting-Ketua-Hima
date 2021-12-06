<template>
  <Admin title="Home">
    <div class="">Hello World!</div>
    <p>{{ $page.props.auth }}</p>
    <!-- <p>{{ is }}</p> -->
    <button type="submit">logout</button>
  </Admin>
</template>

<script>
import Admin from "../layouts/Admin";
export default {
  components: { Admin }
};
</script>

<style>
</style>