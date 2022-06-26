import Vue from 'vue';
import VueRouter from 'vue-router';

// components
import Menu from './pages/Menu';
import Restaurants from './pages/Restaurants';
import Payment from './checkout/Payment';
import Checkout from './checkout/Checkout.vue';
import Thanks from './pages/Thanks.vue'

Vue.use(VueRouter);

// routes
const router = new VueRouter({
	mode: 'history',
	routes : [
			{
					path: '/menu/:id',
					name: 'menu',
					component: Menu
			},
			{
					path: '/restaurants',
					name: 'restaurants',
					component: Restaurants
			},
			{
				path: '/payment',
				name: 'payment',
				component: Payment
			},
			{
				path: '/checkout',
				name: 'checkout',
				component: Checkout
			},
			{
				path: '/thanks',
				name: 'Thanks',
				component: Thanks
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

