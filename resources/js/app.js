/**
 * @file
 */

require('./bootstrap');

Vue.prototype.http = axios;

Vue.component(
  'activity-stream',
  require('./components/ActivityStream').default
)

const app = new Vue({
  el: '#app'
})
