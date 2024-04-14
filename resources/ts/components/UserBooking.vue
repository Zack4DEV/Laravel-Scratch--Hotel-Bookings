<script>
var bookbox = document.getElementById("roombook");

openbookbox = () => {
        bookbox.style.display = "flex";
    }
closebox = () => {
        bookbox.style.display = "none";
    }

import { ref } from "vue"
import { isArray } from '../utils/is';

export default {
    setup() {
        const userData = ref(0)
        const user = async () => {
            try {
                const response = await fetch("/home")
                const dataResponse = await response.json()
                userData.value = dataResponse
            } catch (error) {
                console.error("Error fetching user:", error)
            }
        }
        return {
            user,
            userData,
        }
    },
    data() {
        return {
            users: [
                {
                    Name: "Name",
                    Email: "Email",
                    Country: "Country",
                    Phone: "Phone",
                    roomtype: "Roomtype",
                    Bed: "Bed",
                    Noofroom: "Noofroom",
                    Meal: "Meal",
                    cin: "cin",
                    cout: "cout"

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

#roombook {
    display: none;
}

#roombook .middle {
    height: 450px;
}

:root {
  --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%),
    0 8px 16px rgb(13 0 77 / 8%);
  --bg-box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.621);
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

* {
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
  /* text-shadow: var(--bg-text-shadow); */
}

nav {
  position: fixed;
  height: 60px;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.279);
  z-index: 200;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 100px;
  /* box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.386); */
}

nav ul {
  width: 500px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin-top: 15px;
  color: black;
}

ul li a {
  text-decoration: none;
  color: black;
  cursor: pointer;
}
ul li {
  color: black;
  text-decoration: none;
  list-style: none;
  cursor: pointer;
}

ul li:hover::after {
  content: "";
  position: absolute;
  display: flex;
  width: 30px;
  height: 3px;
  background-color: black;
  /* display: none; */
  transition: ease 2s;
}

ul li a:hover {
  color: black;
}

.logo {
  height: 90%;
  display: flex;
  justify-content: center;
}

.logo p {
  height: 100%;
  display: flex;
  align-items: center;
  font-size: 30px;
  color: rgb(66, 68, 74);
  text-shadow: var(--bg-text-shadow);
}

#welcome {
  height: 100vh;
  background-color: rgba(175, 175, 222, 0.511);
  width: 100%;
  /* z-index: 2000; */
}

#welcome .carousel-inner {
  display: block;
  width: 100%;
  height: 100vh;
  /* padding: 0 50px; */
}
#welcome .carousel-inner::after {
  content: "";
  position: absolute;
  height: 100vh;
  width: 100%;
  background-color: rgba(178, 170, 236, 0.533);
}

#welcome .carousel-item {
  overflow: hidden;
}

#welcome .carousel-item img {
  width: 100%;
  height: 100vh;
}

#welcome .welcomeline {
  position: absolute;
  display: flex;
  height: 100vh;
  width: 100%;
  justify-content: center;
  align-items: center;
  z-index: 100;
}

#welcome .welcometag {
  font-size: 110px;
  font-weight: bold;
  font-family: "Cookie", cursive;
  letter-spacing: 2px;
  line-height: 100px;
  padding: 5px;
  /* text gradiant */
  background: -webkit-linear-gradient(
    317deg,
    rgba(0, 60, 255, 0.81) 0%,
    rgb(255 0 123) 70%
  );
-webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* rooms */

#rooms {
  height: 100vh;
}

#rooms img {
  /* background-size: cover; */
  height: 100vh;
  width: 100%;
  filter: blur(20px);
  position: absolute;
  /* -webkit-backdrop-filter: blur(30px);  */
  z-index: -2;
}

.ourroom {
  position: relative;
  top: 90px;
  height: 400px;
  width: 100%;
  /* background-color: #0040ff; */
}

.head {
  text-align: center;
  margin-bottom: 40px;
}

.roomselect {
  display: flex;
  height: 100%;
  justify-content: space-evenly;
}

.roomselect .roombox {
  height: 100%;
  width: 300px;
  background-color: rgb(8, 8, 48);
  border-radius: 10px;
  overflow: hidden;
  /* margin: 0 20px; */
}

.hotelphoto {
  height: 250px;
  width: 100%;
  background-color: aquamarine;
  background-size: cover;
}

.h1 {
  background-image: url(../../assets/image/hotel1photo.jpg);
}
.h2 {
  background-image: url(../../assets/image/hotel2photo.jpg);
}
.h3 {
  background-image: url(../../assets/image/hotel3photo.jpg);
}
.h4 {
  background-image: url(../../assets/image/hotel4photo.jpg);
}

