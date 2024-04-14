<script>
import { ref } from "vue"

var detailpanel = global.document.getElementById("roombook")

adduseropen = () => {
    detailpanel.style.display = "flex"
}
adduserclose = () => {
    detailpanel.style.display = "none"
}

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
        const roombookData = ref(0)
        const roombook = async () => {
            try {
                const response = await fetch("roombook")
                const dataResponse = await response.json()
                roombookData.value = dataResponse
            } catch (error) {
                console.error("Error fetching roombook:", error)
            }
        }
        return {
            roombook,
            roombookData,
        }
    },

    data() {
        return {
            roombooks: [
                {
                    id: "id",
                    Name: "name",
                    Email: "email",
                    Phone: "phone",
                    Country: "country",
                    RoomType: "roomtype",
                    Bed: "bed",
                    NoOfRoom: "noofroom",
                    Meal: "meal",
                    cin: "cin",
                    cout: "cout",
                    NoOfDays: "noofdays",
                    Status: "NotConfirm|Confirm",
                },
            ],
            countries: [
                "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
            ]
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

#roombook {
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

#roombook .roombookform {
    height: 620px;
    width: 1170px;
    background-color: #ccdff4;
    border-radius: 10px;
    /* temp */
    position: relative;
    top: 20px;
    animation: roombookform 0.3s ease;
}
a {
    color: black;
}

@keyframes roombookform {
    0% {
        transform: translateY(50px);
    }
}

.roombookform .head {
    /* width: 100%; */
    padding: 0 10px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.roombookform .head h3 {
    color: #111f49;
    position: relative;
    left: 40%;
    margin-top: 10px;
}
.roombookform .head i {
    font-size: 25px;
    cursor: pointer;
}

.roombookform .middle {
    width: 100%;
    height: 500px;
    margin: 10px 0 0 0;
    display: flex;
}

.roombookform .middle .roombookinfo {
    width: 100%;
    background-color: rgba(155, 187, 255, 0.752);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.roombookform .middle .reservationinfo {
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

.roombookform .footer {
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

.action {
    text-decoration: none;
}

.action button {
    display: flex;
    flex-wrap: wrap;
    margin: 5px;
}
</style>

<template>
    <div ref="roombookData">
        <div class="roombooksubmit">
            <form id="roombookform" method="POST" class="roombookform">
                <div class="head">
                    <h3>RESERVATION</h3>
                    <i
                        class="fa-solid fa-circle-xmark"
                        onclick="adduserclose()"
                    ></i>
                </div>
                <div class="middle">
                    <div class="roombookinfo">
                        <h4>Guest information</h4>
                        <input
                            class="form-controls"
                            v-model="Name"
                            type="text"
                            name="Name"
                            placeholder="Enter Full name"
                            required
                        />
                        <input
                            class="form-controls"
                            v-model="Email"
                            type="email"
                            name="Email"
                            placeholder="Enter Email"
                            required
                        />
                        <select
                                    name="Country"
                                    class="form-controls"
                                    v-model="Country"
                                >
                                    <option value selected>
                                        Select your country
                                    </option>
                                    <option value="Country">
                                     {{ countries }}
                                    </option>
                                </select><input
                            class="form-controls"
                            v-model="Phone"
                            type="text"
                            name="Phone"
                            placeholder="Enter Phoneno"
                            required
                        />
                    </div>
                    <div class="line"></div>

                    <div class="reservationinfo">
                        <h4>Reservation information</h4>
                        <select
                            name="RoomType"
                            class="form-controls"
                            v-model="RoomType"
                        >
                            <option value selected>Type Of Room</option>
                            <option value="Superior Room">SUPERIOR ROOM</option>
                            <option value="Deluxe Room">DELUXE ROOM</option>
                            <option value="Guest House">GUEST HOUSE</option>
                            <option value="Single Room">SINGLE ROOM</option>
                        </select>
                        <select name="Bed" class="form-controls" v-model="Bed">
                            <option value selected>Bedding Type</option>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Quad">Quad</option>
                        </select>
                        <select
                            name="NoofRoom"
                            class="form-controls"
                            v-model="NoOfRoom"
                        >
                            <option value selected>No of Room</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <select
                            name="Meal"
                            class="form-controls"
                            v-model="Meal"
                        >
                            <option value selected>Meal</option>
                            <option value="Room only">Room only</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Half Board">Half Board</option>
                            <option value="Full Board">Full Board</option>
                        </select>
                        <div class="datesection">
                            <span>
                                <label for="cin"> Check-In</label>
                                <input
                                    class="form-controls"
                                    v-model="cin"
                                    name="cin"
                                    type="date"
                                />
                            </span>
                            <span>
                                <label for="cin"> Check-Out</label>
                                <input
                                    class="form-controls"
                                    v-model="cout"
                                    name="cout"
                                    type="date"
                                />
                            </span>
                        </div>
                    </div>
                    <div class="footer"><router-link to="/roombook">
                    <button class="btn btn-success" name="roombookform">
                    Submit
                </button>
                </router-link>
                    </div>
                </div>
            </form>
        </div>

        <!-- Roombook Search -->
        <div class="searchsection">
            <input
                type="text"
                name="search_bar"
                id="search_bar"
                placeholder="search..."
                onkeyup="searchFun()"
            />
            <router-link to="/roombook/add">
                    <button class="adduser" id="adduser" onclick="adduseropen()">
                    Add
                </button>
                <i class="fa-solid fa-bookmark"></i>Add
                </router-link>
            <form id="exportroombook" method="post">
                <router-link to="/exportdata/">

<button class="exportexcel"
                    name="exportexcelbutton"
                    id="exportexcel"
                    type="submit">
                    Export
                </button>
                <i class="fa-solid fa-file-arrow-down"></i>
                </router-link>
            </form>
        </div>

        <!-- Roombook Table -->
        <div class="roombooktable" id="table-responsive-xl">
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Type of Room</th>
                        <th scope="col">Type of Bed</th>
                        <th scope="col">No of Room</th>
                        <th scope="col">Meal</th>
                        <th scope="col">Check-In</th>
                        <th scope="col">Check-Out</th>
                        <th scope="col">No of Day</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="action">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="roombook in roombooks"
                        :key="roombook.id"
                        :value="roombook.id"
                    >
                        <td>{{ id }}</td>
                        <td>{{ Name }}</td>
                        <td>{{ Email }}</td>
                        <td>{{ Country }}</td>
                        <td>{{ Phone }}</td>
                        <td>{{ RoomType }}</td>
                        <td>{{ Bed }}</td>
                        <td>{{ NoOfRoom }}</td>
                        <td>{{ Meal }}</td>
                        <td>{{ cin }}</td>
                        <td>{{ cout }}</td>
                        <td>{{ NoOfDays }}</td>
                        <td>{{ Stat }}</td>
                        <td class="action">
                <router-link to="/roombook/confirm">
                <button class="btn btn-success" name="confirmroombook">
                    Confirm
                </button>
                </router-link>
                <router-link to="/roombook/edit">
                    <button class="btn btn-success" name="editroombook">
                    Edit
                </button>
                </router-link>
                <router-link to="/roombook/delete">
                    <button class="btn btn-success" name="deleteroombook">
                    Delete
                </button>
                </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
