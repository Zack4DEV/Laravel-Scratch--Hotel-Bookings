<template>
  <div ref="dashboardData">
    <div class="databox">
      <div class="box roombookbox">
        <h2>Total Rooms</h2>
        <h1>{{ maxrooms }}</h1>
      </div>
      <div class="box guestbox">
        <h2>Total Staff</h2>
        <h1>{{ maxstaff }}</h1>
      </div>
      <div class="box profitbox">
        <h2>Total Profit</h2>
        <h2>{{ total }}<span>$</span></h2>
      </div>
    </div>
    <div class="chartbox">
      <div class="bookroomchart">
        <canvas id="bookroomchart"></canvas>
        <h3 style="text-align: center; margin: 10px 0">Booked Rooms</h3>
        <h1>{{ bookedrooms }}</h1>
      </div>
      <div class="profitchart">
        <div id="profitchart"></div>
        <h3 style="text-align: center; margin: 10px 0">Profit</h3>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  setup() {
    const dashboardData = ref(0)

    const dashboard = async () => {
      try {
        const response = await fetch("/dashboard")
        const dataResponse = await response.json()
        dashboardData.value = dataResponse
      } catch (error) {
        console.error("Error fetching dashboard:", error)
      }
    }

    return {
      dashboard,
      dashboardData,
      maxrooms: 0,
      maxstaff: 0,
      total: 0,
      bookedrooms: 0
    }
  }
}
</script>

<style lang="less" scoped>
:root {
  --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%), 0 8px 16px rgb(13 0 77 / 8%);
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
  /* background-color: #ffff; */
}

* {
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
  /* text-shadow: var(--bg-text-shadow); */
}

.databox {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}

.databox .box {
  height: 200px;
  width: 380px;
  margin: 20px 0;
  background-color: #ccdff4;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.databox .box h1 {
  font-size: 80px;
  font-family: "Hind Siliguri", sans-serif;
  color: rgb(20, 20, 83);
}

.box:nth-child(1) {
  border-bottom: 8px solid red;
}

.box:nth-child(2) {
  border-bottom: 8px solid rgba(0, 255, 68, 0.814);
}

.box:nth-child(3) {
  border-bottom: 8px solid rgb(51, 0, 255);
}
</style>