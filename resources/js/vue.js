import Vue from 'vue'
// Import vue-goodshare single elements
import VueGoodshareFacebook from "vue-goodshare/src/providers/Facebook.vue";
import VueGoodshareTwitter from "vue-goodshare/src/providers/Twitter.vue";
import VueGoodshareGooglePlus from "vue-goodshare/src/providers/GooglePlus";
import VueGoodshareWhatsApp from "vue-goodshare/src/providers/WhatsApp"

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
      VueGoodshareFacebook,
      VueGoodshareTwitter,
      VueGoodshareGooglePlus,
      VueGoodshareWhatsApp
  },

  mounted() {
    $('[data-confirm]').on('click', function () {
      return confirm($(this).data('confirm'))
    })
  }
})
