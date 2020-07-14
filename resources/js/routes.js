import SellerDashboard from "./components/seller/SellerDashboard";
import SellerProducts from "./components/seller/SellerProducts";
import SellerCreateProduct from "./components/seller/SellerCreateProduct";
import SellerEditProduct from "./components/seller/SellerEditProduct";
import SellerOrders from "./components/seller/SellerOrders";
import SellerLeads from "./components/seller/SellerLeads";
import SellerLead from "./components/seller/SellerLead";
import SellerMessages from "./components/seller/SellerMessages";

// Buyer's Routes
import BuyerDashboard from "./components/buyer/BuyerDashboard";
import BuyerInquiries from "./components/buyer/BuyerInquiries";
import BuyerInquiry from "./components/buyer/BuyerInquiry";

// Admin's Routes
import AdminDashboard from "./components/admin/AdminDashboard";
import AdminMessages from "./components/admin/AdminMessages";
import AdminMessage from "./components/admin/AdminMessage";

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
        path: "/seller/leads",
        name: "SellerLeads",
        component: SellerLeads,
        props: true
    },
    {
        path: "/seller/lead/:id",
        name: "SellerLead",
        component: SellerLead,
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

    /**
     * Admin
     */
    {
        path: "/admin/dashboard",
        name: "AdminDashboard",
        component: AdminDashboard,
        props: true
    },
    {
        path: "/admin/messages",
        name: "AdminMessages",
        component: AdminMessages,
    },
    {
        path: "/admin/message/:id",
        name: "AdminMessage",
        component: AdminMessage,
    },

];
