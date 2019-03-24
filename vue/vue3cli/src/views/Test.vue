<template>
  <b-container>
    <b-row>
      <b-col>
        <b-form id="find_x_form" @submit="onSubmit" @reset="onReset" v-if="show">
          <b-form-group
            id="pos_label"
            label="Find X of Position:"
            label-for="pos_input"
            description="Please input position which you want to find X"
          >
            <b-form-input
              id="pos_input"
              type="number"
              v-model="form.position"
              required
              placeholder="Enter decimal number as position such as 1, 2, or etc" />
          </b-form-group>

          <b-button id="submit_btn" type="submit" variant="primary">Submit</b-button>&nbsp;
          <b-button id="reset_btn" type="reset" variant="danger">Reset</b-button>
        </b-form>
      </b-col>
    </b-row>
    <hr>
    <b-row>
      <b-col>
        <b-card
          id="answer_card"
          border-variant="primary"
          header="Answer"
          header-bg-variant="primary"
          header-text-variant="white"
          align="center"
        >
          <b-card-text id="answer_card_body">{{this.form.answer}}</b-card-text>
        </b-card>
      </b-col>
    </b-row>
    <br>
  </b-container>
</template>

<script>
export default {
  name: 'TestPage',
  data() {
    return {
      form: {
        position: 1,
        answer: '3',
      },
      show: true,
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();

      const posKey = String(this.form.position);
      let answerStr = localStorage.getItem(posKey);
      let answer = 0;

      if (!answerStr) {
        answer = (this.form.position ** 2) - this.form.position + 3;
        answerStr = String(answer);
        localStorage.setItem(posKey, answerStr);
      }

      this.form.answer = answerStr;
    },
    onReset(evt) {
      evt.preventDefault();

      this.form.position = 1;
      this.form.answer = '3';

      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>

<style scoped>

</style>
