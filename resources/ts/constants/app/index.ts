import type { IPalette, ITheme } from "./types"

/**
 * app
 */
export const app = {
    name: "hotel",
    link: "https://github.com/Zack4DEV/Project--Laravel-Scratch--",
    isNeedPiCode: true,
}

export const theme: ITheme = {
    version: "2",
    mode: "light",
    assetsUrl: "",

    colors: {
        black: "#000",
        white: "#fff",
        primary: "#1ba784",
        vice: "#d9f6ef",

        red: "#ee0a24",
        blue: "#1989fa",
        orange: "#ff976a",
        "orange-dark": "#ed6a0c",
        "orange-light": "#fffbe8",
        green: "#07c160",
    },

    vanThemeOverrides: {
        black: "black",
        white: "white",
        "gray-1": "#f7f8fa",
        "gray-2": "#f2f3f5",
        blue: "primary",
    },
}

export const darkTheme: ITheme = {
    mode: "dark",

    colors: {
        black: "#000",
        white: "#fff",
        primary: "#1ba784",
        vice: "#d9f6ef",
    },

    vanThemeOverrides: {
        "text-color": "rgba(255, 255, 255, 0.9)",
        "text-color-2": "rgba(255, 255, 255, 0.7)",
        "text-color-3": "rgba(255, 255, 255, 0.5)",
        "border-color": "#3a3a3c",
        "active-color": "#3a3a3c",
        background: "#17171a",
        "background-2": "#232324",
        "background-3": "#2a2a2b",
    },
}

export const pageEnum = {
    HOME: "/home",
    LOGIN: "/login",
}

export const tabBar = {
    color: "#c0c0c0",
    selectedColor: "#1ba784",
    list: [
        {
            text: "Home",
            pagePath: "/home",
            icon: "home-o",
            activeIcon: "home-o",
        },
    ],
}

export const palettes: IPalette[] = [
    {
        value: "#ff5179",
        label: "#ff5179",
        colors: {
            primary: "#ff5179",
            vice: "#ffe6e8",
        },
    },
    {
        value: "#ffaa00",
        label: "#ffaa00",
        colors: {
            primary: "#ffaa00",
            vice: "#1d262e",
        },
    },
    {
        value: "#c3a769",
        label: "#c3a769",
        colors: {
            primary: "#c3a769",
            vice: "#ebecf2",
        },
    },
    {
        value: "#2f2f34",
        label: "#2f2f34",
        colors: {
            primary: "#2f2f34",
            vice: "#ebecf2",
        },
    },
    {
        value: "#0080ff",
        label: "#0080ff",
        colors: {
            primary: "#0080ff",
            vice: "#d6e9fc",
        },
    },
    {
        value: "#884cff",
        label: "#884cff",
        colors: {
            primary: "#884cff",
            vice: "#efe6ff",
        },
    },
]
