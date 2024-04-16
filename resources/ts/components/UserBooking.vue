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
            <router-link to="/home#facilities">Facilities</router-link>
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
    <div id="first_div" class="carousel slide carousel_section" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="carousel-image" src="../../assets/image/__hotel4.jpg" />
        </div>
        <div class="carousel-item">
          <img class="carousel-image" src="../../assets/image/__hotel5.jpg" />
        </div>
        <div class="carousel-item">
          <img class="carousel-image" src="../../assets/image/__hotel6.jpg" />
        </div>

        <div class="welcomeline">
          <h1 class="welcometag">Welcome to Hotel</h1>
        </div>

        <!-- bookbox -->
        <div id="roombook">
          <form method="POST" id="roombookform">
            <div class="head">
              <h3>RESERVATION</h3>
              <i class="fa-solid fa-circle-xmark" @click="closebox"></i>
            </div>
            <div class="middle">
              <div class="guestinfo">
                <h4>Guest information</h4>
                <input class="form-controls" v-model="Name" type="text" name="Name" placeholder="Enter Full name" />
                <input class="form-controls" v-model="Email" type="email" name="Email" placeholder="Enter Email" />
                <select name="Country" class="form-controls" v-model="Country">
                  <option value selected>Select your country</option>
                  <option v-for="country in countries" :value="country">{{ country }}</option>
                </select>
                <input class="form-controls" v-model="Phone" type="text" name="Phone" placeholder="Enter Phoneno" />
              </div>

              <div class="line"></div>

              <div class="reservationinfo">
                <h4>Reservation information</h4>
                <select name="roomtype" class="form-controls" v-model="roomtype">
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
                <select name="NoofRoom" class="form-controls" v-model="Noofroom">
                  <option value selected>No of Room</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
                <select name="Meal" class="form-controls" v-model="Meal">
                  <option value selected>Meal</option>
                  <option value="Room only">Room only</option>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Half Board">Half Board</option>
                  <option value="Full Board">Full Board</option>
                </select>
                <div class="datesection">
                  <span>
                    <label for="cin"> Check-In</label>
                    <input class="form-controls" v-model="cin" name="cin" type="date" />
                  </span>
                  <span>
                    <label for="cout"> Check-Out</label>
                    <input class="form-controls" v-model="cout" name="cout" type="date" />
                  </span>
                </div>
              </div>
            </div>
            <div class="footer">
              <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
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
              <button class="btn btn-primary bookbtn" @click="openbookbox">Book</button>
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
              <button class="btn btn-primary bookbtn" @click="openbookbox">Book</button>
            </div>
          </div>
          <div class="roombox">
            <div class="hotelphoto h3"></div>
            <div class="roomdata">
              <h2>Guest House</h2>
              <div class="services">
                <i class="fa-solid fa-wifi"></i>
                <i class="fa-solid fa-burger

