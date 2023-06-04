let nav_menu_status = false;
document.querySelector("#hamburger").addEventListener("click", (e) => {
  let nav_menu = document.querySelector("#nav_menu");
  e.preventDefault();
  document.body.classList.add("fixed");
  if (!nav_menu_status) {
    document
      .querySelectorAll(".inner_menu")
      .forEach((menu) => menu.classList.replace("invisible", "visible"));
    setTimeout(() => {
      nav_menu.classList.replace("invisible", "visible");
      nav_menu.classList.replace("w-[0]", "w-[85%]");
      nav_menu_status = true;
    }, 50);
  } else {
    e.preventDefault();
    document.body.classList.remove("fixed");
    document
      .querySelectorAll(".inner_menu")
      .forEach((menu) => menu.classList.replace("visible", "invisible"));
    setTimeout(() => {
      nav_menu.classList.replace("visible", "invisible");
      nav_menu.classList.replace("w-[85%]", "w-[0]");
      nav_menu_status = false;
    }, 50);
  }
});
