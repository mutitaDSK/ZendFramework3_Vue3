<template>
  <b-container>
    <b-row><b-col>
      <h1 id="restaurants_header">List of Bang Sue Restaurants</h1>
    </b-col></b-row>
    <hr>
    <div v-for="restaurant in this.restaurants" :key="restaurant.id">
      <b-row>
        <b-col>
          <b-card-group id="restaurants_list" deck>
            <b-card
              border-variant="secondary"
              header-border-variant="secondary"
              align="center"
            >
              <b-card-title>{{restaurant.name}}</b-card-title>
              <b-card-text>
                {{restaurant.vicinity}}
              </b-card-text>
            </b-card>
            <br>
          </b-card-group>
        </b-col>
      </b-row>
      <br>
    </div>

  </b-container>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Place',
  data() {
    return {
      restaurants: [],
      errors: [],
    };
  },
  created() {
    const restaurantsBangSueKey = 'restaurantsBangSueJSONSTR';
    const url = 'http://0.0.0.0:8081/restaurants/bangsue';

    let restaurantsBangSueJSONSTR = localStorage.getItem(restaurantsBangSueKey);

    if (restaurantsBangSueJSONSTR) {
      this.restaurants = JSON.parse(restaurantsBangSueJSONSTR);
      return;
    }

    axios.get(url).then((response) => {
      const responseData = response.data;

      if (responseData && responseData.results) {
        responseData.results.forEach((restaurant) => {
          const restaurantInfo = {
            id: restaurant.id,
            name: restaurant.name,
            vicinity: restaurant.vicinity,
          };
          this.restaurants.push(restaurantInfo);
        });
      }
      restaurantsBangSueJSONSTR = JSON.stringify(this.restaurants);

      localStorage.setItem(restaurantsBangSueKey, restaurantsBangSueJSONSTR);
    }).catch((e) => {
      this.errors.push(e);
    });
  },
};
</script>

<style scoped>

</style>