.roomdata {
  text-align: center;
}

.roomdata h2 {
  color: rgb(207, 211, 255);
  font-size: 30px;
}

.sevices {
  display: flex;
}

.services i {
  color: white;
  margin: 7px;
}

.bookbtn {
  margin: 10px;
}

/* roombookcss */

#roombook {
  height: 100vh;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.558);
  position: fixed;
  z-index: 10000;
}

.logoutbtn {
  height: 20px;
  width: 200px;
  background-color: rgba(216, 19, 19, 0.804);
}

#facilities {
  height: 80vh;
  width: 100%;
  /* background-color: black; */
}

.facility {
  height: 70%;
  width: 100%;
  display: flex;
  justify-content: space-around;
}

.facility .box {
  height: 100%;
  width: 310px;
  border: 2px solid white;
  background-color: #0040ff;
}

.facility .box h2 {
  text-align: center;
  position: relative;
  top: 80%;
  color: white;
  background-color: #0000005e;
}

.box:nth-child(1) {
  background-image: url(../../assets/image/swimingpool.jpg);
  background-size: cover;
}
.box:nth-child(2) {
  background-image: url(../../assets/image/food.jpg);
  background-size: cover;
}
.box:nth-child(3) {
  background-image: url(../../assets/image/gym.jpg);
  background-size: cover;
}
.box:nth-child(4) {
  background-image: url(../../assets/image/spa.jpg);
  background-size: cover;
}


#contact {
  height: 70px;
  width: 100%;
  background-color: black;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 100px;
}

#contact .social {
  width: 200px;
  display: flex;
  justify-content: space-evenly;
}

#contact i {
  color: white;
  font-size: 25px;
  cursor: pointer;
}

#contact .createdby {
  color: white;
}

/* responsive stuff */

@media (max-width: 30rem) {
  nav {
    justify-content: center;
    position: relative;
    background-color: #96a8f88c;
  }
  nav ul {
    display: none;
  }
  #welcome {
    height: 50vh;
    text-align: center;
  }
  #welcome .carousel-inner {
    height: 50vh;
  }
  #welcome .carousel-inner::after {
    height: 50vh;
  }
  #welcome .carousel-item img {
    height: 50vh;
  }
  #welcome .welcomeline {
    height: 50vh;
  }
  #welcome .welcometag {
    text-align: center;
    font-size: 50px;
    line-height: 60px;
  }
  #rooms {
    height: auto;
  }
  #rooms {
    height: 240vh;
  }
  #rooms img {
    display: none;
  }
  .ourroom {
    top: 30px;
    height: auto;
  }
  .roomselect {
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }
  .roomselect .roombox {
    width: 75%;
  }

  #facilities {
    height: 100vh;
  }
  .facility {
    height: 70%;
    flex-wrap: wrap;
  }
  .facility .box {
    margin: 0;
    padding: 0;
    height: 55%;
    width: 50%;
  }

  .facility .box h2 {
    font-size: 18px;
    flex-wrap: wrap;
  }

  #contact {
    padding: 0 30px;
  }
}
</style>

