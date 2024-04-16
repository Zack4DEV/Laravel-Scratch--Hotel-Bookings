<template>
  <div class="roombookEdit">
    <form method="POST" class="guestdetailpanelform">
      <div class="head">
        <h3>EDIT RESERVATION</h3>
      </div>
      <div class="middle">
        <div class="guestinfo">
          <h4>Guest information</h4>
          <input
            class="form-controls"
            type="text"
            name="Name"
            placeholder="Enter Full name"
            v-model="Name"
          />
          <input
            class="form-controls"
            type="email"
            name="Email"
            placeholder="Enter Email"
            v-model="Email"
          />
          <select name="Country" class="form-controls" v-model="Country">
            <option value="" selected>Select your country</option>
            <option v-for="country in countries" :value="country" :key="country">
              {{ country }}
            </option>
          </select>
          <input
            class="form-controls"
            type="text"
            name="Phone"
            placeholder="Enter Phoneno"
            v-model="Phone"
          />
        </div>

        <div class="line"></div>

        <div class="reservationinfo">
          <h4>Reservation information</h4>
          <select name="RoomType" class="form-controls">
            <option value="" selected>Type Of Room</option>
            <option value="Superior Room">SUPERIOR ROOM</option>
            <option value="Deluxe Room">DELUXE ROOM</option>
            <option value="Guest House">GUEST HOUSE</option>
            <option value="Single Room">SINGLE ROOM</option>
          </select>
          <select name="Bed" class="form-controls">
            <option value="" selected>Bedding Type</option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Triple">Triple</option>
            <option value="Quad">Quad</option>
          </select>
          <select name="noofroom" class="form-controls">
            <option value="" selected>No of Room</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
          <select name="Meal" class="form-controls">
            <option value="" selected>Meal</option>
            <option value="Room only">Room only</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Half Board">Half Board</option>
            <option value="Full Board">Full Board</option>
          </select>
          <div class="datesection">
            <span>
              <label for="cin"> Check-In</label>
              <input class="form-controls" name="cin" type="date" v-model="cin" />
            </span>
            <span>
              <label for="cin"> Check-Out</label>
              <input class="form-controls" name="cout" type="date" v-model="cout" />
            </span>
          </div>
        </div>
      </div>
      <div class="footer">
        <router-link to="/roombook/">
          <button class="btn btn-success" name="editroombook">Edit</button>
        </router-link>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  setup() {
    const roombookEditData = ref(0)

    const roombookEdit = async () => {
      try {
        const response = await fetch("/roombookEdit")
        const dataResponse = await response.json()
        roombookEditData.value = dataResponse
      } catch (error) {
        console.error("Error fetching roombookEdit:", error)
      }
    }

    return {
      roombookEdit,
      roombookEditData,
      Name: '',
      Email: '',
      Country: '',
      Phone: '',
      RoomType: '',
      Bed: '',
      NoOfRoom: '',
      Meal: '',
      cin: '',
      cout: '',
    }
  },

  data() {
    return {
      roombookEdits: [
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
          RoomTotal: "roomtotal",
          BedTotal: "bedtotal",
          MealTotal: "mealtotal",
          FinalTotal: "",
        },
      ],
      countries: [
        "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
      ]
    }
  }
}
</script>

<style lang="less" scoped>
.roombookEdit {
  position: fixed;
  z-index: 1000;
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  background-color: #00000079;
}

.roombookEdit .guestdetailpanelform {
  height: 620px;
  width: 1170px;
  background-color: #ccdff4;
  border-radius: 10px;
  /* temp */
  position: relative;
  top: 20px;
  animation: guestinfoform 0.3s ease;
}
</style>
