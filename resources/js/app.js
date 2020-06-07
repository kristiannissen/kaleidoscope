/**
 * @file
 */

require('./bootstrap');

Vue.component(
  'activity-stream',
  require('./components/ActivityStream').default
)

const app = new Vue({
  el: '#app'
})