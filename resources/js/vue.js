import Vue from 'vue'

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  mounted() {
    $('[data-confirm]').on('click', function () {
      return confirm($(this).data('confirm'))
    })
  }
})
