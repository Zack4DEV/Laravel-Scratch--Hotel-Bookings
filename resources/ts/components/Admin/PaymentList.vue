<script>
import { ref } from "vue"

const searchFun = () => {
    let filter = document.getElementById("search_bar").value.toUpperCase()

    let myTable = document.getElementById("table-data")

    let tr = myTable.getElementsByTagName("tr")

    for (var i = 0; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td")[1]

        if (td) {
            let textvalue = td.textContent || td.innerHTML

            if (textvalue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = ""
            } else {
                tr[i].style.display = "none"
            }
        }
    }
}
export default {
    setup() {
        const paymentData = ref(0)
        const payment = async () => {
            try {
                const response = await fetch("/payment")
                const dataResponse = await response.json()
                paymentData.value = dataResponse
            } catch (error) {
                console.error("Error fetching payment:", error)
            }
        }
        return {
            payment,
            paymentData,
        }
    },

    data() {
        return {
            payments: [
                {
                    id: "id",
                    Name: "name",
                    RoomType: "roomtype",
                    Bed: "bed",
                    cin: "cin",
                    cout: "cout",
                    NoOfDays: "noofdays",
                    NoOfRoom: "noofroom",
                    Meal: "meal",
                    RoomTotal: "roomtotal",
                    BedTotal: "bedtotal",
                    MealTotal: "mealtotal",
                    FinalTotal: "finaltotal",
                },
            ],
        }
    },
}
</script>
<style lang="less" scoped>

:root {
    --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%),
        0 8px 16px rgb(13 0 77 / 8%);
    --bg-box-shadow: 0px 0px 20px 6px rgba(26, 30, 164, 0.31);
}
*::-webkit-scrollbar {
    width: 0.4rem;
}
*::-webkit-scrollbar-track {
    background: rgb(6, 6, 44);
}
*::-webkit-scrollbar-thumb {
    background: #0040ff;
}

body {
    background-color: #ffff;
}

* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    /* text-shadow: var(--bg-text-shadow); */
}

i {
    font-size: 20px;
}

.searchsection {
    height: 80px;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    background-color: #0a0d2d;
    position: fixed;
    z-index: 500;
}

#search_bar {
    height: 40px;
    width: 80%;
    border: none;
    background-color: rgba(195, 198, 233, 0.714);
    padding-left: 20px;
    border-radius: 30px;
}
#adduser {
    /* color: white; */
    height: 40px;
    background-color: rgb(0, 59, 254);
    border: none;
    border-radius: 30px;
    padding: 0 50px;
}
#adduser:hover {
    background-color: rgba(0, 17, 255, 0.733);
}

.exportexcel {
    height: 40px;
    width: 40px;
    background-color: rgb(47, 255, 47);
    border: none;
    border-radius: 50%;
    /* padding: 0 40px; */
}

/* guest panel */

#guestdetailpanel {
    position: fixed;
    z-index: 1000;
    height: 100%;
    width: 100%;
    display: none;
    /* display: flex; */
    justify-content: center;
    /* align-items: center; */
    background-color: #00000079;
}

#guestdetailpanel .guestdetailpanelform {
    height: 620px;
    width: 1170px;
    background-color: #ccdff4;
    border-radius: 10px;
    /* temp */
    position: relative;
    top: 20px;
    animation: guestinfoform 0.3s ease;
}
a {
    color: black;
}

@keyframes guestinfoform {
    0% {
        transform: translateY(50px);
    }
}

.guestdetailpanelform .head {
    /* width: 100%; */
    padding: 0 10px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.guestdetailpanelform .head h3 {
    color: #111f49;
    position: relative;
    left: 40%;
    margin-top: 10px;
}
.guestdetailpanelform .head i {
    font-size: 25px;
    cursor: pointer;
}

.guestdetailpanelform .middle {
    width: 100%;
    height: 500px;
    margin: 10px 0 0 0;
    display: flex;
}

.guestdetailpanelform .middle .guestinfo {
    width: 100%;
    background-color: rgba(155, 187, 255, 0.752);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.guestdetailpanelform .middle .reservationinfo {
    width: 100%;
    background-color: rgba(155, 187, 255, 0.752);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.line {
    width: 10px;
    height: 100%;
}

.guestdetailpanelform .footer {
    height: 50px;
    display: flex;
    justify-content: center;
    margin: 10px;
}

.middle .form-controls {
    width: 100%;
    border: none;
    background-color: #d1d7ff;
    padding: 10px;
    margin: 10px 0;
    border-radius: 20px;
}

.datesection {
    display: flex;
}

.datesection span {
    margin: 5px;
}

/* room book table */
.roombooktable {
    position: absolute;
    color: #0a0d2d;
    margin-top: 80px;
    width: 100%;
    height: 100vh;

    /* padding bottom to add space */
    padding-bottom: 900px;
}
.roombooktable thead {
    background-color: #0a0d2d;
    color: white;
    text-align: center;
}
.roombooktable tbody {
    text-align: center;
}

.action router-link {
    text-decoration: none;
}

.action button {
    display: flex;
    flex-wrap: wrap;
    margin: 5px;
}
</style>

<template>
    <div ref="paymentData">
        <div class="roombooktable" id="table-responsive-xl">
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Bed Type</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check In</th>
                        <th scope="col">No of Day</th>
                        <th scope="col">No of Room</th>
                        <th scope="col">Meal Type</th>
                        <th scope="col">Room Rent</th>
                        <th scope="col">Bed Rent</th>
                        <th scope="col">Meals</th>
                        <th scope="col">Total Bill</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="payment in payments"
                        :key="payment.id"
                        :value="payment.id"
                    >
                        <td>{{ id }}</td>
                        <td>{{ Name }}</td>
                        <td>{{ RoomType }}</td>
                        <td>{{ Bed }}</td>
                        <td>{{ cin }}</td>
                        <td>{{ cout }}</td>
                        <td>{{ NoOfDays }}</td>
                        <td>{{ NoOfRoom }}</td>
                        <td>{{ Meal }}</td>
                        <td>{{ RoomTotal }}</td>
                        <td>{{ BedTotal }}</td>
                        <td>{{ MealTotal }}</td>
                        <td>{{ FinalTotal }}</td>
                        <td class="action">

                            <router-link to="/invoice">
                            <button class="btn btn-primary" name="invoiceprint">
                            <i class="fa-solid fa-print">Print</i>
                            </button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
