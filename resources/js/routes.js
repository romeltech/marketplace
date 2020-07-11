import SellerDashboard from "./components/seller/SellerDashboard";
import SellerProducts from "./components/seller/SellerProducts";
import SellerCreateProduct from "./components/seller/SellerCreateProduct";
import SellerEditProduct from "./components/seller/SellerEditProduct";
import SellerOrders from "./components/seller/SellerOrders";
import SellerInquiries from "./components/seller/SellerInquiries";
import SellerInquiry from "./components/seller/SellerInquiry";
import SellerMessages from "./components/seller/SellerMessages";

// Buyer's Routes
import BuyerDashboard from "./components/buyer/BuyerDashboard";
import BuyerInquiries from "./components/buyer/BuyerInquiries";
import BuyerInquiry from "./components/buyer/BuyerInquiry";

export const routes = [
    /**
     * Seller
     */
    {
        path: "/seller",
        name: "SellerDashboard",
        component: SellerDashboard,
        props: true
    },
    {
        path: "/seller/dashboard",
        name: "SellerDashboard",
        component: SellerDashboard,
        props: true
    },
    {
        path: "/seller/products",
        name: "SellerProducts",
        component: SellerProducts,
        props: true
    },
    {
        path: "/seller/products/:page",
        name: "SellerProducts",
        component: SellerProducts,
        props: true
    },
    {
        path: "/seller/product/edit/:id",
        name: "SellerEditProduct",
        component: SellerEditProduct,
        props: true
    },
    {
        path: "/seller/orders",
        name: "SellerOrders",
        component: SellerOrders,
        props: true
    },
    {
        path: "/seller/inquiries",
        name: "SellerInquiries",
        component: SellerInquiries,
        props: true
    },
    {
        path: "/seller/inquiry/:id",
        name: "SellerInquiry",
        component: SellerInquiry,
        props: true
    },
    {
        path: "/seller/messages",
        name: "SellerMessages",
        component: SellerMessages,
        props: true
    },
    {
        path: "/seller/product/create",
        name: "SellerCreateProduct",
        component: SellerCreateProduct,
        props: true
    },

    /**
     * Buyer
     */
    {
        path: "/buyer/dashboard",
        name: "BuyerDashboard",
        component: BuyerDashboard,
        props: true
    },
    {
        path: "/buyer/inquiries",
        name: "BuyerInquiries",
        component: BuyerInquiries,
        props: true
    },
    {
        path: "/buyer/inquiry/:id",
        name: "BuyerInquiry",
        component: BuyerInquiry,
        props: true
    },

];
