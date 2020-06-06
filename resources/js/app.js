/**
 * @file
 */

require('./bootstrap');

Vue.component(
  'hello',
  require('./components/Hello').default
)

const app = new Vue({
  el: '#app'
})