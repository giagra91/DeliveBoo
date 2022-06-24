import Vue from 'vue';
import VueRouter from 'vue-router';

// components
import Menu from './pages/Menu';
import Restaurants from './pages/Restaurants';

Vue.use(VueRouter);

// routes
const router = new VueRouter({
	mode: 'history',
	routes : [
			{
					path: '/menu',
					name: 'menu',
					component: Menu
			},
			{
					path: '/restaurants',
					name: 'restaurants',
					component: Restaurants
			},
			// {
			// 		path: '/about-us',
			// 		name: 'about-us',
			// 		component: AboutUs
			// },
			// {
			// 	path: '/posts/:id',
			// 	name: 'post_detail',
			// 	component: PostDetail
			// },
			// {
			// 	path: '/contact',
			// 	name: 'contact-us',
			// 	component: Contact
			// }
	]
});

export default router;

