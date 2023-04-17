document.addEventListener("DOMContentLoaded", () => {
  const body = document.getElementById("body");
  const sun = document.getElementById("sun");
  const moon = document.getElementById("moon");
  const svgWhiteMode = document.getElementsByClassName("svgWhiteMode");
  const svgDarkMode = document.getElementsByClassName("svgDarkMode");
  const isDarkModeEnabled =
    localStorage.getItem("isDarkModeEnabled") === "true";

  if (isDarkModeEnabled) {
    Array.from(svgWhiteMode).forEach((element) => {
      element.style.display = "block";
    });
    Array.from(svgDarkMode).forEach((element) => {
      element.style.display = "none";
    });
    moon.style.display = "none";
    sun.style.display = "block";
    body.classList.add("dark");
  }

  sun.addEventListener("click", toggleDarkMode);
  moon.addEventListener("click", toggleDarkMode);

  function toggleDarkMode() {
    if (body.classList.contains("dark")) {
      body.classList.remove("dark");
      moon.style.display = "block";
      sun.style.display = "none";
      Array.from(svgWhiteMode).forEach((element) => {
        element.style.display = "none";
      });
      Array.from(svgDarkMode).forEach((element) => {
        element.style.display = "block";
      });

      localStorage.setItem("isDarkModeEnabled", "false");
    } else {
      body.classList.add("dark");
      moon.style.display = "none";
      sun.style.display = "block";
      Array.from(svgWhiteMode).forEach((element) => {
        element.style.display = "block";
      });
      Array.from(svgDarkMode).forEach((element) => {
        element.style.display = "none";
      });

      localStorage.setItem("isDarkModeEnabled", "true");
    }
  }

  // if (isDarkModeEnabled === "false") {
  //   svgWhiteMode.style.display = "block";
  // }
});
