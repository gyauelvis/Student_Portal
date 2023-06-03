let nav_menu_status = false;
document.querySelector("#hamburger").addEventListener("click", (e) => {
  let nav_menu = document.querySelector("#nav_menu");
  e.preventDefault();
  if (!nav_menu_status) {
    nav_menu.classList.replace("invisible", "visible");
    nav_menu.classList.replace("w-[0]", "w-[85%]");
    nav_menu_status = true;
    document
      .querySelectorAll(".inner_menu")
      .forEach((menu) => menu.classList.replace("invisible", "visible"));
    
  } else {
    e.preventDefault();
    nav_menu.classList.replace("visible", "invisible");
    nav_menu.classList.replace("w-[85%]", "w-[0]");
    nav_menu_status = false;
    document
      .querySelectorAll(".inner_menu")
      .forEach((menu) => menu.classList.replace("visible", "invisible"));
  }
});
