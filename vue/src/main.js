import { createApp } from 'vue'
import store from './store'
import router from './router'
import './index.css'
import App from './App.vue'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faShuffle } from '@fortawesome/free-solid-svg-icons'
library.add(faShuffle)



createApp(App)
    .use(store)
    .use(router)
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')
