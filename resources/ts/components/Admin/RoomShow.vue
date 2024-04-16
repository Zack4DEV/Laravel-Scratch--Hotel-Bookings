<template>
  <div ref="roomData" class="room">
    <!-- Room Add-->
    <div class="addroomsection">
      <form id="addroom" @submit.prevent="addRoom">
        <label for="typeofroom">Type of Room :</label>
        <select name="typeofroom" class="form-control" v-model="TypeOfRoom">
          <option value selected></option>
          <option value="Superior Room">SUPERIOR ROOM</option>
          <option value="Deluxe Room">DELUXE ROOM</option>
          <option value="Guest House">GUEST HOUSE</option>
          <option value="Single Room">SINGLE ROOM</option>
        </select>

        <label for="bed">Type of Bed :</label>
        <select name="bed" class="form-control" v-model="TypeOfBed">
          <option value selected></option>
          <option value="Single">Single</option>
          <option value="Double">Double</option>
          <option value="Triple">Triple</option>
          <option value="Quad">Quad</option>
        </select>

        <button type="submit" class="btn btn-success" name="addroombutton">Add Room</button>
      </form>
    </div>
    <div class="roombox roomboxsuperior">
      <div class="text-center no-boder">
        <i class="fa-soltype fa-bed fa-4x mb-2"></i>
        <router-link to="/room/delete">
          <button name="deleteroombutton" class="btn btn-danger">Delete</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  setup() {
    const TypeOfRoom = ref('')
    const TypeOfBed = ref('')

    const addRoom = async () => {
      try {
        const response = await fetch("/room", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            typeOfRoom: TypeOfRoom.value,
            typeOfBed: TypeOfBed.value
          })
        })
        const dataResponse = await response.json()
        console.log('Data Response:', dataResponse)
      } catch (error) {
        console.error("Error adding room:", error)
      }
    }

    return {
      TypeOfRoom,
      TypeOfBed,
      addRoom
    }
  },
}
</script>

<style lang="less" scoped>

:root {
  --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%), 0 8px 16px rgb(13 0 77 / 8%);
  --bg-box-shadow: 0px 0px 20px 6px rgba(8, 8, 15, 0.31);
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

.addroomsection {
  height: 60px;
  width: 100%;
  background-color: #0a0d2d;
  position: fixed;
  /* display: flex; */
  z-index: 100;
}

.addroomsection form {
  height: 100%;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.addroomsection form label {
  color: white;
}

.addroomsection form select {
  width: 300px;
}

.addroomsection form input {
  width: 300px;
}

.room {
  display: flex;
  position: relative;
  top: 60px;
  height: 85vh;
  overflow-y: scroll;
  justify-content: space-evenly;
  flex-wrap: wrap;
}

.roombox {
  height: 230px;
  width: 230px;
  margin: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: #0a0d2d;
  text-shadow: var(--bg-text-shadow);
  border-radius: 10px;
}

.roomboxsuperior {
  background-color: #2407fc8e;
}

.roomboxdelux {
  background-color: #fa8393c8;
}

.roomboguest {
  background-color: #19cf1069;
}

.roomboxsingle {
  background-color: #07fcdb8e;
}
</style>