"></i>
                <i class="fa-solid fa-spa"></i>
                <i class="fa-solid fa-dumbbell"></i>
                <i class="fa-solid fa-person-swimming"></i>
              </div>
              <button class="btn btn-primary bookbtn" @click="openbookbox">Book</button>
            </div>
          </div>
          <div class="roombox">
            <div class="hotelphoto h4"></div>
            <div class="roomdata">
              <h2>Single Room</h2>
              <div class="services">
                <i class="fa-solid fa-wifi"></i>
                <i class="fa-solid fa-burger"></i>
                <i class="fa-solid fa-spa"></i>
                <i class="fa-solid fa-dumbbell"></i>
              </div>
              <button class="btn btn-primary bookbtn" @click="openbookbox">Book</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data() {
    return {
      Name: '',
      Email: '',
      Phone: '',
      Country: '',
      roomtype: '',
      Bed: '',
      Noofroom: '',
      Meal: '',
      cin: '',
      cout: '',
      countries: [
        'Afghanistan',
        'Albania',
        'Algeria',
        'Andorra',
        'Angola',
        'Antigua & Deps',
        'Argentina',
        'Armenia',
        'Australia',
        'Austria',
        'Azerbaijan',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',
        'Belgium',
        'Belize',
        'Benin',
        'Bhutan',
        'Bolivia',
        'Bosnia Herzegovina',
        'Botswana',
        'Brazil',
        'Brunei',
        'Bulgaria',
        'Burkina',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Canada',
        'Cape Verde',
        'Central African Rep',
        'Chad',
        'Chile',
        'China',
        'Colombia',
        'Comoros',
        'Congo',
        'Congo {Democratic Rep}',
        'Costa Rica',
        'Croatia',
        'Cuba',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Djibouti',
        'Dominica',
        'Dominican Republic',
        'East Timor',
        'Ecuador',
        'Egypt',
        'El Salvador',
        'Equatorial Guinea',
        'Eritrea',
        'Estonia',
        'Ethiopia',
        'Fiji',
        'Finland',
        'France',
        'Gabon',
        'Gambia',
        'Georgia',
        'Germany',
        'Ghana',
        'Greece',
        'Grenada',
        'Guatemala',
        'Guinea',
        'Guinea-Bissau',
        'Guyana',
        'Haiti',
        'Honduras',
        'Hungary',
        'Iceland',
        'India',
        'Indonesia',
        'Iran',
        'Iraq',
        'Ireland {Republic}',
        'Israel',
        'Italy',
        'Ivory Coast',
        'Jamaica',
        'Japan',
        'Jordan',
        'Kazakhstan',
        'Kenya',
        'Kiribati',
        'Korea North',
        'Korea South',
        'Kosovo',
        'Kuwait',
        'Kyrgyzstan',
        'Laos',
        'Latvia',
        'Lebanon',
        'Lesotho',
        'Liberia',
        'Libya',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg',
        'Macedonia',
        'Madagascar',
        'Malawi',
        'Malaysia',
        'Maldives',
        'Mali',
        'Malta',
        'Marshall Islands',
        'Mauritania',
        'Mauritius',
        'Mexico',
        'Micronesia',
        'Moldova',
        'Monaco',
        'Mongolia',
        'Montenegro',
        'Morocco',
        'Mozambique',
        'Myanmar, {Burma}',
        'Namibia',
        'Nauru',
        'Nepal',
        'Netherlands',
        'New Zealand',
        'Nicaragua',
        'Niger',
        'Nigeria',
        'Norway',
        'Oman',
        'Pakistan',
        'Palau',
        'Panama',
        'Papua New Guinea',
        'Paraguay',
        'Peru',
        'Philippines',
        'Poland',
        'Portugal',
        'Qatar',
        'Romania',
        'Russian Federation',
        'Rwanda',
        'St Kitts & Nevis',
        'St Lucia',
        'Saint Vincent & the Grenadines',
        'Samoa',
        'San Marino',
        'Sao Tome & Principe',
        'Saudi Arabia',
        'Senegal',
        'Serbia',
        'Seychelles',
        'Sierra Leone',
        'Singapore',
        'Slovakia',
        'Slovenia',
        'Solomon Islands',
        'Somalia',
        'South Africa',
        'South Sudan',
        'Spain',
        'Sri Lanka',
        'Sudan',
        'Suriname',
        'Swaziland',
        'Sweden',
        'Switzerland',
        'Syria',
        'Taiwan',
        'Tajikistan',
        'Tanzania',
        'Thailand',
        'Togo',
        'Tonga',
        'Trinidad & Tobago',
        'Tunisia',
        'Turkey',
        'Turkmenistan',
        'Tuvalu',
        'Uganda',
        'Ukraine',
        'United Arab Emirates',
        'United Kingdom',
        'United States',
        'Uruguay',
        'Uzbekistan',
        'Vanuatu',
        'Vatican City',
        'Venezuela',
        'Vietnam',
        'Yemen',
        'Zambia',
        'Zimbabwe',
      ],
    };
  },
  methods: {
    openbookbox() {
      const roombook = document.getElementById('roombook');
      roombook.style.display = 'block';
    },
    closebox() {
      const roombook = document.getElementById('roombook');
      roombook.style.display = 'none';
    },
  },
};
</script>

<style scoped>
#first_div {
  position: relative;
  width: 100%;
}

.carousel-image {
  width: 100%;
  height: auto;
}

.welcometag {
  color: #ffffff;
  font-size: 3rem;
  font-weight: 700;
}

#welcome {
  margin-top: 200px;
}

#second_div {
  position: relative;
}

.ourroom {
  position: absolute;
 

 top: 0;
  left: 10%;
  color: #ffffff;
}

.roombox {
  display: flex;
  margin-top: 100px;
  justify-content: space-between;
}

.roomdata {
  width: 50%;
}

.services {
  display: flex;
  font-size: 1.5rem;
}

.bookbtn {
  padding: 20px 60px;
  font-size: 1.5rem;
  border-radius: 10px;
}

.bookbtn:hover {
  background: #ffffff;
  color: #000000;
}
</style>