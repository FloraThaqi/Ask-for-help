/** @type {import('tailwindcss').Config} */
module.exports = {
  content: {
    relative: true,
    files: [
      "./modules/*.php",
      "./index.php",
      "./footer.php",
      "./header.php",
      "./sidebar.php",
      "./page-right-sidebar.php",
      "./page-register.php",
      "./page-login.php",
    ],
  },
  theme: {
    extend: {
      backgroundImage: {
        "split-white-blue":
          "linear-gradient(to bottom, #ffffff 50% , #4767c9 50%);",
      },
      screens: {
        xs: "320px",
      },
    },
  },
  plugins: [],
};
