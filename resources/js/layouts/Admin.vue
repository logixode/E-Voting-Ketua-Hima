<template>
  <main>
    <p>asd</p>
    <slot></slot>
  </main>
</template>

<script>
export default {
  props: ['title'],
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = "E-Voting | " + title
      }
    }
  }

}
</script>

<style>

</style>