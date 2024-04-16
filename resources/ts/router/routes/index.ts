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
        path: "/dashboard",
        component: () => import("@ts/components/Admin/DashboardAdmin.vue"),
    },
    {
        path: "/roombook",
        component: () => import("@ts/components/Admin/RoombookList.vue"),
    },
    {
        path: "/roombookedit",
        component: () => import("@ts/components/Admin/RoombookEdit.vue"),
    },
    {
        path: "/payment",
        component: () => import("@ts/components/Admin/PaymentList.vue"),
    },
    {
        path: "/invoice",
        component: () => import("@ts/components/Admin/InvoicePrint.vue"),
    },
    {
        path: "/room",
        component: () => import("@ts/components/Admin/RoomShow.vue"),
    },
    {
        path: "/staff",
        component: () => import("@ts/components/Admin/StaffShow.vue"),
    },
]
export default routes
