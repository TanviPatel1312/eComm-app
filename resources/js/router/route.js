import home from "../components/home.vue";
import about from "../components/about.vue";
import contact from "../components/contact";
import category from "../components/category";
import productDetail from "../components/productDetail";

const routes = [
    {
        path: '/',
        name: 'home',
        component:home,
    },
    {
        path: '/about',
        name: 'about',
        component:about,
    },
    {
        path: '/contact',
        name: 'contact',
        component:contact,
    },
    {
        path: '/category',
        name: 'category',
        component:category,
    },
    {
        path: '/productDetail',
        name: 'productDetail',
        component:productDetail,
    },
];
export default routes;


