const routes = [
    {
        path: "/",
        component: () => import("@ts/components/LoginUsers.vue"),
    },
    {
        path: "/home",
        component: () => import("@ts/components/UserBooking.vue"),
    },
    {
        path: "/admin/",
        redirect: "/admin/dashboard",
        component: () => import("@ts/components/Admin/AdminBooking.vue"),
    },
    {
        path: "/admin/dashboard",
        component: () => import("@ts/components/Admin/DashboardAdmin.vue"),
    },
    {
        path: "/admin/roombook",
        component: () => import("@ts/components/Admin/RoombookList.vue"),
    },
    {
        path: "/admin/roombookedit",
        component: () => import("@ts/components/Admin/RoombookEdit.vue"),
    },
    {
        path: "/admin/payment",
        component: () => import("@ts/components/Admin/PaymentList.vue"),
    },
    {
        path: "/admin/invoice",
        component: () => import("@ts/components/Admin/InvoicePrint.vue"),
    },
    {
        path: "/admin/room",
        component: () => import("@ts/components/Admin/RoomShow.vue"),
    },
    {
        path: "/admin/staff",
        component: () => import("@ts/components/Admin/StaffShow.vue"),
    },
]
export default routes
