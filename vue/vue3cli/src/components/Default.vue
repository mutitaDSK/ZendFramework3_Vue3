<template>
  <div>
    <DefaultHeader></DefaultHeader>
    <router-view></router-view>
    <DefaultFooter></DefaultFooter>
  </div>
</template>

<script>
import DefaultHeader from './layouts/DefaultHeader.vue';
import DefaultFooter from './layouts/DefaultFooter.vue';

export default {
  name: 'Default',
  components: {
    DefaultHeader,
    DefaultFooter,
  },
};
</script>

<style scoped>

</style>
