<template>
    <Header>
      <b-navbar toggleable="lg" type="light" variant="light">
        <b-navbar-brand href="#">Frontend</b-navbar-brand>

        <b-navbar-toggle target="nav_collapse" />

        <b-collapse is-nav id="nav_collapse">
          <b-navbar-nav>
            <b-nav-item><router-link to="/">Home</router-link></b-nav-item>
            <b-nav-item><router-link to="/about">About</router-link></b-nav-item>
            <b-nav-item><router-link to="/test">Test</router-link></b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </Header>
</template>

<script>
export default {
  name: 'DefaultHeader',
};
</script>

<style scoped>

</style>