<template>
    <div ref="userData">
        <nav>
            <div class="logo">
                <img class="hotellogo" alt="" src="../../assets/image/icon/hotel_logo.svg">
                <p>Hotel</p>
            </div>
            <div class="container">
                <ul>
                    <li class="#welcome">
                        <router-link to="/home#welcome">Home</router-link>
                    </li>
                    <li class="#rooms">
                        <router-link to="/home#rooms">Rooms</router-link>
                    </li>
                    <li class="#facilities">
                        <router-link to="/home#facilities"
                            >Facilities</router-link
                        >
                    </li>
                    <li class="#contact">
                        <router-link to="/home#contact">Contact</router-link>
                    </li>
                    <router-link class="logout" to="/logout">
                        <button class="btn btn-danger">Logout</button>
                    </router-link>
                </ul>
                <router-view></router-view>
                <div></div>
            </div>
        </nav>
        <div
            id="first_div"
            class="carousel slide carousel_section"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        class="carousel-image"
                        src="../../assets/image/__hotel4.jpg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="carousel-image"
                        src="../../assets/image/__hotel5.jpg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="carousel-image"
                        src="../../assets/image/__hotel6.jpg"
                    />
                </div>

                <div class="welcomeline">
                    <h1 class="welcometag">Welcome to Hotel</h1>
                </div>

                <!-- bookbox -->
                <div id="roombook">
                    <form method="POST" id="roombookform">
                        <div class="head">
                            <h3>RESERVATION</h3>
                            <i
                                class="fa-solid fa-circle-xmark"
                                id="closebox()"
                            ></i>
                        </div>
                        <div class="middle">
                            <div class="guestinfo">
                                <h4>Guest information</h4>
                                <input
                                    class="form-controls"
                                    v-model="Name"
                                    type="text"
                                    name="Name"
                                    placeholder="Enter Full name"
                                />
                                <input
                                    class="form-controls"
                                    v-model="Email"
                                    type="email"
                                    name="Email"
                                    placeholder="Enter Email"
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
                                </select>
                                <input
                                    class="form-controls"
                                    v-model="Phone"
                                    type="text"
                                    name="Phone"
                                    placeholder="Enter Phoneno"
                                />
                            </div>

                            <div class="line"></div>

                            <div class="reservationinfo">
                                <h4>Reservation information</h4>
                                <select
                                    name="roomtype"
                                    class="form-controls"
                                    v-model="roomtype"
                                >
                                    <option value selected>Type Of Room</option>
                                    <option value="Superior Room">
                                        SUPERIOR ROOM
                                    </option>
                                    <option value="Deluxe Room">
                                        DELUXE ROOM
                                    </option>
                                    <option value="Guest House">
                                        GUEST HOUSE
                                    </option>
                                    <option value="Single Room">
                                        SINGLE ROOM
                                    </option>
                                </select>
                                <select
                                    name="Bed"
                                    class="form-controls"
                                    v-model="Bed"
                                >
                                    <option value selected>Bedding Type</option>
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Triple">Triple</option>
                                    <option value="Quad">Quad</option>
                                </select>
                                <select
                                    name="NoofRoom"
                                    class="form-controls"
                                    v-model="Noofroom"
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
                                    <option value="Half Board">
                                        Half Board
                                    </option>
                                    <option value="Full Board">
                                        Full Board
                                    </option>
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
                                        <label for="cout"> Check-Out</label>
                                        <input
                                            class="form-controls"
                                            v-model="cout"
                                            name="cout"
                                            type="date"
                                        />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button
                                class="btn btn-success"
                                name="guestdetailsubmit"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="second_div">
            <img src="../../assets/image/homeanimatebg.svg" />
            <div class="ourroom">
                <h1 class="head">≼ Our room ≽</h1>
                <div class="roomselect">
                    <div class="roombox">
                        <div class="hotelphoto h1"></div>
                        <div class="roomdata">
                            <h2>Superior Room</h2>
                            <div class="services">
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-burger"></i>
                                <i class="fa-solid fa-spa"></i>
                                <i class="fa-solid fa-dumbbell"></i>
                                <i class="fa-solid fa-person-swimming"></i>
                            </div>
                            <button
                                class="btn btn-primary bookbtn"
                                id="openbookbox()"
                            >
                                Book
                            </button>
                        </div>
                    </div>
                    <div class="roombox">
                        <div class="hotelphoto h2"></div>
                        <div class="roomdata">
                            <h2>Delux Room</h2>
                            <div class="services">
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-burger"></i>
                                <i class="fa-solid fa-spa"></i>
                                <i class="fa-solid fa-dumbbell"></i>
                            </div>
                            <button
                                class="btn btn-primary bookbtn"
                                id="openbookbox()"
                            >
                                Book
                            </button>
                        </div>
                    </div>
                    <div class="roombox">
                        <div class="hotelphoto h3"></div>
                        <div class="roomdata">
                            <h2>Guest House</h2>
                            <div class="services">
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-burger"></i>
                                <i class="fa-solid fa-spa"></i>
                            </div>
                            <button
                                class="btn btn-primary bookbtn"
                                id="openbookbox()"
                            >
                                Book
                            </button>
                        </div>
                    </div>
                    <div class="roombox">
                        <div class="hotelphoto h4"></div>
                        <div class="roomdata">
                            <h2>Single Room</h2>
                            <div class="services">
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-burger"></i>
                            </div>
                            <button
                                class="btn btn-primary bookbtn"
                                id="openbookbox()"
                            >
                                Book
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="third_div">
            <h1 class="head">≼ Facilities ≽</h1>
            <div class="facility">
                <div class="box">
                    <h2>Swiming pool</h2>
                </div>
                <div class="box">
                    <h2>Spa</h2>
                </div>
                <div class="box">
                    <h2>24*7 Restaurants</h2>
                </div>
                <div class="box">
                    <h2>24*7 Gym</h2>
                </div>
                <div class="box">
                    <h2>Animation</h2>
                </div>
            </div>
        </div>
        <div id="contact_div">
            <div class="social">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="createdby">
                <h5>Hotel</h5>
            </div>
        </div>
    </div>
</template>
