<template>
  <div ref="adminData">
    <nav class="uppernav">
      <div class="logo">
        <p>Hotel</p>
      </div>
      <router-link class="logout" to="/logout">
        <button class="btn btn-danger">Logout</button>
      </router-link>
    </nav>

    <nav class="sidenav">
      <ul>
        <li class="pagebtn active" @click="frameActive(0)">
          <img src="../../../assets/image/icon/dashboard.png" />Dashboard
        </li>
        <li class="pagebtn" @click="frameActive(1)">
          <img src="../../../assets/image/icon/bed.png" />Room Booking
        </li>
        <li class="pagebtn" @click="frameActive(2)">
          <img src="../../../assets/image/icon/wallet.png" />Payment
        </li>
        <li class="pagebtn" @click="frameActive(3)">
          <img src="../../../assets/image/icon/bedroom.png" />Rooms
        </li>
        <li class="pagebtn" @click="frameActive(4)">
          <img src="../../../assets/image/icon/staff.png" />Staff
        </li>
      </ul>
    </nav>

    <div class="mainscreen">
      <div id="dashboardframe" class="frames active">
        <router-link to="/dashboard"><h1>Dashboard</h1></router-link>
      </div>
      <div id="roombookframe" class="frames">
        <router-link to="/roombook"><h1>Roombook</h1></router-link>
      </div>
      <div id="paymentframe" class="frames">
        <router-link to="/payment"><h1>Payment</h1></router-link>
      </div>
      <div id="roomframe" class="frames">
        <router-link to="/room"><h1>Rooms</h1></router-link>
      </div>
      <div id="staffframe" class="frames">
        <router-link to="/staff"><h1>Staff</h1></router-link>
      </div>
    </div>
    <div id="mobileview">
      <h5>Admin panel doesn't show in mobile view</h5>
    </div>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  setup() {
    const adminData = ref(0)

    const frameActive = (manual) => {
      const btns = document.querySelectorAll(".pagebtn")
      const frames = document.querySelectorAll(".frames")

      btns.forEach((btn) => {
        btn.classList.remove("active")
      })
      frames.forEach((slide) => {
        slide.classList.remove("active")
      })

      btns[manual].classList.add("active")
      frames[manual].classList.add("active")
    }

    return {
      adminData,
      frameActive
    }
  }
}
</script>

<style lang="less" scoped>
.pace {
    -webkit-pointer-events: none;
    pointer-events: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

.pace-inactive {
    display: none;
}

.pace .pace-progress {
    background: #3620cb;
    position: fixed;
    z-index: 2000;
    top: 0;
    right: 100%;
    width: 100%;
    height: 5px;
}

.pace .pace-progress-inner {
    display: block;
    position: absolute;
    right: 0px;
    width: 100px;
    height: 100%;
    opacity: 1;
    -webkit-transform: rotate(3deg) translate(0px, -4px);
    -moz-transform: rotate(3deg) translate(0px, -4px);
    -ms-transform: rotate(3deg) translate(0px, -4px);
    -o-transform: rotate(3deg) translate(0px, -4px);
    transform: rotate(3deg) translate(0px, -4px);
}

.pace .pace-activity {
    display: block;
    position: fixed;
    z-index: 2000;
    top: 15px;
    right: 15px;
    width: 14px;
    height: 14px;
    border: solid 2px transparent;
    border-top-color: #3620cb;
    border-left-color: #3620cb;
    border-radius: 10px;
    -webkit-animation: pace-spinner 400ms linear infinite;
    -moz-animation: pace-spinner 400ms linear infinite;
    -ms-animation: pace-spinner 400ms linear infinite;
    -o-animation: pace-spinner 400ms linear infinite;
    animation: pace-spinner 400ms linear infinite;
}

:root {
    --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%),
        0 8px 16px rgb(13 0 77 / 8%);
    --bg-box-shadow: 0px 0px 20px 6px rgb(0 0 0 / 34%);
}

* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}
body {
    height: 100vh;
    overflow: hidden;
}
.uppernav {
    height: 50px;
    background-image: linear-gradient(90deg, #70b7e6bc, #0000ffaa);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 40px;
}
.logo {
    height: 90%;
    display: flex;
}
.logo {
    height: 100%;
}
.logo p {
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 30px;
    color: rgb(8, 17, 44);
    text-shadow: var(--bg-text-shadow);
}

.logout button {
    height: 30px;
    width: 100px;
    background-color: rgba(228, 24, 24, 0.789);
    border: none;
    border-radius: 20px;
    color: white;
    cursor: pointer;
}

.sidenav {
    position: absolute;
    background-color: #0e1b3d;
    width: 18%;
    height: 100%;
    color: #ffffff;
}
ul li {
    display: flex;
    align-items: center;
    padding: 0px 10px;
    height: 50px;
    cursor: pointer;
    margin-bottom: 5px;
}
ul li:hover {
    background-color: #141dd498;
}
ul li.active {
    background-color: #141dd498;
}

.app {
    margin-left: 18%;
}

.frames {
    height: 100vh;
    width: 100%;
    display: none;
    border: 1px solid #ccc

;
}

.frames.active {
    display: block;
}

img {
    height: 23px;
}

#mobileview {
    height: 100vh;
    width: 100%;
    background-color: #ffffff;
    position: absolute;
    z-index: 9999;
    display: none;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

@media (max-width: 40rem) {
    #mobileview {
        display: flex;
    }
}

</style>