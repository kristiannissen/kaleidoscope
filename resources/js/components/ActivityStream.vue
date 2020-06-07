<template>
  <p>Hello {{ greeting }}</p>
</template>

<script>
export default {
  data() {
    return {
      greeting: 'Pussy'
    }
  },
  mounted() {
    console.log('Hello Mounted')
  }
}
</script>