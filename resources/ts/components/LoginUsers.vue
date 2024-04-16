<template>
  <div ref="loginData">
    <div
      id="carouselExampleControls"
      class="carousel slide carousel_section"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            class="carousel-image"
            src="../../assets/image/__hotel1.jpg"
          />
        </div>
        <div class="carousel-item">
          <img
            class="carousel-image"
            src="../../assets/image/__hotel2.jpg"
          />
        </div>
        <div class="carousel-item">
          <img
            class="carousel-image"
            src="../../assets/image/__hotel3.jpg"
          />
        </div>
      </div>
    </div>

    <div class="logo">
      <p>Hotel</p>
    </div>

    <div class="auth_container">
      <div id="Log_in">
        <h2>Login</h2>
        <br />
        <span>
          <div class="role_btn">
            <div class="btns active">User</div>
            <div class="btns">Admin</div>
          </div>
        </span>
      </div>

      <div id="User_Employee_Log_In">
        <div id="User_Log_In">
          <form
            class="user_login authsection active"
            id="userlogin"
            method="POST"
            @submit.prevent="login"
          >
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                v-model="Username"
                name="Username"
                placeholder=" "
              />
              <label for="Username">Username</label>
            </div>
            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                v-model="Email"
                name="Email"
                placeholder=" "
              />
              <label for="Email">Email</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                v-model="Password"
                name="Password"
                placeholder=" "
              />
              <label for="Password">Password</label>
            </div>
            <button
              type="submit"
              name="user_login_submit"
              class="auth_btn"
            >
              Login
            </button>

            <div class="footer_line">
              <h6>
                Don't have an account?
                <span
                  class="page_move_btn"
                  @click="signupstyle"
                >signup</span
                >
              </h6>
            </div>
          </form>
        </div>

        <div id="Employee_Log_In">
          <form
            class="employee_login authsection"
            id="employeelogin"
            method="POST"
          >
            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                v-model="Username"
                name="Email"
                placeholder=" "
              />
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                v-model="Password"
                name="Password"
                placeholder=" "
              />
              <label for="floatingPassword">Password</label>
            </div>
            <button
              type="submit"
              name="login_submit"
              class="auth_btn"
            >
              Log in
            </button>
          </form>
        </div>

        <div id="sign_up">
          <h2>Sign Up</h2>

          <form class="user_signup" id="usersignup" method="POST">
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                v-model="Username"
                name="Username"
                placeholder=" "
              />
              <label for="Username">Username</label>
            </div>
            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                v-model="Email"
                name="Email"
                placeholder=" "
              />
              <label for="Email">Email</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                v-model="Password"
                name="Password"
                placeholder=" "
              />
              <label for="Password">Password</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                v-model="CPassword"
                name="CPassword"
                placeholder=" "
              />
              <label for="CPassword">Confirm Password</label>
            </div>

            <button
              type="submit"
              name="user_signup_submit"
              class="auth_btn"
            >
              Sign up
            </button>
          </form>
          <div class="footer_line">
            <h6>
              Already have an account?
              <span class="page_move_btn" @click="loginstyle"
                >Login</span
              >
            </h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  setup() {
    const loginData = ref(0);

    const login = async () => {
      try {
        const response = await fetch("/");
        const dataResponse = await response.json();
        loginData.value = dataResponse;
      } catch (error) {
        console.error("Error fetching login:", error);
      }
    };

    const Username = ref('');
    const Email = ref('');
    const Password = ref('');
    const CPassword = ref('');

    const signupstyle = () => {
      // Define signupstyle method logic here
    };

    return {
      loginData,
      login,
      Username,
      Email,
      Password,
      CPassword,
      signupstyle,
    };
  },
};
</script>
<style lang="less" scoped>
:root {
    --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%),
        0 8px 16px rgb(13 0 77 / 8%);
    --bg-box-shadow: 0px 0px 20px 6px rgb(0 0 0 / 34%);
}

* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    /* text-shadow: var(--bg-text-shadow); */
}

body {
    height: 100vh;
    display: flex;
    /* overflow: hidden; */
}

#carouselExamtpleControls .carousel_section {
    box-shadow: var(--bg-box-shadow);
    width: 100%;
    height: 100vh;
}

/* side photo css */
section {
    height: 100%;
    width: 50%;
}

.carousel-inner::after {
    margin-left: auto;
    margin-right: auto;
    content: "";
    position: auto;
    background-color: rgba(0, 0, 255, 0.284);
}

.carousel-image {
    position: auto;
    height: 100vh;
    width: 110vh;
}
/* login css */

.logo {
    height: 60px;
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.logo p {
    height: 100%;
    display: flex;
    align-items: center;
    font-size: 30px;
    color: rgb(66, 68, 74);
    text-shadow: var(--bg-text-shadow);
}

.auth_container {
    height: 80%;
    margin: 50px;
}

#Log_in {
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.role_btn {
    display: flex;
    gap: inherit;
    margin: 20px 0;
    flex-wrap: wrap;
}

.role_btn .btns {
    height: 40px;
    width: 200px;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    background-color: rgba(93, 102, 116, 0.318);
    font-size: 17px;
    font-weight: 700;
}

.role_btn .btns:hover {
    background-image: linear-gradient(
        90deg,
        rgba(76, 185, 236, 0.527),
        rgba(0, 30, 255, 0.456)
    );
    transition: ease-in-out;
    color: white;
}

.btns.active {
    background-image: linear-gradient(
        90deg,
        rgba(76, 185, 236, 0.527),
        rgba(0, 30, 255, 0.456)
    );
    color: white;
}

.authsection {
    width: 70%;
    margin: 10px;
    display: none;
    text-align: center;
    animation: screen_animation 0.4s;
}

/* toggle display */
.user_login.active {
    display: block;
}

.employee_login.active {
    display: block;
}

.form-floating {
    margin: 15px 0;
}

.auth_btn {
    padding: 15px 30px;
    border: unset;
    border-radius: 15px;
    background-color: rgba(118, 141, 176, 0.318);
    z-index: 1;
    position: relative;
    font-size: 17px;
    transition: all 250ms;
    overflow: hidden;
}

.auth_btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    z-index: -1;
    border-radius: 10px;
    background-image: linear-gradient(
        90deg,
        rgba(76, 185, 236, 0.527),
        rgba(0, 30, 255, 0.456)
    );
    transition: all 250ms;
}

.auth_btn:hover {
    color: #ffffff;
}

.auth_btn:hover::before {
    width: 100%;
}

.footer_line {
    margin: 20px 0;
}

.page_move_btn {
    color: rgba(0, 0, 255, 0.599);
    cursor: pointer;
}
.page_move_btn:hover {
    color: blue;
}

/* signup */
#sign_up {
    height: 100%;
    width: 100%;
    display: none;
    flex-direction: column;
    align-items: center;
}

.user_signup {
    width: 70%;
    text-align: center;
    animation: screen_animation 0.4s;
}

/* animation frame */
@keyframes screen_animation {
    0% {
        transform: translateX(50px);
    }
}

/* responsive stuff */

@media (max-width: 30rem) {
    .carousel_section {
        display: none;
    }
    #auth_section {
        width: 100%;
    }
    .auth_container {
        width: 100%;
        padding: 0;
        margin: 0;
    }
    #Log_in .role_btn .btns {
        width: 90px;
    }
}
</style>


