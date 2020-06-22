import SellerDashboard from './components/seller/SellerDashboard';
import SellerProducts from './components/seller/SellerProducts';
import SellerCreateProduct from './components/seller/SellerCreateProduct';
import SellerOrders from './components/seller/SellerOrders';
import SellerInquiries from './components/seller/SellerInquiries';
import SellerMessages from './components/seller/SellerMessages';

export const routes = [
    {
        path: '/seller',
        name: 'SellerDashboard',
        component: SellerDashboard,
        props: true
    },
    {
        path: '/seller/dashboard',
        name: 'SellerDashboard',
        component: SellerDashboard,
        props: true
    },
    {
        path: '/seller/products',
        name: 'SellerProducts',
        component: SellerProducts,
        props: true
    },
    {
        path: '/seller/products/:page',
        name: 'SellerProducts',
        component: SellerProducts,
        props: true
    },
    {
        path: '/seller/orders',
        name: 'SellerOrders',
        component: SellerOrders,
        props: true
    },
    {
        path: '/seller/inquiries',
        name: 'SellerInquiries',
        component: SellerInquiries,
        props: true
    },
    {
        path: '/seller/messages',
        name: 'SellerMessages',
        component: SellerMessages,
        props: true
    },

    /**
     * Actions
     */
    {
        path: '/seller/product/create',
        name: 'SellerCreateProduct',
        component: SellerCreateProduct,
        props: true
    },
]
