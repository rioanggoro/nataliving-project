import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                elegant: ['"Playfair Display"', "serif"],
                modern: ['"Poppins"', "sans-serif"],
            },
            colors: {
                nataliving: {
                    // Warna utama kayu – mirip dengan amber-600
                    wood: "#A67C52",

                    // Warna coklat daun/leather – mendekati orange-800
                    leaf: "#8B5E3C",

                    // Aksen untuk heading/elegan text – serupa amber-700
                    accent: "#9C6B41",

                    // Warna lembut untuk subtext – mirip stone-400
                    soft: "#B49B87",
                },
            },
        },
    },

    plugins: [forms],
};
