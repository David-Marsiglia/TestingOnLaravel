import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';
import TheCategoryList from './components/category/TheCategoryList.vue';
import CategoryModal from './components/category/CategoryModal.vue';
import BackendError from './components/Components/BackendError.vue';

const app = createApp({
	components: {
		TheCategoryList,
		CategoryModal,
	}
});


app.component('v-select', vSelect);
app.component('backend-error', BackendError);
app.mount('#app');
